<div class="">

    <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Dokter</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="<?=base_url()?>dokter/add_edit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Dokter</a>
                                <br/>
                                <br/>
                                <?=$this->session->flashdata('msg')?>
                                <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Kode Dokter</th>
                                        <th>Nama Dokter</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($data_dokter as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['kode_dokter'];?></td>
                                                    <td><?php echo $row['nama_dokter'];?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($row['tanggal_lahir']));?></td>
                                                    <td><?php echo $row['tempat_lahir'];?></td>
                                                    <td><?php if($row['jenis_kelamin'] == "L") { echo "Laki-laki"; }else { echo "Perempuan"; }?></td>
                                                    <td><?php echo $row['alamat_tinggal'];?></td>
                                                    <td><?php echo $row['no_hp'];?></td>
                                                    <td><a href="<?php echo base_url()?>dokter/add_edit/<?php echo $row['kode_dokter']; ?>" 
                                                    class="btn btn-info btn-sm" title="edit"><i class="fa fa-pencil"></i></a> 
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