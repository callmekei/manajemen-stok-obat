<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SatuanModel;

class Satuan extends BaseController
{
    public function index()
    {
        $satuan_model = new SatuanModel();
        $all_data_satuan = $satuan_model->findAll();
        return view('admin/masterdata/satuanobat', ['all_data_satuan' => $all_data_satuan]);
    }

    public function insert_data()
    {
        return view('admin/masterdata/insertsatuan');
    }

    public function insert_process()
    {
        $satuan_model = new SatuanModel();

        $validationRules = [
            'satuan' => 'required|is_unique[satuan_obat.satuan]',
        ];

        $validationMessages = [
            'satuan' => [
                'required' => 'Satuan obat harus diisi.',
                'is_unique' => 'Satuan obat sudah ada dalam database, silakan pilih satuan obat lain.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to(base_url('insert_satuan'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $satuan_model->insert($this->request->getPost());
        return redirect()->to(base_url('satuan_obat'))->with('success', 'Data satuan obat berhasil ditambahkan.');  
    }

    public function edit_data($id_satuan = false)
    {
        $satuan_model = new SatuanModel();
        $data_satuan = $satuan_model->find($id_satuan);

        $validation_failed = session('errors');
        return view('admin/masterdata/editsatuan', [
            'data_satuan' => $data_satuan,
            'validation_failed' => $validation_failed,
        ]);
    }

    public function edit_process()
    {
        $satuan_model = new SatuanModel();
        $id_satuan = $this->request->getPost('id_satuan');
        $satuan = $this->request->getPost('satuan');

        $validationRules = [
            'satuan' => "required|is_unique[satuan_obat.satuan,id_satuan,$satuan]",
        ];

        $validationMessages = [
            'satuan' => [
                'required' => 'Satuan obat harus diisi.',
                'is_unique' => 'Satuan obat sudah ada dalam database, silakan pilih satuan obat lain.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to(base_url("edit_satuan/$id_satuan"))->withInput()->with('errors', $this->validator->getErrors());
        }

        $satuan_model->update($this->request->getPost('id_satuan') , $this->request->getPost());
        return redirect()->to(base_url('satuan_obat'))->with('success', 'Data satuan obat berhasil diubah.');
    }

    public function delete_data($id_satuan = false)
    {
        $satuan_model = new SatuanModel();
        $satuan_model->delete($id_satuan);
        return redirect()->to(base_url('satuan_obat'));
    }

    
}
