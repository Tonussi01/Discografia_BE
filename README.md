# API Discografia

A **API Discografia** é uma API REST desenvolvida para gerenciar informações sobre álbuns e músicas. A API fornece endpoints para CRUD (Criar, Ler, Atualizar, Deletar) operações em álbuns e músicas.



## Índice

- [Visão Geral](#visão-geral)
- [Funcionalidades](#funcionalidades)
- [Instalação](#instalação)
- [Endpoints](#endpoints)
- [Licença](#licença)

## Visão Geral

 - Este projeto foi desenvolvido como um desafio tecnico proposto pela empresa Techpines, os requisitos eram:
 - Back-end Php/Laravel
 - Front-end React
 - Banco de dados livre



## Funcionalidades

 - Ver lista de álbuns e faixas
 - Pesquisar álbuns e faixas por nome
 - Adicionar um novo álbum
 - Adicionar uma nova faixa em um álbum
 - Excluir uma faixa
 - Excluir um álbum

## Instalação

Para executar a API DevQuiz localmente, siga os passos abaixo:

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/Tonussi01/Discografia_BE

  2. **Navegue até o diretório do projeto:**
     
     ```bash
     cd discografia
     
  3. **Instale as dependências::**
      ```bash
      composer install


 4. **Configure o arquivo .env:**
      ```bash
      cp .env.example .env
      
 5. **Gere a chave de aplicação:**
     ```bash
    php artisan key:generate
    
 6. **Execute as migrações do banco de dados:**
    ```bash
    php artisan migrate
        
 7. **Inicie o servidor de desenvolvimento:**
    ```bash
    php artisan serve


A API será iniciada e estará disponível no endereço http://localhost:8000 por padrão.


# Endpoints da API

# Álbuns

1. **Listar Álbuns**
   - **Método:** GET
   - **Endpoint:** /api/discos
   - **Descrição:** Obtém a lista de todos os álbuns.

2. **Obter Álbum**
   - **Método:** GET
   - **Endpoint:** /api/discos/{id}
   - **Descrição:** Obtém os detalhes de um álbum específico.
   - **Parâmetros:**
     - `id` (inteiro) - ID do álbum.

3. **Criar Álbum**
   - **Método:** POST
   - **Endpoint:** /api/discos
   - **Descrição:** Cria um novo álbum.
   - **Corpo da Requisição:**
     ```json
     {
       "nome": "Nome do Álbum",
       "descricao": "Descrição do Álbum",
       "imagem_url": "URL da Imagem do Álbum"
     }
     ```

4. **Atualizar Álbum**
   - **Método:** PUT
   - **Endpoint:** /api/discos/{id}
   - **Descrição:** Atualiza os detalhes de um álbum específico.
   - **Parâmetros:**
     - `id` (inteiro) - ID do álbum.
   - **Corpo da Requisição:**
     ```json
     {
       "nome": "Nome Atualizado do Álbum",
       "descricao": "Descrição Atualizada do Álbum",
       "imagem_url": "URL Atualizada da Imagem do Álbum"
     }
     ```

5. **Deletar Álbum**
   - **Método:** DELETE
   - **Endpoint:** /api/discos/{id}
   - **Descrição:** Deleta um álbum específico.
   - **Parâmetros:**
     - `id` (inteiro) - ID do álbum.

## Músicas

1. **Listar Músicas**
   - **Método:** GET
   - **Endpoint:** /api/musicas
   - **Descrição:** Obtém a lista de todas as músicas.

2. **Obter Música**
   - **Método:** GET
   - **Endpoint:** /api/musicas/{id}
   - **Descrição:** Obtém os detalhes de uma música específica.
   - **Parâmetros:**
     - `id` (inteiro) - ID da música.

3. **Criar Música**
   - **Método:** POST
   - **Endpoint:** /api/musicas
   - **Descrição:** Cria uma nova música.
   - **Corpo da Requisição:**
     ```json
     {
       "nome": "Nome da Música",
       "duracao": 180,  // Duração em segundos
       "nome_album": "Nome do Álbum"
     }
     ```

4. **Atualizar Música**
   - **Método:** PUT
   - **Endpoint:** /api/musicas/{id}
   - **Descrição:** Atualiza os detalhes de uma música específica.
   - **Parâmetros:**
     - `id` (inteiro) - ID da música.
   - **Corpo da Requisição:**
     ```json
     {
       "nome": "Nome Atualizado da Música",
       "duracao": 190,  // Duração em segundos
       "nome_album": "Nome Atualizado do Álbum"
     }
     ```

5. **Deletar Música**
   - **Método:** DELETE
   - **Endpoint:** /api/musicas/{id}
   - **Descrição:** Deleta uma música específica.
   - **Parâmetros:**
     - `id` (inteiro) - ID da música.


## Licença

Distribuído sob a licença MIT.

