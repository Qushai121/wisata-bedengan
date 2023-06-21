<?php

namespace App\Models;

use CodeIgniter\Model;

class WisataSectionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'wisatasection';
    protected $primaryKey       = 'wisatasection_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['wisatasection_gambar', 'wisatasection_judul', 'wisatasection_deskripsi', 'wisatasection_detail', 'jeniswisata_id', 'user_id'];

    protected $validationRules      = [
        'wisatasection_judul'     => 'required|min_length[3]',
        'wisatasection_deskripsi'     => 'required|min_length[8]',
        'wisatasection_detail'     => 'required|min_length[8]',
        'wisatasection_gambar' => 'mime_in[wisatasection_gambar,image/png,image/jpeg,image/webp]|is_image[wisatasection_gambar]|uploaded[wisatasection_gambar]'
    ];
    protected $validationMessages   = [];

    public function getWisataById(int $id): array
    {
        $builder = $this->db->table('wisatasection');
        $builder->select(['wisatasection_gambar', 'wisatasection_judul', 'wisatasection_deskripsi', 'wisatasection_detail']);
        $builder->where(['jeniswisata_id' => $id]);
        return $builder->get()->getResultArray();
    }
}
