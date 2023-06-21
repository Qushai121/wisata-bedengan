<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasUmumModel extends Model
{
   protected $DBGroup          = 'default';
   protected $table            = 'fasilitasumum';
   protected $primaryKey       = 'fasilitasumum_id';
   // protected $useAutoIncrement = true;
   protected $returnType       = 'array';
   // protected $useSoftDeletes   = false;
   // protected $protectFields    = true;
   protected $allowedFields    = ['fasilitasumum_nama', 'fasilitasumum_detail', 'fasilitasumum_lokasi', 'fasilitasumum_status', 'fasilitasumum_gambar', 'user_id'];

   protected $validationRules      = [
      'fasilitasumum_nama'     => 'required|min_length[3]',
      'fasilitasumum_detail'     => 'required|min_length[8]',
      'fasilitasumum_lokasi' => 'required|min_length[3]',
      'fasilitasumum_gambar' => 'mime_in[fasilitasumum_gambar,image/png,image/jpeg,image/webp]|is_image[fasilitasumum_gambar]|uploaded[fasilitasumum_gambar]'
   ];
   protected $validationMessages = [];

   public function FasilitasUmumJoinStatus(): array
   {
      $builder =  $this->db->table('fasilitasumum');
      $builder->join('status', 'status.status_id = fasilitasumum.fasilitasumum_status ');
      $builder->where('user_id', session('user_id'));
      return $builder->get()->getResultArray();
   }

   public function joinFasilitasUmumStatusForAll(): array
   {
      $builder =  $this->db->table('fasilitasumum');
      $builder->join('status', 'status.status_id = fasilitasumum.fasilitasumum_status ');
      return $builder->get()->getResultArray();
   }
}
