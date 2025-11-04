# GestaoBarbeariaWeb

Este projeto é um sistema ERP desenvolvido para gestão de barbearias com funcionalidades para agendamento, controle de despesas, produtos e relatórios financeiros.

## Tecnologias Utilizadas
- PHP 8
- PostgreSQL
- Blazor (front-end em alguns módulos)
- APIs REST para integração e manipulação de dados fiscais

## Funcionalidades
- Cadastro e gerenciamento de agendamentos, incluindo confirmação e rejeição via API.
- Controle de despesas com suporte a múltiplas categorias e parcelamento.
- Gestão de produtos e estoque.
- Relatórios financeiros com filtros e análise de performance.
- Integração com web services SEFAZ para emissão e consulta de notas fiscais eletrônicas.

## Estrutura do Projeto
- `framework/` — classes base, enums e serviços.
- `paginas/` — páginas PHP para agendamentos, despesas, produtos e relatórios.
- `componentes/` — menus e templates reutilizáveis.
- `estilos/` — arquivos CSS para estilo compacto e elegante.



## Páginas Principais
- `agendamentos.php` — visualização, paginação e ações (confirmar/rejeitar) de agendamentos.
- `despesas.php` — controle financeiro de despesas com inserção via modal.
- `produtos.php` — gerenciamento de produtos e estoque.
- `relatorio-faturamento.php` — dashboards financeiros e análise.

## Observações
- Paginação implementada manualmente no PHP.
- Modais simples para cadastros e edição.
- Código estruturado para facilitar manutenção e expansão.

## Próximos Passos
- Implementar autenticação e roles.
- API segura para operações sensíveis.
- Melhorias na interface com SPA/JS frameworks.

## Contato
Desenvolvedor: [Seu Nome]  
Email: seu.email@example.com`
        


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
- `servicos/` — lógica para consumir APIs REST, converter dados e aplicar paginação

## Instruções de Uso

1. Configure o ambiente PHP com servidor web.
2. Ajuste as URLs da API no código PHP de serviços.
3. Importe o banco de dados e configure conexão.
4. Abra as páginas PHP no navegador para usar o sistema.
5. Utilize o campo de pesquisa para filtrar agendamentos.
6. Use os botões de ação para confirmar/rejeitar agendamentos com feedback.

## Considerações

- Paginação implementada manualmente no backend PHP.
- Modais para inserção de despesas e outras funcionalidades.
- Comunicação com API via file_get_contents para GET e cURL para PATCH.
- Código organizado para fácil manutenção e escalabilidade.

