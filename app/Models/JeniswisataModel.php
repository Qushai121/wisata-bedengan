<?php

namespace App\Models;

use CodeIgniter\Model;

class JeniswisataModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jeniswisata';
    protected $primaryKey       = 'jeniswisata_id';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['wisata_nama', 'wisata_thumbnail', 'wisata_description', 'wisata_detail', 'wisata_status', 'user_id'];

    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';


    // // Validation
    protected $validationRules      = [
        'wisata_nama'     => 'required|min_length[3]',
        'wisata_description'     => 'required|min_length[8]',
        'wisata_detail' => 'required|min_length[3]',
        'wisata_thumbnail' => 'mime_in[wisata_thumbnail,image/png,image/jpeg,image/webp]|is_image[wisata_thumbnail]|uploaded[wisata_thumbnail]'
    ];

    protected $validationMessages   = [
        'wisata_nama' => [
            'required' => '{field} Tidak Boleh Kosong',
            'min_length' => '{field} Terlalu Pendek'
        ],
        'wisata_description' => [
            'required' => '{field} Tidak Boleh Kosong',
            'min_length' => '{field} Terlalu Pendek'
        ],
        'wisata_detail' => [
            'required' => '{field} Tidak Boleh Kosong',
            'min_length' => '{field} Terlalu Pendek'
        ],
    ];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
    public function JenisWisataSelect($select): array
    {
        $builder = $this->db->table('jenisWisata');
        $builder->select($select);
        $builder->where('user_id', session('user_id'));
        return $builder->get()->getResultArray();
    }

    public function JenisWisataSelectForAll($select): array
    {
        $builder = $this->db->table('jenisWisata');
        $builder->select($select);
        return $builder->get()->getResultArray();
    }

    public function JenisWisataById(int $id): array
    {
        $builder = $this->db->table('jeniswisata');
        $builder->select('jeniswisata_id,wisata_nama');
        return $builder->getWhere(['jeniswisata_id' => $id])->getRowArray();
    }

    public function joinJenisWisataStatus(): array
    {
        $builder = $this->db->table('jenisWisata');
        $builder->join('status', 'status.status_id = jenisWisata.wisata_status', 'left');
        $builder->where('user_id', session('user_id'));
        return $builder->get()->getResultArray();
    }


    public function getJenisWisataForCard(): array
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jeniswisata');
        $builder->join('status', 'status.status_id = jenisWisata.wisata_status', 'left');
        $builder->join('user', 'user.user_id = jenisWisata.user_id');
        $builder->select('status_detail');
        $builder->select('username');
        $builder->select('jeniswisata_id,wisata_nama, wisata_thumbnail, wisata_description');
        $result = $builder->get()->getResultArray();
        return $result;
    }


    public function getJenisWisataForDetail(int $id): array
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jeniswisata');
        $builder->where('jeniswisata.jeniswisata_id', $id);
        $builder->join('status', 'status.status_id = jenisWisata.wisata_status', 'left');
        $builder->select('status_detail');
        $builder->select('wisata_nama, wisata_thumbnail, wisata_description,wisata_detail');
        $result = $builder->get()->getFirstRow('array');
        return $result;
    }
    public function getJenisWisataForCardDetail(int $id): array
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jeniswisata');
        $builder->join('status', 'status.status_id = jenisWisata.wisata_status', 'left');
        $builder->select('status_detail');
        $builder->select('jeniswisata_id,wisata_nama, wisata_thumbnail, wisata_description');
        $builder->orWhereNotIn('jeniswisata_id', [$id]);
        $builder->limit(6);
        $result = $builder->get()->getResultArray();
        return $result;
    }
}
