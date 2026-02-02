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
  iam_instance_profile        = aws_iam_instance_profile.ec2_profile.name
  associate_public_ip_address = true

  root_block_device {
    volume_size = 20
    volume_type = "gp2"
  }

  user_data = <<-USERDATA
              #!/bin/bash
              set -e
              
              # Update system
              apt-get update
              apt-get upgrade -y
              
              # Install Docker
              apt-get install -y apt-transport-https ca-certificates curl software-properties-common
              curl -fsSL https://download.docker.com/linux/ubuntu/gpg | gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
              echo "deb [arch=amd64 signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" | tee /etc/apt/sources.list.d/docker.list > /dev/null
              apt-get update
              apt-get install -y docker-ce docker-ce-cli containerd.io docker-compose-plugin
              
              # Start Docker
              systemctl enable docker
              systemctl start docker
              
              # Add ubuntu user to docker group
              usermod -aG docker ubuntu
              
              # Install AWS CLI
              apt-get install -y awscli
              
              # Install MySQL client
              apt-get install -y mysql-client
              
              # Create app directory
              mkdir -p /home/ubuntu/app
              chown ubuntu:ubuntu /home/ubuntu/app
              
              echo "Setup complete!"
              USERDATA

  tags = {
    Name = "${var.project_name}-web"
  }
}
