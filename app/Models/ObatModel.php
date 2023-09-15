<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'obat';
    protected $primaryKey       = 'id_obat';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama','suplier','kategori','jenis','satuan','stok','harga','kadaluarsa'];

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
    public function getKategoriObat()
    {
        return $this->db->table('kategori_obat')->get()->getResult();
    }
    
    public function getJenisObat()
    {
        return $this->db->table('jenis_obat')->get()->getResult();
    }
    
    public function getSatuanObat()
    {
        return $this->db->table('satuan_obat')->get()->getResult();
    }

    public function getSuplier()
    {
        return $this->db->table('suplier')->get()->getResult();
    }
}
