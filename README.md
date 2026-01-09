# WordPress com PHP 8.4 e MySQL

Ambiente Docker para WordPress com PHP 8.4 e MySQL 8.0.

## Requisitos

- Docker
- Docker Compose

## Como usar

### Iniciar o ambiente

```bash
docker-compose up -d
```

### Parar o ambiente

```bash
docker-compose down
```

### Parar e remover volumes (limpar banco de dados)

```bash
docker-compose down -v
```

## Acesso

- **WordPress**: http://localhost:8080
- **Usuário MySQL**: wordpress
- **Senha MySQL**: wordpress
- **Banco de dados**: wordpress

## Estrutura

- `docker-compose.yml` - Configuração do Docker Compose
- `uploads.ini` - Configurações PHP personalizadas
- `.env` - Variáveis de ambiente
- `wp-content/` - Pasta de conteúdo do WordPress (criada automaticamente)

## Logs

Ver logs do WordPress:
```bash
docker-compose logs -f wordpress
```

Ver logs do MySQL:
```bash
docker-compose logs -f db
```
