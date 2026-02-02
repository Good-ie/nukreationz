# Get latest Ubuntu AMI
data "aws_ami" "ubuntu" {
  most_recent = true
  owners      = ["099720109477"] # Canonical

  filter {
    name   = "name"
    values = ["ubuntu/images/hvm-ssd/ubuntu-jammy-22.04-amd64-server-*"]
  }

  filter {
    name   = "virtualization-type"
    values = ["hvm"]
  }
}

# EC2 Instance
resource "aws_instance" "web" {
  ami                         = data.aws_ami.ubuntu.id
  instance_type               = var.instance_type
  key_name                    = var.key_name
  subnet_id                   = aws_subnet.public_1.id
  vpc_security_group_ids      = [aws_security_group.ec2.id]
  associate_public_ip_address = true

  root_block_device {
    volume_size = 8
    volume_type = "gp2"
  }

  user_data = <<-EOF
              #!/bin/bash
              apt-get update
              apt-get install -y apache2 php php-mysql php-gd php-curl php-xml php-mbstring git mysql-client
              systemctl enable apache2
              systemctl start apache2
              
              # Enable mod_rewrite
              a2enmod rewrite
              
              # Configure Apache
              cat > /etc/apache2/sites-available/000-default.conf << 'APACHE'
              <VirtualHost *:80>
                  ServerAdmin webmaster@localhost
                  DocumentRoot /var/www/html
                  
                  <Directory /var/www/html>
                      Options Indexes FollowSymLinks
                      AllowOverride All
                      Require all granted
                  </Directory>
                  
                 ErrorLog $${APACHE_LOG_DIR}/error.log
                  CustomLog $${APACHE_LOG_DIR}/access.log combined
              </VirtualHost>
              APACHE
              
              systemctl restart apache2
              
              # Set permissions
              chown -R www-data:www-data /var/www/html
              chmod -R 755 /var/www/html
              EOF

  tags = {
    Name = "${var.project_name}-web"
  }
}
