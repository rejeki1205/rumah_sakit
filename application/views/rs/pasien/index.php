<div class="">

    <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Pasien</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="<?=base_url()?>pasien/add_edit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Pasien</a>
                                <br/>
                                <br/>
                                <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>ID Pasien</th>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No Tlp</th>
                                        <th>Nomor RM</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($data_pasien as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['id_pasien'];?></td>
                                                    <td><?php echo $row['nama_pasien'];?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($row['tgl_lahir']));?></td>
                                                    <td><?php if($row['jenis_kelamin'] == "l") { echo "Laki-laki"; }else { echo "Perempuan"; }?></td>
                                                    <td><?php echo $row['alamat'];?></td>
                                                    <td><?php echo $row['no_tlp'];?></td>
                                                    <td><?php echo $row['no_rekam_medis'];?></td>
                                                    <td><a href="<?php echo base_url()?>pasien/add_edit/<?php echo $row['id_pasien']; ?>" 
                                                    class="btn btn-info btn-sm" title="edit"><i class="fa fa-pencil"></i></a> 
                                                        <a href="<?php echo base_url()?>rekam_medis/detil_rm/<?php echo $row['id_pasien']; ?>"
                                                        class="btn btn-success btn-sm" title="Detil RM"><i class="fa fa-eye"></i></a> 
                                                    </td>
                                                </tr>
                                                <?php
                                            } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>