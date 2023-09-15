<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        $kategori_model = new KategoriModel();
        $all_data_kategori = $kategori_model->findAll();
        return view('admin/masterdata/kategoriobat', ['all_data_kategori' => $all_data_kategori]);
    }

    public function insert_data()
    {
        return view('admin/masterdata/insertkategori');
    }

    public function insert_process()
    {
        $kategori_model = new KategoriModel();
        
        $validationRules = [
            'kategori' => 'required|is_unique[kategori_obat.kategori]',
        ];

        $validationMessages = [
            'kategori' => [
                'required' => 'Kategori obat harus diisi.',
                'is_unique' => 'Kategori obat sudah ada dalam database.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to(base_url('insert_kategori'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $kategori_model->insert($this->request->getPost());
        return redirect()->to(base_url('kategori_obat'))->with('success', 'Data kategori obat berhasil ditambahkan.');
    }

    public function edit_data($id_kategori = false)
    {
        $kategori_model = new KategoriModel();
        $data_kategori = $kategori_model->find($id_kategori);

        return view('admin/masterdata/editkategori', [
            'data_kategori' => $data_kategori,
        ]);
    }

    public function edit_process()
    {
        $kategori_model = new KategoriModel();
        $id_kategori = $this->request->getPost('id_kategori');
        $kategori = $this->request->getPost('kategori');

        $validationRules = [
            'kategori' => "required|is_unique[kategori_obat.kategori,id_kategori,$kategori]",
        ];

        $validationMessages = [
            'kategori' => [
                'required' => 'Kategori obat harus diisi.',
                'is_unique' => 'Kategori obat tidak boleh sama seperti sebelumnya.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to(base_url("edit_kategori/$id_kategori"))->withInput()->with('errors', $this->validator->getErrors());
        }

        $kategori_model->update($this->request->getPost('id_kategori') , $this->request->getPost());
        return redirect()->to(base_url('kategori_obat'))->with('success', 'Data kategori obat berhasil diubah.');
    }

    public function delete_data($id_kategori = false)
    {
        $kategori_model = new KategoriModel();
        $kategori_model->delete($id_kategori);
        return redirect()->to(base_url('kategori_obat'));
    }
}