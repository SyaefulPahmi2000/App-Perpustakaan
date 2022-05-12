<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

    <div class="container mt-5">
      <h1 class="d-flex justify-content-center">Data Petugas</h1>
      <a href="/petugas/create" type="button" class="btn btn-primary">Tambah Data <i class="bi bi-plus"></i></a>
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
              <th>id</th>
              <th>Email</th>
              <th>User Name</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1; ?>
            <?php foreach ($users as $r) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $r['id']; ?></td>
              <td><?= $r['email']; ?></td>
              <td><?= $r['username']; ?></td>
              <td><?= $r['password_hash']; ?></td>


              <td>
                <a href="/petugas/edit/<?= $r['id']; ?>"  class="btn btn-success btn-sm">Ubah<i class="bi bi-pencil-square"></i></a> | <a 
                href="/petugas/delete/<?= $r['id']; ?>" class="btn btn-danger btn-sm"
                onClick="return confirm('yakin mau hapus data <?= $r['email']; ?>'); ">Delete<i class="bi bi-calendar-x"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>



<?= $this->endSection(); ?>