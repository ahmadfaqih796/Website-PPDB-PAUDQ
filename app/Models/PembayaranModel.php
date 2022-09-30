<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id_pembayaran';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pengguna', 'nama', 'bukti', 'status', 'tanggal', 'admin'];

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

    public function getPembayaran($id_pengguna = false)
    {
        if ($id_pengguna == false) {
            return $this->findAll();
        }
        return $this->where(['id_pengguna' => $id_pengguna])->first();
    }
    public function cari($kunci)
    {
        $builder = $this->table('pembayaran');
        $builder->like('nama', $kunci);
        $builder->orlike('id_pengguna', $kunci);
        return $builder;
    }
    public function lunas()
    {
        $builder = $this->table('pembayaran');
        $builder->like('status', '1');
        return $builder;
    }
    public function laporan()
    {
        $builder = $this->table('pembayaran');
        $builder->select('status', 'nama');
        $builder->where('status', 1);
        $query = $builder->get();
        return $query;
    }
    public function belum_lunas()
    {
        $builder = $this->table('pembayaran');
        $builder->like('status', '0');
        return $builder;
    }
}
