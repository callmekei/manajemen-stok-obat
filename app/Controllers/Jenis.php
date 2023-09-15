<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisModel;

class Jenis extends BaseController
{
    public function index()
    {
        $jenis_model = new JenisModel();
        $all_data_jenis = $jenis_model->findAll();
        return view('admin/masterdata/jenisobat', ['all_data_jenis' => $all_data_jenis]);
    }

    public function insert_data()
    {
        return view('admin/masterdata/insertjenis');
    }

    public function insert_process()
    {
        $jenis_model = new JenisModel();

        $validationRules = [
            'jenis' => 'required|is_unique[jenis_obat.jenis]',
        ];

        $validationMessages = [
            'jenis' => [
                'required' => 'Jenis obat harus diisi.',
                'is_unique' => 'Jenis obat sudah ada dalam database, silakan pilih jenis obat lain.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to(base_url('insert_jenis'))->withInput()->with('errors', $this->validator->getErrors());
        }
        $jenis_model->insert($this->request->getPost());
        return redirect()->to(base_url('jenis_obat'))->with('success', 'Data jenis obat berhasil ditambahkan.');  
    }

    public function edit_data($id_jenis = false)
    {
        $jenis_model = new JenisModel();
        $data_jenis = $jenis_model->find($id_jenis);

        $validation_failed = session('errors');
        return view('admin/masterdata/editjenis', [
            'data_jenis' => $data_jenis,
            'validation_failed' => $validation_failed,
        ]);
    }

    public function edit_process()
    {
        $jenis_model = new JenisModel();

        $id_jenis = $this->request->getPost('id_jenis');
        $jenis = $this->request->getPost('jenis');

        $validationRules = [
            'jenis' => "required|is_unique[jenis_obat.jenis,id_jenis,$jenis]",
        ];

        $validationMessages = [
            'jenis' => [
                'required' => 'Jenis obat harus diisi.',
                'is_unique' => 'Jenis obat tidak boleh sama seperti sebelumnya.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to(base_url("edit_jenis/$id_jenis"))->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $jenis_model->update($this->request->getPost('id_jenis') , $this->request->getPost());
        return redirect()->to(base_url('jenis_obat'))->with('success', 'Data jenis obat berhasil diubah.');
    }

    public function delete_data($id_jenis = false)
    {
        $jenis_model = new JenisModel();
        $jenis_model->delete($id_jenis);
        return redirect()->to(base_url('jenis_obat'));
    }
}
