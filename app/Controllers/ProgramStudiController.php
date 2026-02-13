<?php

namespace App\Controllers;

use App\Models\ProgramStudi;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class ProgramStudiController
{
    protected function view($template, $data = [])
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $twig = new Environment($loader);
        return new Response($twig->render($template, $data));
    }

    public function index()
    {
        $model = new ProgramStudi();
        $data = $model->all();

        return $this->view('program_studi/index.twig', [
            'programStudi' => $data
        ]);
    }

    public function create()
    {
        return $this->view('program_studi/create.twig');
    }

    public function store(Request $request)
    {
        $model = new ProgramStudi();

        $model->insert([
            'kode_program_studi' => $request->request->get('kode'),
            'nama_program_studi' => $request->request->get('nama')
        ]);

        header("Location: /FINAL/public/program-studi");
        exit;
    }

    public function edit($kode)
    {
        $model = new ProgramStudi();
        return $this->view('program_studi/edit.twig', [
            'programStudi' => $model->find($kode)
        ]);
    }

    public function update(Request $request, $kode)
    {
        $model = new ProgramStudi();
        $model->update($kode, [
            'nama_program_studi' => $request->request->get('nama')
        ]);

        header("Location: /FINAL/public/program-studi");
        exit;
    }

    public function delete($kode)
    {
        $model = new ProgramStudi();
        $model->delete($kode);

        header("Location: /FINAL/public/program-studi");
        exit;
    }
}
