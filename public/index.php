<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

use App\Controllers\HomeController;
use App\Controllers\ProgramStudiController;
use App\Controllers\TopikController;
use App\Controllers\JurnalController;

$request = Request::createFromGlobals();

$routes = new RouteCollection();

/* ========================
   HOME
======================== */
$routes->add('home', new Route('/', [
    '_controller' => [new HomeController(), 'index']
]));

/* ========================
   PROGRAM STUDI
======================== */
$routes->add('program_studi', new Route('/program-studi', [
    '_controller' => [new ProgramStudiController(), 'index']
]));

$routes->add('ps_create', new Route('/program-studi/create', [
    '_controller' => [new ProgramStudiController(), 'create']
]));

$routes->add('ps_store', new Route('/program-studi/store', [
    '_controller' => [new ProgramStudiController(), 'store']
], [], [], '', [], ['POST']));

$routes->add('ps_edit', new Route('/program-studi/edit/{kode}', [
    '_controller' => [new ProgramStudiController(), 'edit']
]));

$routes->add('ps_update', new Route('/program-studi/update/{kode}', [
    '_controller' => [new ProgramStudiController(), 'update']
], [], [], '', [], ['POST']));

$routes->add('ps_delete', new Route('/program-studi/delete/{kode}', [
    '_controller' => [new ProgramStudiController(), 'delete']
]));

/* ========================
   TOPIK
======================== */
$routes->add('topik', new Route('/topik', [
    '_controller' => [new TopikController(), 'index']
]));

$routes->add('topik_create', new Route('/topik/create', [
    '_controller' => [new TopikController(), 'create']
]));

$routes->add('topik_store', new Route('/topik/store', [
    '_controller' => [new TopikController(), 'store']
], [], [], '', [], ['POST']));

$routes->add('topik_edit', new Route('/topik/edit/{kode}', [
    '_controller' => [new TopikController(), 'edit']
]));

$routes->add('topik_update', new Route('/topik/update/{kode}', [
    '_controller' => [new TopikController(), 'update']
], [], [], '', [], ['POST']));

$routes->add('topik_delete', new Route('/topik/delete/{kode}', [
    '_controller' => [new TopikController(), 'delete']
]));

/* ========================
   JURNAL
======================== */
$routes->add('jurnal', new Route('/jurnal', [
    '_controller' => [new JurnalController(), 'index']
]));

$routes->add('jurnal_create', new Route('/jurnal/create', [
    '_controller' => [new JurnalController(), 'create']
]));

$routes->add('jurnal_store', new Route('/jurnal/store', [
    '_controller' => [new JurnalController(), 'store']
], [], [], '', [], ['POST']));

$routes->add('jurnal_delete', new Route('/jurnal/delete/{kode}', [
    '_controller' => [new JurnalController(), 'delete']
]));

/* ========================
   RUN SYSTEM
======================== */

// Extract path setelah base path /FINAL/public
$basePath = '/FINAL/public';
$pathInfo = $request->getPathInfo();
if (strpos($pathInfo, $basePath) === 0) {
    $pathInfo = substr($pathInfo, strlen($basePath));
    if (empty($pathInfo)) {
        $pathInfo = '/';
    }
}

// Create context dari request
$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

try {
    $request->attributes->add(
        $matcher->match($pathInfo)
    );

    $controller = $controllerResolver->getController($request);
    $arguments = $argumentResolver->getArguments($request, $controller);

    $response = call_user_func_array($controller, $arguments);

} catch (\Exception $e) {
    $response = new Response('404 - Page Not Found: ' . $e->getMessage(), 404);
}

$response->send();
