        <?php 
        //var_dump($data); die;
        ?>
        <div class="sidebar">
        <h2>Toko Sigma</h2>
        <a class="nav-link" href="<?php echo BASE_URL?>/admin/">Home <span class="sr-only">(current)</span></a>
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
        <div class="table-container">
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $data['hasilTabel'] as $row) {?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['nama_user']?></td>
                            <td><?php echo $row['alamat_user']?></td>
                            <td><?php echo $row['no_user']?></td>
                            <td><?php echo $row['email_user']?></td>
                            <td><?php echo $row['foto']?></td>
                            <td><?php echo $row['role']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
        </table>
        </div>
        </div>