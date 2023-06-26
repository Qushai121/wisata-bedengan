<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyewaanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penyewaan';
    protected $primaryKey       = 'penyewaan_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['penyewaan_nama', 'penyewaan_detail', 'penyewaan_lokasi', 'penyewaan_status', 'penyewaan_gambar', 'penyewaan_harga', 'user_id'];

    protected $validationRules      = [
        'penyewaan_nama'     => 'required|min_length[3]',
        'penyewaan_detail'     => 'required|min_length[8]',
        'penyewaan_lokasi'     => 'required|min_length[8]',
        'penyewaan_gambar' => 'mime_in[penyewaan_gambar,image/png,image/jpeg,image/webp]|is_image[penyewaan_gambar]|uploaded[penyewaan_gambar]',
       ' penyewaan_harga' => 'required|is_natural'
    ];

    public function joinPenyewaanStatus(): array
    {
        $builder =  $this->db->table('penyewaan');
        $builder->join('status', 'status.status_id = penyewaan.penyewaan_status','LEFT' );
        $builder->where('user_id', session('user_id'));
        return $builder->get()->getResultArray();
    }

    public function joinPenyewaanStatusForAll(): array
    {
        $builder =  $this->db->table('penyewaan');
        $builder->join('status', 'status.status_id = penyewaan.penyewaan_status','LEFT' );
        $builder->select('penyewaan_nama, penyewaan_detail, penyewaan_lokasi,penyewaan_status, penyewaan_gambar, penyewaan_harga,status_detail ');
        return $builder->get()->getResultArray();
    }

    public function PenyewaanSelect($select): array
    {
        $builder = $this->db->table('penyewaan');
        $builder->select($select);
        return $builder->get()->getResultArray();
    }
}
