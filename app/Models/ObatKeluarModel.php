<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatKeluarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'obat_keluar';
    protected $primaryKey       = 'id_obatkeluar';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_faktur','id_konsumen','nama_konsumen','tanggal','no_telp','alamat',
                                   'id_obat','harga','jumlah','sub_total','kadaluarsa'];
    public function generateNomorFaktur()
    {
        // Mendapatkan tanggal saat ini (misalnya: 20230804)
        $current_date = date('Ymd');

        // Mendapatkan nomor faktur terakhir dari database
        $last_faktur = $this->selectMax('no_faktur')->first();
        $last_faktur_number = $last_faktur ? (int)substr($last_faktur->no_faktur, 8) : 0;

        // Membuat nomor faktur berikutnya dengan mengincrement nomor sebelumnya
        $next_faktur_number = $last_faktur_number + 1;

        // Menggabungkan tanggal dan nomor faktur untuk mendapatkan nomor faktur unik
        $no_faktur = $current_date . str_pad($next_faktur_number, 4, '0', STR_PAD_LEFT);

        return $no_faktur;
    }

    public function getKonsumens()
    {
        return $this->db->table('konsumen')->get()->getResult();
    }
    public function getObats()
    {
        return $this->db->table('obat')->get()->getResult();
    }

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
}
