<?php

namespace App\Models;

use CodeIgniter\Model;

class SantriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'c_santri';
    protected $primaryKey       = 'id_register';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'id_pengguna', 'nama'];

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

    public function cek_login($username, $password)
    {
        return $this->db->table('c_santri')
            ->where(array('username' => $username, 'password' => $password))
            ->get()->getRowArray();
    }
    public function getAkun($id_pengguna = false)
    {
        if ($id_pengguna == false) {
            return $this->findAll();
        }
        return $this->where(['id_pengguna' => $id_pengguna])->first();
    }
    public function cari($kunci)
    {
        $builder = $this->table('c_santri');
        $builder->like('nama', $kunci);
        $builder->orlike('username', $kunci);
        return $builder;
    }
    public function jml_c_santri()
    {
        $builder = $this->table('c_santri');
        return $builder;
    }
}
