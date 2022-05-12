<?php

namespace App\Controllers;

class Petugas extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // $this->db = \Config\Database::connect();
        $data = [
           'title' => 'Aplikasi Perpustakaan',
           'users' => $this->db->table('users')->get()->getResultArray()
        ];
        return view('petugas/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Form Tambah Petugas',
            'validation' => \Config\Services::validation()
        ];
        return view('petugas/create', $data);
    }

    public function save()
    {
        // validasi
        if (!$this->validate([      
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'id tidak boleh kosong!.'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'email tidak boleh kosong!.'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'username tidak boleh kosong!.'
                ]
            ],
            'password_hash' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'password tidak boleh kosong!.'
                ]
            ]
                    
        ]))
        return redirect()->to('petugas/create')->withInput();
        $data = [
            'id' => $this->request->getVar('id'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password_hash' => $this->request->getVar('password_hash')

        ];
        $this->db->table('users')->insert($data);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/petugas/index');
    }
    

    public function delete($id)
    {
        $this->db->table('users')->delete(['id' => $id]);
        session()->setFlashdata('message', 'Data Berhasil Didelete');
        return redirect()->to('/petugas/index');
    }

    public function edit($id)
    {
        $data = [
            'title' => ' From Edit Petugas',
            'validation' => \Config\Services::validation(),
            'users' => $this->db->query("SELECT * FROM users WHERE 
            id='$id'")->getResultArray()
        ];
        return view('petugas/edit', $data);
    }

    public function update($id)
    {
        $data =[
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password_hash' => $this->request->getVar('password_hash')
        ];
        $builder = $this->db->table('users');
        $builder->where('id', $id);
        $builder->update($data);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/petugas/index');
    }
    
}
