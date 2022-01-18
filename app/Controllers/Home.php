<?php

namespace App\Controllers;

use App\Models\ProvinceModel;
use App\Models\KabupatenModel;

class Home extends BaseController
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
        return view('home', $data);
    }

    /**
     * search index
     * @return array
     */
    public function search_by_province()
    {
        //search index
        $province = $this->request->getVar('provinsi');
        $kabupaten = $this->request->getVar('kabupaten');
        $get_data_by_search = $this->kabupatenModel->search_data($province, $kabupaten);
        $get_data_kabupaten = $this->kabupatenModel->get_kab_prov();
        $get_data_provinsi = $this->provinceModel->findAll();

        if ($province != NULL || $kabupaten != NULL) {
            $data = [
                'kabupaten' => $get_data_by_search
            ];
        } else if ($province == NULL || $kabupaten == NULL) {
            $data = [
                'provinsi' => $get_data_provinsi,
                'kabupaten' => $get_data_kabupaten
            ];
        }

        return view('home', $data);
    }
}
