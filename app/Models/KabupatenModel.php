<?php

namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jmc_kabupaten';
    protected $primaryKey       = 'province_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['province_id', 'kabpaten_name', 'jumlah_penduduk'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function get_kab_prov()
    {
        $builder = $this->db->table($this->table . ' k');
        $builder->select('*, k.province_id as kpid, p.province_id as pid');
        $builder->join('jmc_province p', 'k.province_id = p.province_id');
        return $builder->get()->getResult();
    }

    public function get_kab_row($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('kabupaten_id', $id);
        return $builder->get()->getRow();
    }

    public function kabupaten_update($id, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where('kabupaten_id', $id);
        $builder->update($data);
    }

    public function kabupaten_delete($id)
    {
        $builder = $this->db->table($this->table);
        $builder->delete([$this->primaryKey => $id]);
    }

    /**
     * search index
     * @return array
     */
    public function search_data($province, $kabupaten)
    {
        $builder = $this->db->table($this->table . ' k');
        $builder->select('*')
            ->join('jmc_province p', 'k.province_id = p.province_id');
        if ($province != NULL) {
            $builder->where('province_name', $province);
        } else if ($kabupaten != NULL) {
            $builder->where('kabupaten_name', $kabupaten);
        } else if ($province != NULL && $kabupaten != NULL) {
            $builder->where('kabupaten_name', $kabupaten);
            $builder->where('province_name', $province);
        }
        return $builder->get()->getResult();
    }
}
