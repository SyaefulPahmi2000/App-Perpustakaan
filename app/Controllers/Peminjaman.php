<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Peminjaman extends BaseController
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
           'peminjam' => $this->db->query("SELECT * FROM peminjam ")->getResultArray()
        ];
        return view('peminjaman/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => ' From Peminjaman Buku',
            'validation' => \config\Services::validation(),
            'buku' => $this->db->table('buku')->get()->getResultArray(),
            'siswa' => $this->db->table('siswa')->get()->getResultArray()
            
        ];
        return view('peminjaman/create', $data);
    }
    public function save()
    {
          

        // kondisi cek
        $kode = $this->request->getVar('kode_peminjam');
        $data = $this->db->query("SELECT * FROM peminjam WHERE status=0 AND kode_peminjam='$kode'")->getRow();
        //dd($data); die;
        if($data){
            session()->setFlashdata('message', '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
            swal.fire({
                title: "opps..",
                text: "Barang Sedang DiPinjam, Pengajuan Ditolak!",
                icon: "error",
                button: "Aww yiss!",
              });
            </script>');
            return redirect()->to('peminjaman/create');
        }else{
            $this->db->table('peminjam')->insert([
                'kode_peminjam' => $this->request->getVar('kode_peminjam'),
                'nama_peminjam' => $this->request->getVar('nama_peminjam'),
                'judul_buku' => $this->request->getVar('judul_buku'),
                'jumlah' => $this->request->getVar('jumlah'),
                'kelas' => $this->request->getVar('kelas'),
                'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
                'tgl_kembali' => $this->request->getVar('tgl_kembali'),
                'nama_peminjam' => $this->request->getVar('nama_peminjam'),
                'status' => 0
    
            ]);
            session()->setFlashdata('message', 'Data Berhasil Disave');
            return redirect()->to('/peminjaman/index');
        }
     
    }

    public function kembali($kode_peminjam)
    {
        $cek = $this->db->query("SELECT * FROM peminjam WHERE kode_peminjam='$kode_peminjam'")->getResultArray();
        foreach ($cek as $key){
            $tgl_pinjam = $key['tgl_pinjam'];
            $tgl_kembali = $key['tgl_kembali'];
        }
        $tgl_pengembalian = date('y-m-d');
        if($tgl_pengembalian > $tgl_kembali){
            $ket = "Telat!";
        }elseif($tgl_pengembalian == $tgl_kembali){
            $ket = "pengengmbalian tepat waktu!";
        }else{
            $ket = "korupsi";
        }

        $this->db->query("UPDATE peminjam set status=1 WHERE kode_peminjam='$kode_peminjam'");
        $message = "Berhasil Dikembalikan Dengan Status " .$ket;
        session()->setFlashdata('message', $message);
        return redirect()->to('/peminjaman/index');
    }

    public function export()
    {
        $dataPeminjam = $this->db->table('peminjam')->get()->getResultArray();
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Kode')
                    ->setCellValue('B1', 'Nama Peminjam')
                    ->setCellValue('C1', 'Nama Buku')
                    ->setCellValue('D1', 'Jumlah')
                    ->setCellValue('E1', 'Kelas')
                    ->setCellValue('F1', 'Tgl Pinjam')
                    ->setCellValue('G1', 'Tgl Kembali')
                    ->setCellValue('H1', 'Status');
        
        $column = 2;
        // tulis data mobil ke cell
        foreach($dataPeminjam as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $data['kode_peminjam'])
                        ->setCellValue('B' . $column, $data['nama_peminjam'])
                        ->setCellValue('C' . $column, $data['judul_buku'])
                        ->setCellValue('D' . $column, $data['jumlah'])
                        ->setCellValue('E' . $column, $data['kelas'])
                        ->setCellValue('F' . $column, $data['tgl_pinjam'])
                        ->setCellValue('G' . $column, $data['tgl_kembali'])
                        ->setCellValue('H' . $column, $data['status']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Peminjaman';
    
        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');
    
        $writer->save('php://output');
    }

    public function delete($kode_peminjam)
    {
        $this->db->table('peminjam')->delete(['kode_peminjam' => $kode_peminjam]);
        session()->setFlashdata('message', 'Data Berhasil Didelete');
        return redirect()->to('/peminjaman/index');
    }
}

