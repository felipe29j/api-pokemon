<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;
use Hyperf\HttpMessage\Stream\SwooleStream;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::get('/pokemons', 'App\Controller\PokemonController@getPokemons');
Router::get('/favicon.ico', function () {
    return '';
});

Router::addRoute(['GET'], '/css/{file}', function ($file) {
    $filePath = BASE_PATH . '/public/css/' . $file;
    
    if (file_exists($filePath)) {
        $response = new \Hyperf\HttpServer\Response();
        $mimeType = mime_content_type($filePath);

        return $response
            ->withHeader('Content-Type', $mimeType)
            ->withBody(new SwooleStream(file_get_contents($filePath)));
    }

    return (new \Hyperf\HttpServer\Response())
        ->withStatus(404)
        ->withBody(new SwooleStream('File not found'));
});

Router::addRoute(['GET'], '/js/{file}', function ($file) {
    $filePath = BASE_PATH . '/public/js/' . $file;
    
    if (file_exists($filePath)) {
        $response = new \Hyperf\HttpServer\Response();
        $mimeType = mime_content_type($filePath);

        return $response
            ->withHeader('Content-Type', $mimeType)
            ->withBody(new SwooleStream(file_get_contents($filePath)));
    }

    return (new \Hyperf\HttpServer\Response())
        ->withStatus(404)
        ->withBody(new SwooleStream('File not found'));
});

Router::addRoute(['GET'], '/images/{file}', function ($file) {
    $filePath = BASE_PATH . '/public/images/' . $file;
    
    if (file_exists($filePath)) {
        $response = new \Hyperf\HttpServer\Response();
        $mimeType = mime_content_type($filePath);

        return $response
            ->withHeader('Content-Type', $mimeType)
            ->withBody(new SwooleStream(file_get_contents($filePath)));
    }

    return (new \Hyperf\HttpServer\Response())
        ->withStatus(404)
        ->withBody(new SwooleStream('File not found'));
});

