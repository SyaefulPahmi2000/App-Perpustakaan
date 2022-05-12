<?php

namespace App\Controllers;

use CodeIgniter\Validation\Rules;

class Siswa extends BaseController
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
           'siswa' => $this->db->table('siswa')->get()->getResultArray()
        ];
        return view('siswa/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Form Tambah pegawai',
            'validation' => \Config\Services::validation()
        ];
        return view('siswa/create', $data);
    }

    public function save()
    {
        // validasi
        if (!$this->validate([      
            'NIS' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'NIS tidak boleh kosong!.'
                ]
            ],
            'nama_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'nama siswa pegawai tidak boleh kosong!.'
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'kelas tidak boleh kosong!.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'alamat pegawai tidak boleh kosong!.'
                ]
            ]
        
        ]))
        return redirect()->to('siswa/create')->withInput();
        
        $this->db->table('siswa')->insert([
            'NIS' => $this->request->getVar('NIS'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'kelas' => $this->request->getVar('kelas'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat')

        ]);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/siswa/index');
    }
    
    public function delete($NIS)
    {
        $this->db->table('siswa')->delete(['NIS' => $NIS]);
        session()->setFlashdata('message', 'Data Berhasil Didelete');
        return redirect()->to('/siswa/index');
    }

    public function edit($NIS)
    {
        $data = [
            'title' => ' From Edit Siswa',
            'validation' => \Config\Services::validation(),
            'siswa' => $this->db->query("SELECT * FROM siswa WHERE 
            NIS='$NIS'")->getResultArray()
        ];
        return view('siswa/edit', $data);
    }

    public function update($NIS)
    {

        $data =[
            'NIS' => $this->request->getVar('NIS'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'kelas' => $this->request->getVar('kelas'),
            'jenis_kelamin' => $this->request->getVar('kelas'),
            'alamat' => $this->request->getVar('alamat'),
            // 'poto' => $namaImage
        ];
        $builder = $this->db->table('siswa');
        $builder->where('NIS', $NIS);
        $builder->update($data);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/siswa/index');
    }
    
}
