<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
      <h1 class="d-flex justify-content-center">Form Edit Buku</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
        <?php foreach ($buku as $b) : ?>
          <form action="/buku/update/<?= $b['kode_buku']; ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Kode Buku</label>
              <input type="text" class="form-control"  name="kode_buku" 
              autofocus value="<?= $b['kode_buku']; ?>" >
              
            </div>
 
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama Buku</label>
              <input type="text" class="form-control" id="" aria-describedby="" 
              name="nama_buku" value="<?= $b['nama_buku']; ?>"/>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Jumlah</label>
              <input type="text" class="form-control" id="" aria-describedby="" 
              name="jumlah" value="<?= $b['jumlah']; ?>"/>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">penerbit</label>
              <input type="text" class="form-control" id="" aria-describedby="" 
              name="penerbit" value="<?= $b['penerbit']; ?>" />

            <div class="mb-3">
              <label for="inputpenanggungjawab" class="form-label">Tahun</label>
              <input type="text" class="form-control" id="" aria-describedby="" 
              name="tahun" value="<?= $b['tahun']; ?>"/>
            </div>

            <Br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
            <?php endforeach; ?>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>