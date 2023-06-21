<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Jeniswisata extends Seeder
{
    public function run()
    {
        $data = [
            'wisata_nama' => 'hutan kanjut',
            'wisata_thumbnail'    => 'article.webp',
            'wisata_description'    => 'di hutan ini ada hutan dan tanah air api udara dahulu kala ke lima negara tinggal dengan damai namun itu semua berubah saat negara api menyerang',
            'user_id'    =>1,
        ];
   
        $this->db->table('jeniswisata')->insert($data);
    }
}
