# api_ensino_online

# Configuração inicial

1 - Criar base de dados MySQL com o nome api_ensino_online `CREATE DATABASE api_ensino_online`

2 - Configurar arquivo `.env` de acordo com o ambiente local

3 - Dentro da pasta do projeto, executar o comando `composer install` para instalação das dependencias do projeto e `php artisan migrate` para criação das tabelas

4 - executar o comanto `php artisan serve` para servir a aplicacao

# Instruções para utilização

### Cursos
Criar curso: Enviar requisição POST para Uri: `http://127.0.0.1:8000/api/curso` passando os parametros titulo e descricao

Listar cursos: Enviar requisição GET para Uri: `http://127.0.0.1:8000/api/curso`

Editar curso: Enviar requisição PUT para Uri: `http://127.0.0.1:8000/api/curso/{id}` passando os parametros: titulo e descricao

Visualizar curso: Enviar requisição GET para Uri: `http://127.0.0.1:8000/api/curso/{id}`

Remover curso: Enviar requisição DELETE para Uri: `http://127.0.0.1:8000/api/curso/{id}`



### Alunos
Criar aluno: Enviar requisição POST para Uri: `http://127.0.0.1:8000/api/aluno` passando os parametros: nome, email, sexo e dt_nascimento 

Listar alunos: Enviar requisição GET para Uri: `http://127.0.0.1:8000/api/aluno`

Editar aluno: Enviar requisição PUT para Uri: `http://127.0.0.1:8000/api/aluno/{id}` passando os parametros: nome, email, sexo e dt_nascimento 

Visualizar aluno: Enviar requisição GET para Uri: `http://127.0.0.1:8000/api/aluno/{id}`

Remover aluno: Enviar requisição DELETE para Uri: `http://127.0.0.1:8000/api/aluno/{id}`


### Matriculas
Criar matricula: Enviar requisição POST para Uri: `http://127.0.0.1:8000/api/matricula` passando os parametros: aluno_id e curso_id

Listar matriculas: Enviar requisição GET para Uri: `http://127.0.0.1:8000/api/matricula`

Editar matricula: Enviar requisição PUT para Uri: `http://127.0.0.1:8000/api/matricula/{id}` passando os parametros: aluno_id e curso_id 

Visualizar matricula: Enviar requisição GET para Uri: `http://127.0.0.1:8000/api/matricula/{id}`

Remover matricula: Enviar requisição DELETE para Uri: `http://127.0.0.1:8000/api/matricula/{id}`
