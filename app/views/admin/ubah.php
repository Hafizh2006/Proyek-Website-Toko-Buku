<?php
// tangkap hasil dari controller 
$data = $data['buku'];
//var_dump($data); die; 
?>
<!-- <a href="<?php echo BASE_URL?>/admin"><button>Kembali</button></a> -->
<section class="container my-5" style=" border-style: solid; border-color: black; margin-left: auto; margin-right: auto; width: 700px; border-radius: 5px; margin-top: 15px; margin-bottom: 15px;">
        <!-- Ubah -->
        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
          <form action="<?php echo BASE_URL;?>/admin/ubahBuku" method="POST" enctype="multipart/form-data">
                    <!-- hidden input untuk id -->
                    <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama :</span>
                        </div>
                        <input style="width: 100%; height: 40px; font-size: 16px;" type="text" name="nama" id="nama" value="<?php echo $data['nama']?>" placeholder="nama buku" aria-label="Username" aria-describedby="basic-addon1" >
                    </div>

                    <!-- <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Stok :</span>
                        </div>
                        <inpu style="width: 100%; height: 40px; font-size: 16px;" type="number" name="stok" placeholder="stok" id="stok" value="<?php echo $data['stok']?>" aria-label="Username" aria-describedby="basic-addon1" >
                    </div> -->

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Stok :</span>
                        </div>
                        <input style="width: 100%; height: 40px; font-size: 16px;" type="number" name="stok" placeholder="stok" id="stok" value="<?php echo $data['stok']?>" aria-label="Username" aria-describedby="basic-addon1" >
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Harga :</span>
                        </div>
                        <input style="width: 100%; height: 40px; font-size: 16px;" type="number" name="harga" placeholder="harga" id="harga" value="<?php echo $data['harga']?>" aria-label="Username" aria-describedby="basic-addon1" >
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Penulis :</span>
                        </div>
                        <input style="width: 100%; height: 40px; font-size: 16px;" type="text" name="penulis" placeholder="penulis" id="penulis" value="<?php echo $data['penulis']?>" aria-label="Username" aria-describedby="basic-addon1" >
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Upload Foto :</span>
                        </div>
                        <input style="width: 100%; height: 40px; font-size: 16px;" type="file" name="foto"  id="foto" aria-label="Username"  value="<?php echo $data['foto']?>" aria-describedby="basic-addon1" >
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Halaman :</span>
                        </div>
                        <input style="width: 100%; height: 40px; font-size: 16px;" type="text" name="halaman" placeholder="halaman" id="halaman" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Lebar :</span>
                        </div>
                        <input style="width: 100%; height: 40px; font-size: 16px;" type="text" name="lebar" placeholder="lebar" id="lebar" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Panjang :</span>
                        </div>
                        <input style="width: 100%; height: 40px; font-size: 16px;" type="text" name="panjang" placeholder="panjang" id="panjang" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Berat :</span>
                        </div>
                        <input style="width: 100%; height: 40px; font-size: 16px;" type="text" name="berat" placeholder="berat" id="berat" aria-label="Username" aria-describedby="basic-addon1">
                    </div>


                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Sinopsis :</span>
                        </div>
                        <textarea  style="width: 100%; height: 40px; font-size: 16px;" name="sinopsis" id="sinopsis" placeholder="sinopsis"></textarea>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <select style="width: 100%; height: 40px; font-size: 16px;" name="id_kategori" id="id_kategori" >
                                <option value="1">Pendidikan</option>
                                <option value="2">Romansa</option>
                                <option value="3">Komik</option>
                                <option value="4">Novel</option>
                            </select>
                        </div>
                    <br>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo BASE_URL?>/admin"><button style=" border-radius: 5px; color: white; border: none; width: 100px; height: 40px; font-size: 16px; background-color: #e74c3c; cursor: pointer;" type="button" name="close" class="btn btn-secondary" data-dismiss="modal">Batal</button></a>
                        <button style=" border-radius: 5px; color: white; border: none; width: 100px; height: 40px; font-size: 16px; background-color: #0d6efd; cursor: pointer;"  type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
        </div>
      </div>
</section>
