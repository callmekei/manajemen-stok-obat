<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ObatMasukModel;

class ObatMasuk extends BaseController
{
    public function index()
    {
        $obatmasuk_model = new ObatMasukModel();
        $all_data_obatmasuk = $obatmasuk_model->findAll();
        return view('admin/masterdata/dataobatmasuk', ['all_data_obatmasuk' => $all_data_obatmasuk]);
    }

    public function insert_data()
    {
        $obatmasuk_model = new ObatMasukModel();
        $supliers = $obatmasuk_model->getSupliers();
        $obats = $obatmasuk_model->getObats();
        $no_faktur = $obatmasuk_model->generateNomorFaktur();
        return view('admin/masterdata/insertobatmasuk', [
            'no_faktur' => $no_faktur, 
            'supliers' => $supliers, 
            'obats' => $obats,
        ]);
    }

    public function insert_process()
{
    $obatmasuk_model = new ObatMasukModel();

    $validationRules = [
        'tanggal' => 'required',
        'id_suplier' => 'required',
    ];

    $validationMessages = [
        'tanggal' => [
            'required' => 'Tanggal harus diisi.',
        ],
        'id_suplier' => [
            'required' => 'ID Suplier harus diisi.',
        ],
    ];

    if (!$this->validate($validationRules, $validationMessages)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $data = [
        'no_faktur' => $this->request->getPost('no_faktur'),
        'id_suplier' => $this->request->getPost('id_suplier'),
        'nama_suplier' => $this->request->getPost('nama_suplier'),
        'tanggal' => $this->request->getPost('tanggal'),
        'no_telp' => $this->request->getPost('no_telp'),
        'alamat' => $this->request->getPost('alamat'),
        'id_obat' => $this->request->getPost('id_obat'),
        'harga' => $this->request->getPost('harga'),
        'jumlah' => $this->request->getPost('jumlah'),
        'kadaluarsa' => $this->request->getPost('kadaluarsa'),
    ];

    $obatmasuk_model->insert($data);

        $namaObatMasuk = $this->request->getPost('id_obat'); 
        $namaSuplier = $this->request->getPost('nama_suplier'); 
        $hargaObatMasuk = $this->request->getPost('harga');
        $jumlahObatMasuk = $this->request->getPost('jumlah');
        $kadaluarsaObatMasuk = $this->request->getPost('kadaluarsa');

        $idObat = $obatmasuk_model->getIdObatByName($namaObatMasuk);

        if ($idObat) {
            $updateData = [
                'harga' => $hargaObatMasuk,
                'jumlah' => $jumlahObatMasuk,
                'kadaluarsa' => $kadaluarsaObatMasuk,
                'suplier' => $namaSuplier
            ];

            $obatmasuk_model->updateObatById($idObat, $updateData);
        } else {
        }

        $dataObatMasuk = $this->request->getPost('data_obat_masuk'); // Data obat dari tabel
        if (!empty($dataObatMasuk)) {
            foreach ($dataObatMasuk as $obat) {
                $obatmasuk_model->insert($obat);
            }
        }

    return redirect()->to(base_url('data_obat_masuk'))->with('success', 'Data obat masuk berhasil ditambahkan.');
}

    public function edit_data($id_obatmasuk = false)
    {
        
        $obatmasuk_model = new ObatMasukModel();
        $supliers = $obatmasuk_model->getSupliers();
        $data_obatmasuk = $obatmasuk_model->find($id_obatmasuk);
        return view('admin/masterdata/editobatmasuk', ['data_obatmasuk' => $data_obatmasuk, 'supliers' => $supliers]);
    }

    public function edit_process()
    {
        $obatmasuk_model = new ObatMasukModel();
        $id_obatmasuk = $this->request->getPost('id_obatmasuk');

        $validationRules = [
            'tanggal' => 'required',
            'id_suplier' => 'required',
            'id_obat' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ];
    
        // Pesan error untuk validasi
        $validationMessages = [
            'tanggal' => [
                'required' => 'Tanggal harus diisi.',
            ],
            'id_suplier' => [
                'required' => 'ID Suplier harus diisi.',
            ],
            'id_obat' => [
                'required' => 'Pilih Obat harus diisi.',
            ],
            'harga' => [
                'required' => 'Harga obat harus diisi.',
            ],
            'jumlah' => [
                'required' => 'Jumlah obat harus diisi.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->to(base_url("edit_obat_masuk/$id_obatmasuk"))->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $obatmasuk_model->update($this->request->getPost('id_obatmasuk'), $this->request->getPost());
        return redirect()->to(base_url('data_obat_masuk'))->with('success', 'Data obat masuk berhasil diubah.');
    }

    public function delete_data($id_obatmasuk = false)
    {
        $obatmasuk_model = new ObatMasukModel();
        $obatmasuk_model->delete($id_obatmasuk);
        return redirect()->to(base_url('data_obat_masuk'));
    }

    public function detail_data()
{
    $no_faktur = $this->request->getGet('no_faktur');
    $nama_suplier = $this->request->getGet('nama_suplier');
    $tanggal = $this->request->getGet('tanggal');
    
    $obatmasuk_model = new ObatMasukModel();
    $detail_obat_masuk = $obatmasuk_model->getDetailObatMasukByNoFaktur($no_faktur);
    
    return view('admin/masterdata/detailobatmasuk', [
        'no_faktur' => $no_faktur,
        'nama_suplier' => $nama_suplier,
        'tanggal' => $tanggal,
        'detail_obat_masuk' => $detail_obat_masuk,
        
    ]);
}
}
