<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tiket';
    protected $primaryKey       = 'tiket_id';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['tiket_nama', 'tiket_harga', 'tiket_promo'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'tiket_nama' => 'required|min_length[3]',
        'tiket_harga' => 'required|min_length[3]|is_natural',
        'tiket_promo' => 'required|is_natural',
    ];
    protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;


    public function TiketSelect($select): array
    {
        $builder = $this->db->table('tiket');
        $builder->select($select);
        return $builder->get()->getResultArray();
    }

    public function TiketById(int $id)
    {
        $builder = $this->db->table('tiket');
        $builder->select('tiket_id,tiket_nama');
        return $builder->getWhere(['tiket_id' => $id])->getRowArray();
    }
    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
