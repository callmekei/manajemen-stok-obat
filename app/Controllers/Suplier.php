<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuplierModel;

class Suplier extends BaseController
{
    public function index()
    {
         $suplier_model = new SuplierModel();
         $all_data_suplier = $suplier_model->findAll();
         return view('admin/masterdata/datasuplier', ['all_data_suplier' => $all_data_suplier]);
    }

    public function insert_data()
    {
        return view('admin/masterdata/insertsuplier');
    }

    public function insert_process()
    {
        $suplier_model = new SuplierModel();

        $validationRules = [
            'nama' => 'required|is_unique[suplier.nama]',
            'alamat' => 'required',
            'no_telp' => 'required',
        ];

        $validationMessages = [
            'nama' => [
                'required' => 'Nama suplier harus diisi.',
                'is_unique' => 'Nama suplier sudah ada dalam database',
            ],
            'alamat' => [
                'required' => 'Alamat suplier harus diisi.',
            ],
            'no_telp' => [
                'required' => 'No Telepon suplier harus diisi.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to(base_url('insert_suplier'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $suplier_model->insert($this->request->getPost());
        return redirect()->to(base_url('data_suplier'))->with('success', 'Data suplier berhasil ditambahkan.');  
    }

    public function edit_data($id_suplier = false)
    {
        $suplier_model = new SuplierModel();
        $data_suplier = $suplier_model->find($id_suplier);
        return view('admin/masterdata/editsuplier', ['data_suplier' => $data_suplier]);
    }

    public function edit_process()
    {
        $suplier_model = new SuplierModel();

        $id_suplier = $this->request->getPost('id_suplier');
        $suplier = $this->request->getPost('suplier');

        $validationRules = [
            'nama' => "required|is_unique[suplier.nama,id_suplier,$suplier]",
            'alamat' => "required",
            'no_telp' => "required",
        ];

        $validationMessages = [
            'nama' => [
                'required' => 'Nama suplier harus diisi.',
                'is_unique' => 'Nama suplier tidak boleh sama seperti sebelumnya.',
            ],
            'alamat' => [
                'required' => 'Alamat suplier harus diisi.',
            ],
            'no_telp' => [
                'required' => 'No Telepon suplier harus diisi.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to(base_url("edit_suplier/$id_suplier"))->withInput()->with('errors', $this->validator->getErrors());
        }

        $suplier_model->update($this->request->getPost('id_suplier') , $this->request->getPost());
        return redirect()->to(base_url('data_suplier'))->with('success', 'Data suplier berhasil diubah.');
    }

    public function delete_data($id_suplier = false)
    {
        $suplier_model = new SuplierModel();
        $suplier_model->delete($id_suplier);
        return redirect()->to(base_url('data_suplier'));
    }

    
}
