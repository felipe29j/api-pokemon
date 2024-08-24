# Pokémon Card Generator

Um protótipo para gerar informações sobre Pokémons usando a PokeAPI. Este projeto permite a visualização de 5 Pokémons aleatórios com seus nomes, imagens e movimentos. O projeto foi desenvolvido usando o framework Hyperf para PHP.

## Estrutura do Projeto

- **Backend**: Utiliza o Hyperf para criar uma API que busca dados dos Pokémons e os retorna em formato JSON.
- **Frontend**: Utiliza HTML, CSS e JavaScript para exibir os dados dos Pokémons de forma interativa e estilizada.

## Funcionalidades

- Gera 5 Pokémons aleatórios ao clicar no botão.
- Exibe o nome, a imagem e até 4 movimentos de cada Pokémon.
- A interface é simples e intuitiva, com um botão para gerar os Pokémons e uma área para exibi-los.

## Pré-requisitos

- PHP 8.0 ou superior
- Composer
- Node.js (para a construção de assets, se necessário)

## Instalação

1. **Clone o repositório**:

    ```bash
    git clone https://github.com/felipe29j/api-pokemon.git 
    ou
    git clone git@github.com:felipe29j/api-pokemon.git 

    Entre na pasta para os proximos comandos

    cd api-pokemon
    ```

2. **Instale as dependências do PHP**:

    ```bash
    composer install
    ```

3. **Configure o ambiente**:

   Crie um arquivo `.env` a partir do `.env.example` e ajuste as configurações conforme necessário.

4. **Inicie o servidor**:

    ```bash
    php bin/hyperf.php start
    ```

## Uso

1. Acesse a página principal do seu aplicativo no navegador: [http://localhost:9501](http://localhost:9501)
2. Clique no botão "Gerar Pokémons" para obter uma lista de 5 Pokémons aleatórios.

## Estrutura dos Arquivos

- **`app/Controller/PokemonController.php`**: Controlador responsável por buscar dados dos Pokémons e renderizar a view.
- **`resources/views/pokemons.blade.php`**: Template Blade para exibir os dados dos Pokémons.
- **`public/css/style.css`**: Estilos CSS para a página.
- **`public/js/scripts.js`**: Scripts JavaScript para interatividade.

## Licença

Distribuído sob a licença MIT. Veja `LICENSE` para mais informações.

## Contato

Felipe Jose - felipe.jsilva290196@gmail.com

Link do Projeto: [https://github.com/felipe29j/api-pokemon.git](https://github.com/felipe29j/api-pokemon.git)

Link do Video: [https://drive.google.com/file/d/1C69E3v0_l9ZZyKuPXCtNrGwYhD0hkVrV/view](https://drive.google.com/file/d/1C69E3v0_l9ZZyKuPXCtNrGwYhD0hkVrV/view)

