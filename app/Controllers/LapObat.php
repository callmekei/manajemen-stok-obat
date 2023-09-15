<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ObatModel;

class LapObat extends BaseController
{
    public function index()
    {
        $obat_model = new ObatModel();
        $all_data_obat = $obat_model->findAll();
        return view('admin/masterdata/laporanobat', ['all_data_obat' => $all_data_obat]);
    }

    
}
