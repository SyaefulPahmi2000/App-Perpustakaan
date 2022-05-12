<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
      <h1 class="d-flex justify-content-center">Form Tambah Peminjaman Buku </h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
        <?php if (session()->getFlashdata('message')) : ?>
          <div class="alert alert_primary mt-5" role="alert">
              <?= session()->getFlashdata('message'); ?>
          </div>
        <?php endif; ?>
          <form action="/peminjaman/save" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3">
              <label for="inputpenanggungjawab" class="form-label">Kode Peminjam</label>
              <input type="text" class="form-control <?= ($validation->hasError ('kode_peminjam')) ? 
              'is-invalid' : '';?>" name="kode_peminjam" value="<?= old('kode_peminjam'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("kode_peminjam"); ?>

            </div>
            </div>

            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama Peminjam</label>
              <input type="text" class="form-control <?= ($validation->hasError ('nama_peminjam')) ? 
              'is-invalid' : '';?>" name="nama_peminjam" value="<?= old('nama_peminjam'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("nama_peminjam"); ?>

            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama Buku</label>
              <input type="text" class="form-control <?= ($validation->hasError ('judul_buku')) ? 
              'is-invalid' : '';?>" name="judul_buku" value="<?= old('judul_buku'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("judul_buku"); ?>

            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Jumlah</label>
              <input type="text" class="form-control <?= ($validation->hasError ('jumlah')) ? 
              'is-invalid' : '';?>" name="jumlah" value="<?= old('jumlah'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("jumlah"); ?>

            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Kelas</label>
              <select class="form-select" aria-label="Default select example" name="kelas" >
                <option selected>pilih kelas</option>
                <?php foreach ($siswa as $k) : ?> 
                      <option value="<?= $k['kelas']; ?>"><?= $k['kelas'] . "-" . $k['kelas']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Tgl Peminjaman</label>
              <input type="date" class="form-control <?= ($validation->hasError ('tgl_pinjam')) ? 
              'is-invalid' : '';?>" name="tgl_pinjam" value="<?= old('tgl_pinjam'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("tgl_pinjam"); ?>

            </div>
            <div class="mb-3"> 
            <label for="inputdatakode" class="form-label">Tgl Kembali</label>
            <input type="date" class="form-control <?= ($validation->hasError ('tgl_kembali')) ? 
              'is-invalid' : '';?>" name="tgl_kembali" value="<?= old('tgl_kembali'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("tgl_kembali"); ?>

            </div>
            </div>


            <Br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>