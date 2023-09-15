<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ObatKeluarModel;

class ObatKeluar extends BaseController
{
     public function index()
    {
         $obatkeluar_model = new ObatKeluarModel();
         $all_data_obatkeluar = $obatkeluar_model->findAll();
         return view('admin/masterdata/dataobatkeluar', ['all_data_obatkeluar' => $all_data_obatkeluar]);
    }

    public function insert_data()
    {
        $obatkeluar_model = new ObatKeluarModel();
        $obats = $obatkeluar_model->getObats();
        $konsumens = $obatkeluar_model->getKonsumens();
        $no_faktur = $obatkeluar_model->generateNomorFaktur();
        return view('admin/masterdata/insertobatkeluar', ['no_faktur' => $no_faktur, 'konsumens' => $konsumens, 'obats' => $obats]);
    } 

    public function insert_process()
    {
        $obatkeluar_model = new ObatKeluarModel();
        $data = [
            'no_faktur' => $this->request->getPost('no_faktur'),
            'id_konsumen' => $this->request->getPost('id_konsumen'),
            'nama_konsumen' => $this->request->getPost('nama_konsumen'),
            'tanggal' => $this->request->getPost('tanggal'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
            'id_obat' => $this->request->getPost('id_obat'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
            'sub_total' => $this->request->getPost('sub_total'),
            'kadaluarsa' => $this->request->getPost('kadaluarsa'),
        ];

        $obatkeluar_model->insert($data);
        return redirect()->to(base_url('data_obat_keluar'))->with('success', 'Data obat keluar berhasil ditambahkan.');
    }

    public function edit_data($id_obatkeluar = false)
    {
        $obatkeluar_model = new ObatKeluarModel();
        $obats = $obatkeluar_model->getObats();
        $konsumens = $obatkeluar_model->getKonsumens();
        $data_obatkeluar = $obatkeluar_model->find($id_obatkeluar);
        return view('admin/masterdata/editobatkeluar', ['data_obatkeluar' => $data_obatkeluar, 'konsumens' => $konsumens, 'obats' => $obats]);
    }

    public function edit_process()
    {
        $obatkeluar_model = new ObatKeluarModel();
        $obatkeluar_model->update($this->request->getPost('id_obatkeluar') , $this->request->getPost());
        return redirect()->to(base_url('data_obat_keluar'))->with('success', 'Data keluar masuk berhasil diubah.');
    }

    public function delete_data($id_obatkeluar = false)
    {
        $obatkeluar_model = new ObatKeluarModel();
        $obatkeluar_model->delete($id_obatkeluar);
        return redirect()->to(base_url('data_obat_keluar'));
    }
}
