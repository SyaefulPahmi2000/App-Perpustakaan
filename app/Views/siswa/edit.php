<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
      <h1 class="d-flex justify-content-center">Form Edit Data Siswa</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
        <?php foreach ($siswa as $d) : ?>
          <form action="/siswa/update/<?= $d['NIS']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="foto" value="<?= $d['poto'] ?>">
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">NIS</label>
              <input type="text" class="form-control" name="NIS" 
              autofocus value="<?= $d['NIS']; ?>" readonly>
              <!-- readonly pungsinya adalah biar NIS tidak bisa di ubah  -->
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama Siswa</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="nama_siswa" 
              value="<?= $d['nama_siswa']; ?>"/>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Kelas</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="kelas" 
              value="<?= $d['kelas'];  ?>" />
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Jenis Kelamin</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="jenis_kelamin" 
              value="<?= $d['jenis_kelamin'];  ?>" />
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="alamat" 
              value="<?= $d['alamat'];  ?>" />
            </div>

 

            <div class="table-responsive mt-3">
              <button type="submit" class="btn btn-primary">Simpat</button>
              <button type="reset" class="btn btn-danger">Batal</button>
            </div>
            <?php endforeach; ?>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>