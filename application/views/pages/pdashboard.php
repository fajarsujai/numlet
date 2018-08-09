
        <div class="span9" id="content">
        <div class="row-fluid">
            <div class="span6">
                            <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Pengajuan Surat</div>
                        <div class="pull-right"><span class="badge badge-info"><?php echo $banyak_surat; ?></span>

                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tujuan</th>
                                    <th>Perihal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($surat_baru as $sb) {
                                    
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $sb['tujuan']; ?></td>
                                    <td><?php echo $sb['perihal']; ?></td>
                                    <td><?php echo $sb['status']; ?></td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="span6">
                            <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">User Baru</div>
                        <div class="pull-right"><span class="badge badge-info"><?php echo $banyak_user;  ?></span>

                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($user_baru as $ub) {
                                    
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $ub['nama_user']; ?></td>
                                    <td><?php echo $ub['nip']; ?></td>
                                    <td><?php echo $ub['status']; ?></td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>               
    </div>
</div>