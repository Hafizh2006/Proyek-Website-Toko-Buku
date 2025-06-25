        <?php 
        //var_dump($data); die;
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL?>/admin/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL ?>/admin/user">User</a>
                    </li>
                </ul>
            </div>
        </nav>
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
                            <td><a href="<?php echo BASE_URL?>/admin/hapus/<?php echo $row['id'] ?>" style="color:white" ><button class="btn btn-danger">Hapus</button></a></td>
                            <td><a href="<?php echo BASE_URL?>/admin/ubah/<?php echo $row['id'] ?>" style="color:white" ><button class="btn btn-primary">Ubah</button></a></td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
        </table>
        <div style="display: flex">
            <div>
                <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Buku</button>
            </div>

            <div>
                <button style="margin: 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKategori">Tambah Kategori</button>
            </div>

            <div>
                <a href="<?php echo BASE_URL?>/admin/logout"><button style="margin: 5px" type="button" class="btn btn-danger" >Logout</button></a>
            </div>
        </div>




        <!-- Modal Buku -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah">Tambah buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
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
                            <select name="id_kategori" id="id_kategori">
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
        </div>
        </div>






        <!-- Modal Kategori-->
        <div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKategori">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
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
                        <button type="button" name="close" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
        </div>





        