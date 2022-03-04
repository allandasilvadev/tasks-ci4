# Recursos usados

- jQuery 3.6.0
- Popper JS 2.10.2
- Bootstrap 5.1.3
- Font Awesome 4.7.0
- Codeigniter 4

# Instalação

1. Criar o banco de dados: **"create database if not exists \`tasksci4\` character set utf8 collate utf8_general_ci;"**
2. No arquivo 'app/Config/App.php', definir a "base_url"
3. No arquivo 'app/Config/Database.php', informar as configurações para conexão com o banco de dados.
4. Realizar as migrations da aplicação, executando o comando: **"php spark migrate:status && php spark migrate"**
5. Acessar a url base do projeto, ex: http://localhost/tasks-ci4/public/