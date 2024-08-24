<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Psr\Http\Message\ResponseInterface;
use Hyperf\View\RenderInterface;

/**
 * @Controller()
 */
class PokemonController extends AbstractController
{
    /**
     * @RequestMapping(path="pokemons", methods="get")
     */
    public function getPokemons(): ResponseInterface
    {
        try {
            $urls = [];
            for ($i = 0; $i < 5; $i++) {
                $pokemonId = rand(1, 151);
                $urls[] = "https://pokeapi.co/api/v2/pokemon/{$pokemonId}";
            }

            $responses = [];
            foreach ($urls as $url) {
                $responses[] = $this->fetchData($url);
            }

            $pokemons = [];
            foreach ($responses as $response) {
                $pokemonData = json_decode($response, true);

                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new \Exception('Erro ao decodificar JSON da PokeAPI');
                }

                if (!isset($pokemonData['name'], $pokemonData['sprites']['front_default'], $pokemonData['moves'])) {
                    throw new \Exception('Dados incompletos recebidos da PokeAPI');
                }

                $moves = array_slice(array_map(function ($move) {
                    return $move['move']['name'];
                }, $pokemonData['moves']), 0, 4);

                $pokemons[] = [
                    'name' => $pokemonData['name'],
                    'image' => $pokemonData['sprites']['front_default'],
                    'moves' => $moves,
                ];
            }

            return $this->response->json($pokemons);
        } catch (\Throwable $e) {
            return $this->response->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Fetch data from a given URL using cURL.
     */
    private function fetchData(string $url): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new \Exception('Erro no cURL: ' . curl_error($ch));
        }
        curl_close($ch);

        return $response;
    }
}
