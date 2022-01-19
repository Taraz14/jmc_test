<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvinceModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'province';
    protected $primaryKey       = 'province_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['province_name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function get($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('province_id', $id);
        return $builder->get()->getRow();
    }

    public function province_update($id, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where('province_id', $id);
        $builder->update($data);
    }

    public function province_delete($id)
    {
        $builder = $this->db->table($this->table);
        $builder->delete([$this->primaryKey => $id]);
    }
}
