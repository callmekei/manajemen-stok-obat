<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Obat extends BaseController
{
    private $model;
    function __construct()
    {
        $this->model = new \App\Models\ObatModel();
    }

    public function edit($id)
    {
        return json_encode($this->model->find($id_obat));
    }


    public function simpan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'jumlah' => [
                'label' => 'Jumlah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'kadaluarsa' => [
                'label' => 'Kadaluarsa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ];

        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            $nama = $this->request->getPost('nama');
            $kategori = $this->request->getPost('kategori');
            $satuan = $this->request->getPost('satuan');
            $jumlah = $this->request->getPost('jumlah');
            $harga = $this->request->getPost('harga');
            $kadaluarsa = $this->request->getPost('kadaluarsa');

            $data = [
                'nama'=> $nama,
                'kategori'=> $kategori,
                'satuan'=> $satuan,
                'jumlah'=> $jumlah,
                'harga'=> $harga,
                'kadaluarsa'=> $kadaluarsa,
            ];

            $this->model->save($data);

            $hasil['sukses'] = "Input Data Sukses!";
            $hasil['error'] = true;  
        }else{
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }

        return json_encode($hasil);
    }
    
    public function index()
    {
        $jumlahBaris = 5;
        $data['dataObat'] = $this->model->orderBy('id_obat','desc')->paginate($jumlahBaris);
        $data['pager'] = $this->model->pager;
        $data['nomor'] = ($this->request->getVar('page') == 1) ? '0' : $this->request->getVar('page');
        return view('admin/masterdata/dataobat', $data);
    }

    public function insert_data()
    {
        return view('admin/masterdata/insertobat');
    }
}
