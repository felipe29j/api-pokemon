<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémons</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-top: 20px;
        }
        button {
            background-color: #007bff; /* Azul */
            border: none;
            border-radius: 5px;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3; /* Azul mais escuro para o hover */
        }
        #pokemon-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .pokemon {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            width: 200px;
            text-align: left;
            transition: transform 0.3s;
        }
        .pokemon:hover {
            transform: scale(1.05);
        }
        .pokemon img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .pokemon h2 {
            font-size: 18px;
            margin: 10px 0;
        }
        .pokemon p {
            color: #666;
            font-size: 14px;
        }
        .pokemon ul {
            padding-left: 20px;
            list-style-type: disc;
            color: #333;
            font-size: 14px;
        }
        .pokemon li {
            margin-bottom: 5px;
        }
    </style>
    <script>
        async function fetchPokemons() {
            try {
                const response = await fetch('/pokemons');
                if (!response.ok) {
                    throw new Error('Erro ao buscar Pokémons');
                }

                const data = await response.json();
                const container = document.getElementById('pokemon-container');
                container.innerHTML = '';

                data.forEach(pokemon => {
                    const pokemonElement = document.createElement('div');
                    pokemonElement.classList.add('pokemon');
                    
                    pokemonElement.innerHTML = `
                        <h2>${pokemon.name}</h2>
                        <img src="${pokemon.image}" alt="${pokemon.name}">
                        <p><strong>Moves:</strong></p>
                        <ul>
                            ${pokemon.moves.map(move => `<li>${move}</li>`).join('')}
                        </ul>
                    `;
                    
                    container.appendChild(pokemonElement);
                });
            } catch (error) {
                console.error('Erro ao buscar Pokémons:', error);
            }
        }
    </script>
</head>
<body>
    <h1>Eu escolho você!</h1>
    <button onclick="fetchPokemons()">Gerar Pokémons</button>
    <div id="pokemon-container">
        <!-- Os dados dos Pokémons serão injetados aqui pelo JavaScript -->
    </div>
</body>
</html>
