<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProvinceModel;
use App\Models\KabupatenModel;

class KabupatenController extends BaseController
{

    public function __construct()
    {
        $this->provinceModel = new ProvinceModel();
        $this->kabupatenModel = new KabupatenModel();
    }

    public function index()
    {
        $get_data_kabupaten = $this->kabupatenModel->get_kab_prov();
        $get_data_provinsi = $this->provinceModel->findAll();

        $data = [
            'provinsi' => $get_data_provinsi,
            'kabupaten' => $get_data_kabupaten
        ];
        return view('kabupaten/kabupaten_form', $data);
    }

    public function insert()
    {
        $kab_name = $this->request->getVar('kabupaten');
        $prov_name = $this->request->getVar('provinsi');
        $jml_penduduk = $this->request->getVar('jml_penduduk');
        $data = [
            'kabupaten_name' => $kab_name,
            'province_id' => $prov_name,
            'jumlah_penduduk' => $jml_penduduk
        ];

        // insert using allowfield
        $this->kabupatenModel->insert($data);
        return redirect()->back();
    }

    public function update_page($id)
    {
        $get_data_kabupaten = $this->kabupatenModel->get_kab_prov();
        $get_row_kabupaten = $this->kabupatenModel->get_kab_row($id);
        $get_data_provinsi = $this->provinceModel->findAll();

        $data = [
            'provinsi' => $get_data_provinsi,
            'kabupaten' => $get_data_kabupaten,
            'kab_row' => $get_row_kabupaten,
            'id' => $id
        ];
        return view('kabupaten/kabupaten_edit', $data);
    }

    public function update($id = NULL)
    {
        $kab_name = $this->request->getVar('kabupaten');
        $prov_name = $this->request->getVar('provinsi');
        $jml_penduduk = $this->request->getVar('jml_penduduk');
        $data = [
            'kabupaten_name' => $kab_name,
            'province_id' => $prov_name,
            'jumlah_penduduk' => $jml_penduduk
        ];

        $this->kabupatenModel->kabupaten_update($id, $data);
        return redirect()->back()->withInput($id);
    }

    public function delete($id)
    {
        $this->kabupatenModel->kabupaten_delete($id);
        return redirect()->back();
    }
}
