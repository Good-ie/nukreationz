output "ec2_public_ip" {
  description = "Public IP of EC2 instance"
  value       = aws_instance.web.public_ip
}

output "ec2_public_dns" {
  description = "Public DNS of EC2 instance"
  value       = aws_instance.web.public_dns
}

output "rds_endpoint" {
  description = "RDS endpoint"
  value       = aws_db_instance.main.endpoint
}

output "rds_hostname" {
  description = "RDS hostname"
  value       = aws_db_instance.main.address
}

output "ecr_repository_url" {
  description = "ECR repository URL"
  value       = aws_ecr_repository.app.repository_url
}

output "website_url" {
  description = "Website URL"
  value       = "http://${aws_instance.web.public_ip}"
}

output "admin_url" {
  description = "Admin panel URL"
  value       = "http://${aws_instance.web.public_ip}/admin"
}
