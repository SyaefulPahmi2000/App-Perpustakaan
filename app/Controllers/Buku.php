<?php

namespace App\Controllers;

class Buku extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // $this->db = \Config\Database::connect();
        $data = [
           'title' => 'Aplikasi Iventaris',
           'buku' => $this->db->table('buku')->get()->getResultArray()
        ];
        return view('buku/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Form Buku',
            'validation' => \Config\Services::validation()
        ];
        return view('buku/create', $data);
    }

    public function save()
    {
        // validasi
        if (!$this->validate([
            'kode_buku' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'kode buku harus di isi.'
                ]
            ],
            
            'nama_buku' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'nama buku harus di isi.'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'jumlah buku harus di isi.'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'penerbit harus di isi.'
                ]
            ],

            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'require' => 'tahun harus di isi.'
                ]
            ],
            
        ]))
        return redirect()->to('buku/create')->withInput();

        $this->db->table('buku')->insert([
            'kode_buku' => $this->request->getVar('kode_buku'),
            'nama_buku' => $this->request->getVar('nama_buku'),
            'jumlah' => $this->request->getVar('jumlah'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun' => $this->request->getVar('tahun')
        ]);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/buku/index');
    }

    public function delete($kode_buku)
    {
        $this->db->table('buku')->delete(['kode_buku' => $kode_buku]);
        session()->setFlashdata('message', 'Data Berhasil Didelete');
        return redirect()->to('/buku/index');
    }

    public function edit($kode_buku)
    {
        $data = [
            'title' => ' From Edit Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->db->query("SELECT * FROM buku WHERE 
            kode_buku='$kode_buku'")->getResultArray()
        ];
        return view('buku/edit', $data);
    }

    public function update($kode_buku)
    {
        $data =[
            'kode_buku' => $this->request->getVar('kode_buku'),
            'nama_buku' => $this->request->getVar('nama_buku'),
            'jumlah' => $this->request->getVar('jumlah'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun' => $this->request->getVar('tahun')
        ];
        $builder = $this->db->table('buku');
        $builder->where('kode_buku', $kode_buku);
        $builder->update($data);
        session()->setFlashdata('message', 'Data Berhasil Disave');
        return redirect()->to('/buku/index');
        
    }
}
