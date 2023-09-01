# SAEIFPE

# TÍTULO

Sistema de Acompanhamento de Egressos

# CONTEXTO

O  Instituto Federal de Educação, Ciência e Tecnologia de Pernambuco Campus Igarassu apresentou a necessidade de fazer um acompanhamento das carreiras de seus alunos(a) egressos, com o intuito também de obter feedbacks desses formandos.

# PROBLEMA

Dificuldade de acompanhamento de alunos(a) após o término dos cursos. Foi apresentado pelo Instituto que não há uma ferramenta de acompanhamento de alunos egressos dos cursos da instituição, assim, a atual ferramenta utilizada para este fim é uma sala de aula virtual no Classroom, que apresenta baixa adesão desses egressos.

# MOTIVAÇÃO 

## Por que é importante abordar este problema?

  Porque é uma demanda proposta por uma instituição federal que apresenta problemas no mapeamento de seus alunos(a) egressos, influenciando uma má gestão de retorno ao instituto, ou seja, não é possível melhorar pontos negativos, uma vez que não há uma ferramenta para coletar essas informações. Além disso, também há necessidade de estabelecer melhor comunicação com esses egressos para com a instituição e seus atuais estudantes.

## Quais as consequências de não resolver este problema?

## Manter os padrões atuais;

  A instituição não evoluir na sua comunicação com os egressos.

## Quais os benefícios em atacar este problema?

  Melhorar a comunicação com os egressos;
Obter avaliação dos cursos pelos estudantes;
Melhorar adesão da avaliação dos cursos;
Estabelecer networking entre egressos e estudantes (Oportunidades de empregos/estágios).

# SOLUÇÃO PROPOSTA

SAE - Sistema de Acompanhamento de Egressos
	Criação de uma aplicação web para gestão de alunos egressos para o Instituto Federal de Educação, Ciência e Tecnologia de Pernambuco Campus Igarassu. Visando reintegrar os egressos, aspirando uma melhor comunicação entre eles e a instituição.


# TECNOLOGIA ADOTADAS

## Linguagens: 

### PHP
### JavaScript
### SQL

## Bibliotecas:

### Axios

## Tecnologias:

### VueJS
### Laravel
### MySQL

# VIABILIDADE DA PROPOSTA

  Precisa ser feito um estudo que demonstre que a solução proposta é compatível com o mundo real e contexto para qual está inserida.

# FUNCIONALIDADES

## Cadastro de Egressos e Concluintes baseado em banco de dados da instituição;
## Coleta de dados;
## Apresentação dos dados de maneira simples;
## Espaço para Networking entre usuários;

# CONCORRENTES OU SIMILARES

## Marvin@ufes
## Classroom
## Formulários

# ESTRUTURAS DE DADOS
  listar tabelas do banco de dados e quais informações precisam ser armazenadas.

# USER

cpf
nome
cidade
email
telefone


ADMINISTRADOR

id
nome
email

POSTS

post_id - pk
user_id - fk
datetime
title
tag
content

COMENTÁRIOS

comment_id - pk
post_id - fk
user_id - fk
datetime
content

RESPOSTA

response_id - pk
comment_id - fk
user_id - fk
datetime
content


