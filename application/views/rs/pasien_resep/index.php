<div class="">

    <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Pemeriksaan Pasien</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <br/>
                                <br/>
                                <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th width="5">No</th>
                                        <th>Nama Pasien</th>
                                        <th>No RM</th>
                                        <th>Anamase</th>
                                        <th>Diagnosa</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th width="5">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($data_pasien as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['nama_pasien'];?></td>
                                                    <td><?php echo $row['no_rekam_medis'];?></td>
                                                    <td><?php echo $row['anamase'];?></td>
                                                    <td><?php echo $row['diagnosis'];?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($row['tanggal_periksa']));?></td>
                                                    <td><?php echo strtoupper($row['status_pemeriksaan']);?></td>
                                                    <td>
                                                        <a href="<?php echo base_url()?>pasienresep/detil_pasien/<?php echo $row['id_data_pemeriksaan']; ?>"
                                                        class="btn btn-info btn-sm" title="Detil"><i class="fa fa-eye"></i></a> 
                                                    </td>
                                                </tr>
                                                <?php
                                        $no++;    
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