# GestaoBarbeariaWeb

Este projeto é um sistema ERP desenvolvido para gestão de barbearias, com funcionalidades principais para agendamentos, controle de despesas, produtos, e relatórios financeiros, utilizando PHP e integração via APIs REST.

## Tecnologias Utilizadas

- PHP 8
- PostgreSQL
- CSS customizado para UI compacta e elegante
- APIs REST para integração com serviços fiscais e de agendamento

## Funcionalidades

- Cadastro, listagem, paginação e pesquisa de agendamentos
- Ações de confirmação e rejeição de agendamentos via requisições PATCH para API local
- Controle de despesas com suporte a múltiplas categorias e inserção via modal dinâmico
- Gestão de produtos e controle de estoque
- Relatórios financeiros com dashboards simples
- Sistema modular com páginas PHP e componentes reutilizáveis

## Estrutura do Projeto

- `framework/` — classes base, enums, entidades e serviços de integração
- `paginas/` — páginas PHP para diferentes módulos (agendamentos, despesas, produtos, relatórios)
- `componentes/` — componentes comuns e menus reutilizáveis
- `estilos/` — arquivos CSS que definem o visual compacto, baseado em variáveis CSS e tema

## Considerações

- Paginação implementada manualmente no backend PHP.
- Modais para inserção de despesas e outras funcionalidades.
- Comunicação com API via file_get_contents para GET e cURL para PATCH.
- Código organizado para fácil manutenção e escalabilidade.

