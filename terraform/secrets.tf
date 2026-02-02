# Store database credentials securely
resource "aws_secretsmanager_secret" "db_credentials" {
  name = "${var.project_name}-db-credentials"

  tags = {
    Name = "${var.project_name}-db-credentials"
  }
}

resource "aws_secretsmanager_secret_version" "db_credentials" {
  secret_id = aws_secretsmanager_secret.db_credentials.id
  secret_string = jsonencode({
    username = var.db_username
    password = var.db_password
    host     = aws_db_instance.main.address
    database = var.db_name
  })
}
