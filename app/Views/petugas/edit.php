<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
      <h1 class="d-flex justify-content-center">Form Edit Petugas</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
        <?php foreach ($users as $t) : ?>
          <form action="/petugas/update/<?= $t['id']; ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Kode Ruangan</label>
              <input type="text" class="form-control"  name="id" 
              autofocus value="<?= $t['id']; ?>" readonly>
            
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Email</label>
              <input type="text" class="form-control " name="email" value="<?= $t['email']; ?>">

            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">User Name</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="username" value="<?= $t['username']; ?>"/>
            
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Password</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="password_hash" value="<?= $t['password_hash']; ?>"/>
            
            <Br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Batal</button>
            <?php endforeach; ?>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>