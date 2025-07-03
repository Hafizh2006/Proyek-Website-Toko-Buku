        <?php 
        //var_dump($data); die;
        ?>
        <div class="sidebar">
        <h2>Toko Sigma</h2>
        <a class="nav-link" href="<?php echo BASE_URL?>/admin/">Home <span class="sr-only"></span></a>
        <a class="nav-link" href="<?php echo BASE_URL ?>/admin/user">User</a>
        <a href="<?php echo BASE_URL?>/admin/logout">Log Out</a>
        </div>
        <div class="content">
        <!-- Pesan yang ditampilkan dalam setiap aksi -->
        <div>
            <div class="col-lg-6">
                <?php Flash::flash() ?>
            </div>
        </div>
        <!--  penerapan tabel --> 
             
        
        <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th><?php echo $data['kolom'][0]?></th>
                            <th><?php echo $data['kolom'][1]?></th>
                        <th><?php echo $data['kolom'][2]?></th>
                        <th><?php echo $data['kolom'][3]?></th>
                        <th><?php echo $data['kolom'][4]?></th>
                        <th><?php echo $data['kolom'][5]?></th>
                        <th><?php echo $data['kolom'][6]?></th>
                        <th><?php echo $data['kolom'][7]?></th>
                        <th><?php echo $data['kolom'][8]?></th>
                        <th><?php echo $data['kolom'][9]?></th>
                        <th><?php echo $data['kolom'][10]?></th>
                        <th><?php echo $data['kolom'][11]?></th>
                            <th>Hapus</th>
                            <th>Ubah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $data['hasilTabel'] as $row) {?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['nama']?></td>
                            <td><?php echo $row['harga']?></td>
                            <td><?php echo $row['stok']?></td>
                            <td><?php echo $row['penulis']?></td>
                            <td><?php echo $row['id_kategori']?></td>
                            <td><?php echo $row['foto']?></td>
                            <td><?php echo $row['halaman']?></td>
                            <td><?php echo $row['lebar']?></td>
                            <td><?php echo $row['panjang']?></td>
                            <td><?php echo $row['berat']?></td>
                            <td><?php echo $row['sinopsis']?></td>
                            <td><a href="<?php echo BASE_URL?>/admin/hapus/<?php echo $row['id'] ?>"><button style="border-radius: 5px; background-color: #e74c3c; color: white; border: none; padding-top: 5px; padding-bottom: 5px; width: 70px; cursor: pointer;">Hapus</button></a></td>
                            <td><a href="<?php echo BASE_URL?>/admin/ubah/<?php echo $row['id'] ?>"><button style="border-radius: 5px; background-color: #3498db; color: white; border: none; padding-top: 5px; padding-bottom: 5px; width: 70px; cursor: pointer;">Ubah</button></a></td>
                            
                            
                        </tr>
                    <?php } ?>
                </tbody>
        </table>
        <div style="display: flex">
            <div>
                <button style="margin: 5px; border-radius: 5px; background-color: #3498db; color: white; border: none; padding: 10px; cursor: pointer;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Buku</button>
            </div>

            <div>
                <button style="margin: 5px; border-radius: 5px; background-color: #3498db; color: white; border: none; padding: 10px; cursor: pointer;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKategori">Tambah Kategori</button>
            </div>
        </div>
        </div>




        <!-- Modal Buku -->
        <div margin class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="tambah">Tambah buku</h3>
            </div>
            <div class="modal-body">
                <form action="<?php echo BASE_URL;?>/admin/tambahBuku" method="POST" enctype="multipart/form-data">
                    
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama :</span>
                        </div>
                        <input type="text" name="nama" id="nama" placeholder="nama buku" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Stok :</span>
                        </div>
                        <input type="number" name="stok" placeholder="stok" id="stok" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Harga :</span>
                        </div>
                        <input type="number" name="harga" placeholder="harga" id="harga" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Penulis :</span>
                        </div>
                        <input type="text" name="penulis" placeholder="penulis" id="penulis" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Upload Foto :</span>
                        </div>
                        <input type="file" name="foto"  id="foto" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Halaman :</span>
                        </div>
                        <input type="text" name="halaman" placeholder="halaman" id="halaman" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Lebar :</span>
                        </div>
                        <input type="text" name="lebar" placeholder="lebar" id="lebar" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Panjang :</span>
                        </div>
                        <input type="text" name="panjang" placeholder="panjang" id="panjang" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Berat :</span>
                        </div>
                        <input type="text" name="berat" placeholder="berat" id="berat" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>


                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Sinopsis :</span>
                        </div>
                        <textarea style="width: 500px; height: 80px; font-size: 16px;" name="sinopsis" placeholder="sinopsis" id="sinopsis" required>Sinopsis</textarea>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <select name="id_kategori" id="id_kategori">
                                <option value="1">Pendidikan</option>
                                <option value="2">Romansa</option>
                                <option value="3">Komik</option>
                                <option value="4">Novel</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button style=" border-radius: 5px; color: white; border: none; width: 100px; height: 40px; font-size: 16px; background-color: #e74c3c;;" type="button" name="close" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button style=" border-radius: 5px; color: white; border: none; width: 100px; height: 40px; font-size: 16px; background-color: #0d6efd; type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
        </div>






        <!-- Modal Kategori-->
        <div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="tambahKategori">Tambah Kategori</h3>
            </div>
            <div class="modal-body">
                <form action="<?php echo BASE_URL;?>/admin/tambahKategori" method="POST">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nama Kategori :</span>
                        </div>
                        <input type="text" name="nama" id="nama" placeholder="nama kategori" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="modal-footer">
                        <button style=" border-radius: 5px; color: white; border: none; width: 100px; height: 40px; font-size: 16px; background-color: #e74c3c;" type="button" name="close" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button  style=" border-radius: 5px; color: white; border: none; width: 100px; height: 40px; font-size: 16px; background-color: #0d6efd; type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
        </div>





        