<?php

namespace App\Models;

class Jurnal
{
    protected $db;

    public function __construct()
    {
        $this->db = require __DIR__ . '/../../config/database.php';
    }

    public function all()
    {
        return $this->db->table('jurnal')->get();
    }

    public function search($keyword)
    {
        return $this->db->table('jurnal')
            ->where('judul', 'LIKE', "%$keyword%")
            ->get();
    }

    public function insert($data)
    {
        return $this->db->table('jurnal')->insert($data);
    }

    public function delete($kode)
    {
        return $this->db->table('jurnal')
            ->where('kode_jurnal', $kode)
            ->delete();
    }
}
