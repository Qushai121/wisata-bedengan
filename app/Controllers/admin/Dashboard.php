<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    
    public function dashboardMenuRender()
    {
        // dd($data);
        return view('admin/pages/kosong');
    }
}
