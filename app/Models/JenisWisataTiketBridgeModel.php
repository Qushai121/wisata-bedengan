<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisWisataTiketBridgeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jeniswisatatiketbridge';
    protected $primaryKey       = 'bridge_id';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['jeniswisata_id', 'tiket_id'];

    public function joinJenisWisataTiket(): array
    {
        $builder = $this->db->table('jeniswisatatiketbridge');
        $builder->select('jeniswisatatiketbridge.bridge_id,jeniswisatatiketbridge.tiket_id,jeniswisatatiketbridge.jeniswisata_id,jeniswisata.wisata_nama,tiket.tiket_nama');
        $builder->join('jeniswisata', 'jeniswisata.jeniswisata_id=jeniswisatatiketbridge.jeniswisata_id');
        $builder->join('tiket', 'tiket.tiket_id=jeniswisatatiketbridge.tiket_id');
        return $builder->get()->getResultArray();
    }

    public function joinjeniswisataTiketById_TipeGet($id, $tipeGet): array
    {
        if ($tipeGet == 'jeniswisata') {
            $data = "jeniswisata.$tipeGet" . '_id';
        } else if ($tipeGet == 'tiket') {
            $data = "tiket.$tipeGet" . '_id';
        } else {
            $data = null;
        }
        $builder = $this->db->table('jeniswisatatiketbridge');
        $builder->join('jeniswisata', 'jeniswisata.jeniswisata_id=jeniswisatatiketbridge.jeniswisata_id');
        $builder->join('tiket', 'tiket.tiket_id=jeniswisatatiketbridge.tiket_id');
        $builder->where($data, $id);
        return $builder->get()->getResultArray();
    }

    public function joinJenisWisataForCard(): array
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jeniswisatatiketbridge');
        $builder->join('jeniswisata', 'jeniswisata.jeniswisata_id=jeniswisatatiketbridge.jeniswisata_id');
        $builder->join('tiket', 'tiket.tiket_id=jeniswisatatiketbridge.tiket_id');
        $builder->select('jenisWisata.jeniswisata_id,tiket_harga,tiket_promo');
      
        $result = $builder->get()->getResultArray();

        return $result;
    }
    public function joinJenisWisataForDetailById(int $id): array
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jeniswisatatiketbridge');
        $builder->where('jeniswisatatiketbridge.jeniswisata_id', $id);
        $builder->join('jeniswisata', 'jeniswisata.jeniswisata_id=jeniswisatatiketbridge.jeniswisata_id');
        $builder->join('tiket', 'tiket.tiket_id=jeniswisatatiketbridge.tiket_id');
        // SELECT TIKET
        $builder->select('tiket_nama,tiket_harga,tiket_promo');
        $result = $builder->get()->getResultArray();
        return $result;
    }
}
