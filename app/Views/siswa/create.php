<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
      <h1 class="d-flex justify-content-center">Form Tambah Data Siswa</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
          <form action="/siswa/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3">
              <label for="inputdatakode" class="form-label">NIS</label>
              <input type="text" class="form-control <?= ($validation->hasError ('NIS')) ? 
              'is-invalid' : '';?>" name="NIS" autofocus value="<?= old('NIS'); ?>"/>
            <div class="invalid-feedback">
              <?=$validation->getError("NIS"); ?>

            </div>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama siswa</label>
              <input type="text" class="form-control <?= ($validation->hasError ('nama_siswa')) ? 
              'is-invalid' : '';?>" name="nama_siswa" autofocus value="<?= old('nama_siswa'); ?>"/>
            <div class="invalid-feedback">
              <?=$validation->getError("nama_siswa"); ?>

            </div>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Kelas</label>
              <input type="text" class="form-control <?= ($validation->hasError ('kelas')) ? 
              'is-invalid' : '';?>" name="kelas" autofocus value="<?= old('kelas'); ?>"/>
            <div class="invalid-feedback">
              <?=$validation->getError("kelas"); ?>

            </div>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Jenis Kelamin</label>
              <input type="text" class="form-control <?= ($validation->hasError ('jenis_kelamin')) ? 
              'is-invalid' : '';?>" name="jenis_kelamin" autofocus value="<?= old('jenis_kelamin'); ?>"/>
            <div class="invalid-feedback">
              <?=$validation->getError("jenis_kelamin"); ?>

            </div>
            </div>
            
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Alamat</label>
              <input type="text" class="form-control <?= ($validation->hasError ('alamat')) ? 
              'is-invalid' : '';?>" name="alamat" autofocus value="<?= old('alamat'); ?>"/>
            <div class="invalid-feedback">
              <?=$validation->getError("alamat"); ?>

            </div>
            </div>
            



            <div class="table-responsive mt-3">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>