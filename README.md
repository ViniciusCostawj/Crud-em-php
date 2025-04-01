# Crud-em-php
conexão do front com o back que conecta no banco e faz o crud com a base update, insert, delete e delete
# Banco de Dados Simulado em PHP

## Descrição
Este projeto consiste em uma aplicação PHP simples que simula um banco de dados utilizando sessões para armazenar informações temporárias. Ele permite realizar operações de CRUD (Create, Read, Update, Delete) para manipular dados armazenados na sessão.

## Funcionalidades
- **Inserir dados**: Adiciona um novo registro ao "banco de dados" simulado.
- **Pesquisar dados por nome**: Busca registros pelo nome informado.
- **Alterar dados**: Permite modificar um registro existente com base no ID.
- **Excluir dados**: Remove um registro do "banco de dados".
- **Listar todos os dados**: Exibe todos os registros armazenados.

## Requisitos
- Servidor web com suporte a PHP (Apache, Nginx, etc.).
- PHP 5.4 ou superior.
- Sessões habilitadas no PHP.

## Como Usar
### Configuração
1. Clone ou baixe este repositório para o diretório raiz do seu servidor web.
2. Certifique-se de que as sessões PHP estão ativadas no seu ambiente.

### Executando a Aplicação
1. Inicie o servidor web e acesse o arquivo principal no navegador.
2. Utilize os formulários disponíveis na interface para realizar operações CRUD.
3. Para inserir dados, utilize o arquivo `inserir.php`.
4. Para exibir todos os dados, utilize o arquivo `exibir.php`.

## Estrutura do Código
### Funções Principais
- `pesquisarDadosPorNome($nome)`: Busca registros com base no nome.
- `alterarDados($id, $novosDados)`: Altera os dados de um registro específico.
- `excluirDados($id)`: Remove um registro com base no ID.

### Páginas
- `index.php`: Contém o formulário e processa as operações de pesquisa, alteração e exclusão.
- `inserir.php`: Responsável por adicionar novos registros.
- `exibir.php`: Exibe todos os dados armazenados na sessão.

## Exemplo de Uso
1. Insira um novo registro informando um nome e um RA.
2. Pesquise um registro pelo nome.
3. Modifique um registro existente informando um novo nome e RA.
4. Exclua um registro utilizando seu ID.
5. Liste todos os dados armazenados.

## Observações
- Os dados são armazenados temporariamente na sessão e serão perdidos ao fechar o navegador ou reiniciar o servidor.
- Este projeto é uma implementação básica e não utiliza banco de dados real.
- Não é seguro para uso em produção sem as devidas modificações de segurança.

## Licença
Este projeto é de uso livre e pode ser modificado conforme necessário.

