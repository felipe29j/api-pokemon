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
                <p>Moves:</p>
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
