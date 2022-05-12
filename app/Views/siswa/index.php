<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

    <div class="container mt-5">
      <h1 class="d-flex justify-content-center">Data Siswa</h1>
      <a href="/siswa/create" type="button" class="btn btn-primary">Tambah Data <i class="bi bi-plus"></i></a>
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
              <!-- <th>Foto</th> -->
              <th>NIS</th>
              <th>Nama siswa</th>
              <th>Kelas</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1; ?>
            <?php foreach ($siswa as $n) : ?>
            <tr>
              <td><?= $no++; ?></td>

              <td><?= $n['NIS']; ?></td>
              <td><?= $n['nama_siswa']; ?></td>
              <td><?= $n['kelas']; ?></td>
              <td><?= $n['jenis_kelamin']; ?></td>
              <td><?= $n['alamat']; ?></td>


              <td>
                <a href="/siswa/edit/<?= $n['NIS']; ?>" class="btn btn-success btn-sm">Ubah<i class="bi bi-pencil-square"></i></a> | <a 
                href="/siswa/delete/<?= $n['NIS']; ?>" class="btn btn-danger btn-sm"
                onClick="return confirm('yakin mau hapus data:  <?= $n['nama_siswa']; ?>'); ">Delete<i class="bi bi-calendar-x"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>



<?= $this->endSection(); ?>