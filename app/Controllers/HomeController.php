<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class HomeController
{
    protected function view($template, $data = [])
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $twig = new Environment($loader);

        return new Response($twig->render($template, $data));
    }

    public function index()
    {
        return $this->view('home.twig');
    }
}
