<?php

namespace App\Models;

class ProgramStudi
{
    protected $db;

    public function __construct()
    {
        $this->db = require __DIR__ . '/../../config/database.php';
    }

    public function all()
    {
        return $this->db->table('program_studi')->get();
    }

    public function find($kode)
    {
        return $this->db->table('program_studi')
            ->where('kode_program_studi', $kode)
            ->first();
    }

    public function insert($data)
    {
        return $this->db->table('program_studi')->insert($data);
    }

    public function update($kode, $data)
    {
        return $this->db->table('program_studi')
            ->where('kode_program_studi', $kode)
            ->update($data);
    }

    public function delete($kode)
    {
        return $this->db->table('program_studi')
            ->where('kode_program_studi', $kode)
            ->delete();
    }
}
