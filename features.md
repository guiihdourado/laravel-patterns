<!-- 
Requisitos Funcionais
Requisitos funcionais são quais as funcionalidades que teremos.

Requisitos Não Funcionais
Requisitos não funcionais são requisitos da parte técnica

Regras de negócio
São as regras de negócio do nosso sistema.
-->

# Criar Usuário

**Requisitos Funcionais**

- O usuário deve poder cadastrar um usuário informando um nome e email.
- O usuário deve receber um e-mail com boas vindas.

**Requisitos Não Funcionais**

- Vou usar o mailtrap para testar a funcionalidade de e-mail.

**Regras de Negócio**

- O usuário não pode cadastrar com um email já cadastrado. 

# Criar Pedido de Venda

**Requisitos Funcionais**

- O usuário deve poder cadastrar um pedido de venda informando o id do usuário e um array de produtos contendo id, nome, valor e quantidade do produto.

**Requisitos Não Funcionais**

**Regras de Negócio**

- O usuário não pode cadastrar um pedido de venda com o array de produtos vazio.

# Atualizar Status Pedido de Venda

**Requisitos Funcionais**

- O usuário deve poder atualizar o status do pedido informando um novo status.

**Requisitos Não Funcionais**

**Regras de Negócio**

- O usuário não pode atualizar o status do pedido caso não seja um status válido. Status válido: BILLED, CANCELED.
