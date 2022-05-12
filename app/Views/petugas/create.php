<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
      <h1 class="d-flex justify-content-center">Form Tambah Petugas</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
          <form action="/petugas/save" method="POST">
          <?= csrf_field(); ?>
          <div class="mb-3">
              <label for="inputdatakode" class="form-label">id Petugas</label>
              <input type="text" class="form-control <?= ($validation->hasError ('id')) ? 
              'is-invalid' : '';?>" name="id" autofocus value="<?= old('id'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("id"); ?>

            </div>
            </div>

            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Email</label>
              <input type="text" class="form-control <?= ($validation->hasError ('email')) ? 
              'is-invalid' : '';?>" name="email" value="<?= old('email'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("email"); ?>

            </div>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">User Name</label>
              <input type="text" class="form-control <?= ($validation->hasError ('username')) ? 
              'is-invalid' : '';?>" name="username" value="<?= old('username'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("username"); ?>

            </div>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Password</label>
              <input type="text" class="form-control <?= ($validation->hasError ('password_hash')) ? 
              'is-invalid' : '';?>" name="password_hash" value="<?= old('password_hash'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("password_hash"); ?>

            </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>