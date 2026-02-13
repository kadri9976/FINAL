<?php

namespace App\Controllers;

use App\Models\Topik;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class TopikController
{
    protected function render($template, $data = [])
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $twig = new Environment($loader);
        return new Response($twig->render($template, $data));
    }

    public function index()
    {
        $model = new Topik();
        return $this->render('topik/index.twig', [
            'topik' => $model->all()
        ]);
    }

    public function create()
    {
        return $this->render('topik/create.twig');
    }

    public function store(Request $request)
    {
        $model = new Topik();

        $model->insert([
            'kode_topik' => $request->request->get('kode'),
            'nama_topik' => $request->request->get('nama')
        ]);

        header("Location: /FINAL/public/topik");
        exit;
    }

    public function edit($kode)
    {
        $model = new Topik();
        return $this->render('topik/edit.twig', [
            'topik' => $model->find($kode)
        ]);
    }

    public function update(Request $request, $kode)
    {
        $model = new Topik();
        $model->update($kode, [
            'nama_topik' => $request->request->get('nama')
        ]);

        header("Location: /FINAL/public/topik");
        exit;
    }

    public function delete($kode)
    {
        $model = new Topik();
        $model->delete($kode);

        header("Location: /FINAL/public/topik");
        exit;
    }
}
