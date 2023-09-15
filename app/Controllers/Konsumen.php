<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KonsumenModel;

class Konsumen extends BaseController
{
    public function index()
    {
         $konsumen_model = new KonsumenModel();
         $all_data_konsumen = $konsumen_model->findAll();
         return view('admin/masterdata/datakonsumen', ['all_data_konsumen' => $all_data_konsumen]);
    }

    public function insert_data()
    {
        return view('admin/masterdata/insertkonsumen');
    }

    public function insert_process()
    {
        $konsumen_model = new KonsumenModel();
        $konsumen_model->insert($this->request->getPost());
        return redirect()->to(base_url('data_konsumen'))->with('success', 'Data konsumen berhasil ditambahkan.');  
    }

    public function edit_data($id_konsumen = false)
    {
        $konsumen_model = new KonsumenModel();
        $data_konsumen = $konsumen_model->find($id_konsumen);
        return view('admin/masterdata/editkonsumen', ['data_konsumen' => $data_konsumen]);
    }

    public function edit_process()
    {
        $konsumen_model = new KonsumenModel();
        $konsumen_model->update($this->request->getPost('id_konsumen') , $this->request->getPost());
        return redirect()->to(base_url('data_konsumen'))->with('success', 'Data konsumen berhasil diubah.');
    }

    public function delete_data($id_konsumen = false)
    {
        $konsumen_model = new KonsumenModel();
        $konsumen_model->delete($id_konsumen);
        return redirect()->to(base_url('data_konsumen'));
    }

}
