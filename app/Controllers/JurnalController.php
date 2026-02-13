<?php

namespace App\Controllers;

use App\Models\Jurnal;
use App\Models\ProgramStudi;
use App\Models\Topik;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class JurnalController
{
    protected function render($template, $data = [])
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views');
        $twig = new Environment($loader);
        return new Response($twig->render($template, $data));
    }

    public function index(Request $request)
    {
        $model = new Jurnal();
        $keyword = $request->query->get('cari');

        if ($keyword) {
            $data = $model->search($keyword);
        } else {
            $data = $model->all();
        }

        return $this->render('jurnal/index.twig', [
            'jurnal' => $data
        ]);
    }

    public function create()
    {
        $ps = new ProgramStudi();
        $topik = new Topik();

        return $this->render('jurnal/create.twig', [
            'programStudi' => $ps->all(),
            'topik' => $topik->all()
        ]);
    }

    public function store(Request $request)
    {
        $model = new Jurnal();

        $model->insert([
            'kode_jurnal' => $request->request->get('kode'),
            'judul' => $request->request->get('judul'),
            'kata_kunci' => $request->request->get('kata_kunci'),
            'abstrak' => $request->request->get('abstrak'),
            'kode_program_studi' => $request->request->get('program_studi'),
            'kode_topik' => $request->request->get('topik'),
            'periode' => $request->request->get('periode'),
            'tahun' => $request->request->get('tahun')
        ]);

        header("Location: /FINAL/public/jurnal");
        exit;
    }

    public function delete($kode)
    {
        $model = new Jurnal();
        $model->delete($kode);

        header("Location: /FINAL/public/jurnal");
        exit;
    }
}
