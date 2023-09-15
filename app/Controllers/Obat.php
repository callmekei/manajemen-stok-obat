<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ObatModel;

class Obat extends BaseController
{
    public function index()
    {
        $obat_model = new ObatModel();
        $all_data_obat = $obat_model->findAll();

        $data = [
            'menu' => 'master',
            'submenu' => 'data_obat',
        ];
        return view('admin/masterdata/dataobat', ['all_data_obat' => $all_data_obat,
    'menu'=> $data,
    'submenu' => $data]);
    }

    public function insert_data()
    {
        $obat_model = new ObatModel();
        $kategori_obat = $obat_model->getKategoriObat();
        $jenis_obat = $obat_model->getJenisObat();
        $satuan_obat = $obat_model->getSatuanObat();
        $nama_suplier = $obat_model->getSuplier();
        return view('admin/masterdata/insertobat', [
            'kategori_obat' => $kategori_obat,
            'jenis_obat' => $jenis_obat,
            'satuan_obat' => $satuan_obat,
            'nama_suplier' => $nama_suplier,
        ]);
    }

    public function insert_process()
    {
        $obat_model = new ObatModel();

        $validationRules = [
            'nama' => 'required|is_unique[obat.nama]',
            'kategori' => 'required',
            'jenis' => 'required',
            'satuan' => 'required',
            'suplier' => 'required',
            'harga' => 'required',
        ];

        $validationMessages = [
            'nama' => [
                'required' => 'Nama obat harus diisi.',
                'is_unique' => 'Nama obat sudah ada dalam database.',
            ],
            'kategori' => [
                'required' => 'Kategori obat harus diisi.',
            ],
            'jenis' => [
                'required' => 'Jenis obat harus diisi.',
            ],
            'satuan' => [
                'required' => 'Satuan obat harus diisi.',
            ],
            'suplier' => [
                'required' => 'Suplier harus diisi.',
            ],
            'harga' => [
                'required' => 'Harga harus diisi.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to(base_url('insert_obat'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $obat_model->insert($this->request->getPost());
        return redirect()->to(base_url('data_obat'))->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function edit_data($id_obat = false)
    {
        $obat_model = new ObatModel();
        $data_obat = $obat_model->find($id_obat);
        $kategori_obat = $obat_model->getKategoriObat();
        $jenis_obat = $obat_model->getJenisObat();
        $satuan_obat = $obat_model->getSatuanObat();
        $nama_suplier = $obat_model->getSuplier();


        return view('admin/masterdata/editobat', [
            'data_obat' => $data_obat,
            'kategori_obat' => $kategori_obat,
            'jenis_obat' => $jenis_obat,
            'satuan_obat' => $satuan_obat,
            'nama_suplier' => $nama_suplier,
        ]);
    }

    public function edit_process()
    {
        $obat_model = new ObatModel();
        $id_obat = $this->request->getPost('id_obat');

        $validationRules = [
            'nama' => "required",
        ];

        $validationMessages = [
            'nama' => [
                'required' => 'Nama obat harus diisi.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to(base_url("edit_obat/$id_obat"))->withInput()->with('errors', $this->validator->getErrors());
        }

        $obat_model->update($id_obat, $this->request->getPost());
        return redirect()->to(base_url('data_obat'))->with('success', 'Data obat berhasil diubah.');
    }

    public function delete_data($id_obat = false)
    {
        $obat_model = new ObatModel();
        $obat_model->delete($id_obat);
        return redirect()->to(base_url('data_obat'));
    }
}
