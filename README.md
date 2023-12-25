Criei este website com o propósito de aplicar os conhecimentos obtidos ao concluir o curso [Laracasts PHP For Beginners](https://laracasts.com/series/php-for-beginners-2023-edition) e extendê-los usando React e Tailwindcss. Também foi um desafio aprender a usar o Docker corretamente junto com o ApacheHttpd, o que me proporcionou umas dores de cabeça, mas tamo aí.

Essa aplicação usa PHP, ApacheHttpd e MySQL no backending, por isso incluí um DockerComposeFile e um Dockerfile.

## Como instalar

### É necessário ter instalado

- DockerCLI
- npm

### Passo a Passo

1. Clone o repositório -> `git clone https://github.com/Islan42/php-todo.git`
2. CD para o diretório
3. `npm install`
4. `npm run build`
5. `docker compose run -d`

### ETC

Talvez seja necessário popular o banco de dados, para isso há um arquivo 'todos.sql' que pode ser usado junto com o PHPMyAdmin para popular o banco de dados.
