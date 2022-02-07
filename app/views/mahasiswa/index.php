<div class="container mt-5">

<!-- menampilkan alert -->
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <h3>Daftar Mahasiswa</h3>
      <!-- searching data -->
      <div class="row">
        <div class="col-lg-12">
          <form action="<?= BASEURL; ?>/mahasiswa/cari" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari Mahasiswa..." name="keyword" id="keyword" autocomplete="off">
              <button class="btn btn-primary" type="submit" id="tombolCari">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- end searching data -->
      <!-- table mahasiswa -->
      <ul class="list-group list-group-numbered">
        <?php foreach ($data['mhs'] as $mhs) : ?>
          <li class="list-group-item">
            <?= $mhs['nama'] ?>
            <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id'] ?>" class="float-end badge bg-danger rounded-pill ms-1" style="text-decoration: none;" onclick="return confirm('yakin?')">Hapus</a>

            <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id'] ?>" class="float-end badge bg-secondary rounded-pill ms-1 tampilModalUbah" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id'] ?>">Ubah</a>

            <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="float-end badge bg-primary rounded-pill" style="text-decoration: none;">Detail</a>
          </li>
        <?php endforeach; ?>
      </ul>
      <!-- end table mahasiswa -->
      <!-- Button trigger modal -->
      <div class="d-grid gap-2 col-4">
        <button type="button" class="mt-4 btn btn-primary btn-lg tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
          Tambah Data Mahasiswa
        </button>
      </div>
      <!-- End Button trigger modal -->
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- modal form -->
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="POST" style="width: 450px;" class="mx-auto">
          <input type="hidden" name="id" id="id">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="mb-3">
            <label for="nim" class="form-label">Nim</label>
            <input type="number" class="form-control" id="nim" name="nim">
          </div>
          <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <select class="form-select form-select-lg" id="jurusan" name="jurusan" aria-label="Default select example">
            <option selected for="jurusan">Jurusan</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Sistem Komputer">Sistem Komputer</option>
            <option value="Management Informatika">Management Informatika</option>
            <option value="Bisnis Digital">Bisnis Digital</option>
            <option value="Teknologi Informasi">Teknologi Informasi</option>
          </select>
      </div>
          <!-- modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form> <!-- tutup modal form -->
          </div> <!-- tutup modal footer -->
    </div>
  </div>
</div>