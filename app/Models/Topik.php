<?php

namespace App\Models;

class Topik
{
    protected $db;

    public function __construct()
    {
        $this->db = require __DIR__ . '/../../config/database.php';
    }

    public function all()
    {
        return $this->db->table('topik')->get();
    }

    public function find($kode)
    {
        return $this->db->table('topik')
            ->where('kode_topik', $kode)
            ->first();
    }

    public function insert($data)
    {
        return $this->db->table('topik')->insert($data);
    }

    public function update($kode, $data)
    {
        return $this->db->table('topik')
            ->where('kode_topik', $kode)
            ->update($data);
    }

    public function delete($kode)
    {
        return $this->db->table('topik')
            ->where('kode_topik', $kode)
            ->delete();
    }
}
