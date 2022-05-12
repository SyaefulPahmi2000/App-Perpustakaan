<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
      <h1 class="d-flex justify-content-center mb-3"> Data Peminjaman</h1>
      <a href="/peminjaman/create" type="button" class="btn btn-primary"><i class="bi bi-plus"></i>Tambah Data</a>
      <a href="<?= base_url('peminjaman/export'); ?>" type="button" class="btn btn-warning"><i class="bi bi-plus"></i>Export</a>
      <!--Bagian Navbar-->
      <?php if (session()->getFlashdata('message')) : ?>
          <div class="alert alert_primary mt-5" role="alert">
              <?= session()->getFlashdata('message'); ?>
          </div>
        <?php endif; ?>
      <div class="table-responsive mt-3">
        <table class="table table-striped" id="dataTable">
          <thead>
            <tr>
              <th>No</th>
              
              <th>Kode</th>
              <th>Nama peminjam</th>
              <th>Nama Buku</th>
              <th>Jumlah</th>
              <th>Kelas</th>
              <th>Tgl Pinjam</th>
              <th>Tgl Kembali</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($peminjam as $m) : ?>
            <tr>
              <td><?= $no++; ?></td>
              
              <td><?= $m['kode_peminjam']; ?></td>
              <td><?= $m['nama_peminjam']; ?></td>
              <td><?= $m['judul_buku']; ?></td>
              <td><?= $m['jumlah']; ?></td>
              <td><?= $m['kelas']; ?></td>
              <td><?=  date('d F Y', strtotime($m['tgl_pinjam'])); ?></td>
              <td><?=  date('d F Y', strtotime($m['tgl_kembali'])); ?></td>

              <td>
                <?php
                  if($m['status'] == 0) : ?>
                  <span class="badge rounded-pill bg-danger">buku Dipinjam</span>
                    <?php else : ?>
                      <span class="badge rounded-pill bg-primary">Ready!</span>
                      <?php endif;?>
                
              </td>

              <td>
                  <?php if($m['status']==1): ?>
                      <a href="/peminjaman/delete/<?= $m['kode_peminjam']; ?>" class="btn btn-danger btn-sm"
                      onClick="return confirm('yakin mau hapus data '); ">Delete<i class="bi bi-calendar-x"></i></a>
                    <?php else : ?>
                          <a href="/peminjaman/kembali/<?= $m['kode_peminjam']; ?>" class="btn btn-danger btn-sm"
                            onClick="return confirm('yakin mau kembalikan data '); ">Kembalikan</a> | <a 
                            href="peminjaman/delete/<?= $m['kode_peminjam']; ?>" class="btn btn-success btn-sm" 
                            onClick="return confirm('yakin mau hapus data ');">Delete<i class="bi bi-pencil-square"></i></a>
                      <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
<?= $this->endSection(); ?>