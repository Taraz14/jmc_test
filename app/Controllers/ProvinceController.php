<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProvinceModel;

class ProvinceController extends BaseController
{
    public function __construct()
    {
        $this->provinceModel = new ProvinceModel();
        $this->uri = service('uri');
    }

    public function index()
    {
        $get_data_provinsi = $this->provinceModel->findAll();
        $data = ['provinsi' => $get_data_provinsi, 'uri' => $this->uri];
        echo view('provinsi/province_data', $data);
    }

    public function insert()
    {
        $prov_name = $this->request->getVar('provinsi');
        $data = [
            'province_name' => $prov_name
        ];

        $this->provinceModel->insert($data);
        return redirect()->back();
    }

    public function update_page($id = NULL)
    {
        $get_row_provinsi = $this->provinceModel->get($id);
        $get_data_provinsi = $this->provinceModel->findAll();
        $data = [
            'provinsi_row' => $get_row_provinsi,
            'provinsi' => $get_data_provinsi,
            'id'    => $id
        ];
        echo view('provinsi/province_edit', $data);
    }

    public function update($id = NULL)
    {
        $prov_name = $this->request->getVar('provinsi');
        $data = [
            'province_name' => $prov_name
        ];

        $this->provinceModel->province_update($id, $data);
        return redirect()->back()->withInput($id);
    }

    public function delete($id)
    {
        $this->provinceModel->province_delete($id);
        return $this->index();
    }
}
