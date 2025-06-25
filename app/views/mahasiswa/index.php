<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flash::flash() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#tambahMahasiswa">
                Tambah mahasiswa
            </button>
            <br><br>
            <ul class="list-group">
                    <?php foreach($data['mhs'] as $mhs):?>
                        <li class="list-group-item">
                            <?php echo $mhs['nama']?>
                            <a href="<?php echo BASE_URL?>/mahasiswa/detail/<?php echo $mhs['id']?>" class="badge badge-primary">Data</a>
                            <a href="<?php echo BASE_URL?>/mahasiswa/ubah/<?php echo $mhs['id']?>" class="badge badge-secondary tombolUbahData" class="btn btn-primary" data-toggle="modal" data-target="#tambahMahasiswa" data-id="<?php echo $mhs['id'];?>">Ubah</a>
                            <a href="<?php echo BASE_URL?>/mahasiswa/hapus/<?php echo $mhs['id']?>" class="badge badge-danger">Hapus</a>
                        </li>
                    <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="tambahMahasiswa" tabindex="-1" role="dialog" aria-labelledby="tambahDataMahasiswa" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <form action="<?php echo BASE_URL?>/mahasiswa/tambah" method="post">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required>
            </div>
            <br>
            <div class="form-group">
                <label for="kelas">Kelas : </label>
                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="kelas" required>
            </div>
            <br>
            <div class="form-group">
                <label for="prodi">Prodi : </label>
                <select class="form-control" id="prodi" name="prodi">
                <option value="Informatika">Informatika</option>
                <option value="Mesin">Mesin</option>
                <option value="Pangan"> Pangan</option>
                <option value="Suster">Suster</option>
                <option value="Ekonomi">Ekonomi</option>
                </select required>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
        
            </div>
    </div>
    </form>
  </div>
</div>