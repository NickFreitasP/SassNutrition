# NutriFlow

Sistema SaaS para nutricionistas desenvolvido com Laravel, focado no gerenciamento de pacientes, dietas, consultas e acompanhamento da evolução nutricional.

## 📋 Sobre o Projeto

O NutriFlow foi criado para auxiliar nutricionistas no gerenciamento de seus pacientes de forma simples e organizada.

O sistema permite:

* Cadastro de pacientes
* Registro de pesagens
* Controle de dietas
* Controle de consultas
* Dashboard com indicadores importantes
* Acompanhamento da evolução dos pacientes

O projeto está sendo desenvolvido seguindo conceitos de Clean Architecture, separando responsabilidades através de DTOs, Use Cases e Controllers.

---

## 🚀 Tecnologias Utilizadas

* PHP 8.3
* Laravel 13
* MySQL
* Bootstrap
* Chart.js
* Font Awesome

---

## 🏗 Arquitetura

O projeto utiliza uma estrutura baseada em camadas:

```text
app
├── Application
│   ├── DTOs
│   └── UseCases
│
├── Domain
│   └── Services
│
├── Infrastructure
│   └── Persistence
│
└── Interfaces
    └── Web
```

### Objetivo

Manter a regra de negócio desacoplada da interface web, facilitando manutenção e escalabilidade.

---

# 👥 Gestão de Pacientes

Funcionalidades implementadas:

* Cadastro de pacientes
* Edição de pacientes
* Exclusão de pacientes
* Busca de pacientes
* Paginação
* Upload de foto do paciente
* Perfil completo do paciente

Informações armazenadas:

* Nome
* E-mail
* Telefone
* Data de nascimento
* Altura
* Objetivo
* Restrições alimentares
* Preferências alimentares
* Ocupação
* Observações

---

# ⚖️ Histórico de Pesagens

Funcionalidades implementadas:

* Cadastro de pesagens
* Histórico completo de peso
* Visualização cronológica das pesagens

Cada pesagem possui:

* Peso
* Data de registro

---

# 🍽 Gestão de Dietas

Funcionalidades implementadas:

* Upload de dietas em PDF
* Listagem de dietas
* Visualização de dieta
* Edição
* Exclusão

Cada dieta pode ser associada a um paciente.

---

# 📅 Gestão de Consultas

Funcionalidades implementadas:

* Cadastro de consultas
* Edição
* Exclusão
* Visualização individual
* Data e horário da consulta
* Observações da consulta

---

# 📊 Dashboard

Indicadores implementados:

* Total de pacientes
* Total de dietas
* Total de pesagens registradas
* Total de consultas
* Novos pacientes do mês
* Últimos pacientes cadastrados

### Distribuição de IMC

O dashboard possui um gráfico de distribuição de IMC dos pacientes.

Categorias:

* Abaixo do peso
* Peso normal
* Sobrepeso
* Obesidade Grau I
* Obesidade Grau II
* Obesidade Grau III

O cálculo é realizado dinamicamente utilizando a altura do paciente e sua última pesagem registrada.

---

# 🔒 Controle de Usuários

Atualmente o sistema possui:

* Nutricionista
* Middleware de proteção de rotas

Estrutura preparada para futuras permissões mais avançadas.

---

# 📈 Funcionalidades Planejadas

## Agenda

* Consultas futuras
* Calendário mensal
* Lembretes

## Portal do Paciente

* Login do paciente
* Visualização de dietas
* Histórico de peso
* Consultas agendadas

## Criador de Dietas

* Cadastro de alimentos
* Informações nutricionais
* Montagem automática de refeições
* Cálculo de calorias
* Cálculo de proteínas
* Cálculo de carboidratos
* Cálculo de gorduras

## Avaliação Corporal

* Circunferência abdominal
* Braço
* Quadril
* Percentual de gordura
* Massa muscular

## Relatórios

* Relatório em PDF
* Evolução de peso
* Evolução de IMC
* Resumo completo do paciente

---

# ⚙️ Instalação

Clone o projeto:

```bash
git clone <url-do-repositorio>
```

Acesse a pasta:

```bash
cd nutriflow
```

Instale as dependências:

```bash
composer install
```

Crie o arquivo .env:

```bash
cp .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Configure o banco de dados no arquivo .env.

Execute as migrations:

```bash
php artisan migrate
```

Inicie o servidor:

```bash
php artisan serve
```

---

# 🎯 Objetivo do Projeto

Além de resolver um problema real para nutricionistas, o NutriFlow também serve como projeto de estudo para aprofundamento em:

* Laravel
* Arquitetura de Software
* Clean Architecture
* Design Patterns
* Boas práticas de desenvolvimento
* Construção de SaaS

---

Desenvolvido por Nicholas Freitas.

