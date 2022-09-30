<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'formulir';
    protected $primaryKey       = 'id_daftar';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pengguna', 'nama', 'tempat_lahir', 'tgl_lahir', 'jk', 'nik', 'kk', 'anak_ke', 'jml_saudara', 'cita', 'hobi', 'nama_ayah', 'nama_ibu', 'alamat', 'no_hp', 'gambar'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getFormulir($id_pengguna = false)
    {
        if ($id_pengguna == false) {
            return $this->findAll();
        }
        return $this->where(['id_pengguna' => $id_pengguna])->first();
    }
}
