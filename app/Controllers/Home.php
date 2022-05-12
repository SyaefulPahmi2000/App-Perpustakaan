<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
           'title' => 'Aplikasi Perpustakaan'
        ];
        
            

        return view('home/index', $data);
    }
}
