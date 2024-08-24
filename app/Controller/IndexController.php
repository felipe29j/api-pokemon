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
class IndexController extends AbstractController
{
    protected $render;

    public function __construct(RenderInterface $render)
    {
        $this->render = $render;
    }

    /**
     * @RequestMapping(path="/", methods="get")
     */
    public function index(): ResponseInterface
    {
        // Renderizar o template Blade para a página inicial
        return $this->render->render('pokemons');
    }
}
