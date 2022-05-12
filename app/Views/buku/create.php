<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
      <h1 class="d-flex justify-content-center">Form Tambah Buku</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
          <form action="/buku/save" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Kode Buku</label>
              <input type="text" class="form-control <?= ($validation->hasError ('kode_buku')) ? 
              'is-invalid' : '';?>" name="kode_buku" autofocus value="<?= old('kode_buku'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("kode_buku"); ?>

            </div>
            </div>
            <!-- <div class="mb-3">
              <label for="inputdatakode" class="form-label">Katagori</label>
              <input type="text" class="form-control <?= ($validation->hasError ('katagori')) ? 
              'is-invalid' : '';?>" name="katagori" autofocus value="<?= old('katagori'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("katagori"); ?>

            </div>
              <select class="form-select" aria-label="Default select example" name="katagori" >
                <option selected>pilih Katagori</option>
                <option value="Buku Bacaan">Buku Bacaan</option>
                <option value="Buku Pelajaran">Buku Pelajaran</option>
                <option value="Buku Refrensi kls 1-2">Buku Refrensi kls 1-2</option>
                <option value="Buku Refrensi kls 3-4">Buku Refrensi kls 3-4</option>
                <option value="Buku Refrensi kls 2">Buku Refrensi kls 2</option>
                <option value="Buku Refrensi kls 6">Buku Refrensi kls 6</option>
                <option value="Buku SMART untuk kls 6">Buku SMART untuk kls 6</option>
                <option value="Buku Detik Demi Detik US/M">Buku Detik Demi Detik US/M</option>
                <option value="Buku Prestasi Sukses Munas">Buku Prestasi Sukses Munas</option>
              </select>
            </div> -->
            <div class="mb-3"> 
            <label for="inputdatakode" class="form-label">Nama Buku</label>
            <input type="text" class="form-control <?= ($validation->hasError ('nama_buku')) ? 
              'is-invalid' : '';?>" name="nama_buku" value="<?= old('nama_buku'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("nama_buku"); ?>

            </div>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Jumlah</label>
              <input type="text" class="form-control <?= ($validation->hasError ('jumlah')) ? 
              'is-invalid' : '';?>" name="jumlah" value="<?= old('jumlah'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("jumlah"); ?>

            </div>

            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Penerbit</label>
              <input type="text" class="form-control <?= ($validation->hasError ('penerbit')) ? 
              'is-invalid' : '';?>" name="penerbit" value="<?= old('penerbit'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("penerbit"); ?>

            </div>

            <div class="mb-3">
              <label for="inputpenanggungjawab" class="form-label">Tahun</label>
              <input type="text" class="form-control <?= ($validation->hasError ('tahun')) ? 
              'is-invalid' : '';?>" name="tahun" value="<?= old('tahun'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("tahun"); ?>

            </div>

            <Br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>