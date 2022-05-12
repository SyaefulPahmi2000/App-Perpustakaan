<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
      <h1 class="d-flex justify-content-center mb-3">Data Buku</h1>
      <a href="/buku/create" type="button" class="btn btn-primary"><i class="bi bi-plus"></i>Tambah Data</a>
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
              <th>Kode Buku</th>
              <!-- <th>Katagori</th> -->
              <th>Nama Buku</th>
              <th>Jumlah</th>
              <th>Penerbit</th>
              <!-- <th>Pengarang</th> -->
              <th>Tahun</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($buku as $m) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $m['kode_buku']; ?></td>

              <td><?= $m['nama_buku']; ?></td>
              <td><?= $m['jumlah']; ?></td>
              <td><?= $m['penerbit']; ?></td>
              <!-- <td><?= $m['pengarang']; ?></td> -->
              <td><?= $m['tahun']; ?></td>

              <td>
                <a href="/buku/edit/<?= $m['kode_buku']; ?>" class="btn btn-success btn-sm">Ubah<i class="bi bi-pencil-square"></i></a> | <a 
                href="/buku/delete/<?= $m['kode_buku']; ?>" class="btn btn-danger btn-sm"
                onClick="return confirm('yakin mau hapus data:  <?= $m['kode_buku']; ?>'); ">Delete<i class="bi bi-calendar-x"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
<?= $this->endSection(); ?>