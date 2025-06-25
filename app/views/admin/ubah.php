<?php
// tangkap hasil dari controller 
$data = $data['buku'];
//var_dump($data); die; 
?>
<a href="<?php echo BASE_URL?>/admin"><button>Kembali</button></a>
<section class="container my-5" style="max-width: 480px;"> 
        <!-- Ubah -->
        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
          <form action="<?php echo BASE_URL;?>/admin/ubahBuku"<?php echo $data['id']?> method="POST" enctype="multipart/form-data">
                    <!-- hidden input untuk id -->
                    <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama :</span>
                        </div>
                        <input type="text" name="nama" id="nama" value="<?php echo $data['nama']?>" placeholder="nama buku" aria-label="Username" aria-describedby="basic-addon1" >
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Stok :</span>
                        </div>
                        <input type="number" name="stok" placeholder="stok" id="stok" value="<?php echo $data['stok']?>" aria-label="Username" aria-describedby="basic-addon1" >
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Harga :</span>
                        </div>
                        <input type="number" name="harga" placeholder="harga" id="harga" value="<?php echo $data['harga']?>" aria-label="Username" aria-describedby="basic-addon1" >
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Penulis :</span>
                        </div>
                        <input type="text" name="penulis" placeholder="penulis" id="penulis" value="<?php echo $data['penulis']?>" aria-label="Username" aria-describedby="basic-addon1" >
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Upload Foto :</span>
                        </div>
                        <input type="file" name="foto"  id="foto" aria-label="Username"  value="<?php echo $data['penulis']?>" aria-describedby="basic-addon1" >
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <select name="id_kategori" id="id_kategori" >
                                <option value="1">Pendidikan</option>
                                <option value="2">Romansa</option>
                                <option value="3">Komik</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="close" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
        </div>
      </div>
    </section>