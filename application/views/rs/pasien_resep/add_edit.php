        <!-- jQuery -->
        <script src="<?=base_url()?>assets_admin/vendors/jquery/dist/jquery.min.js"></script>

        <div class="">
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>BIODATA PASIEN</h2> 
                  <div class="clearfix"></div>
                  <a href="<?=base_url()?>pasienresep/report" class="btn btn-primary"><i class="fa fa-download"></i> Download Report</a>
                </div>
                <div class="x_content">
                  <table class="table table-striped table-bordered" style="width:100%">
                      <tr>
                          <td width="20%">ID Data Pemeriksaan</td>
                          <td><?=$data_pasien[0]['id_data_pemeriksaan']?></td>
                      </tr>
                      <tr>
                          <td width="20%">No Rekam Medis</td>
                          <td><?=$data_pasien[0]['no_rekam_medis']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Nama Pasien</td>
                          <td><?=$data_pasien[0]['nama_pasien']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Jenis Kelamin</td>
                          <td><?=$data_pasien[0]['jenis_kelamin']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Alamat</td>
                          <td><?=$data_pasien[0]['alamat']?></td>
                      </tr>
                      <tr>
                          <td width="20%">No HP</td>
                          <td><?=$data_pasien[0]['no_tlp']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Anamase</td>
                          <td><?=$data_pasien[0]['anamase']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Diagnosis</td>
                          <td><?=$data_pasien[0]['diagnosis']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Tindakan</td>
                          <td><?=$data_pasien[0]['tindakan']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Obat</td>
                          <td><?=$data_pasien[0]['obat']?></td>
                      </tr>
                      <tr>
                          <td width="20%">Tanggal Periksa</td>
                          <td><?=date("d/m/Y", strtotime($data_pasien[0]['tanggal_periksa']))?></td>
                      </tr>
                      <tr>
                          <td width="20%">Status</td>
                          <td><?=strtoupper($data_pasien[0]['status_pemeriksaan'])?></td>
                      </tr>
                      
                  </table>
                  <hr/>
                </div>
                <div class="x_title">
                  <h2>OBAT PASIEN</h2>
                  <div class="clearfix"></div>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus-square"></i> Tambah Obat</button>
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                          <th width="5">No</th>
                          <th>Nama Obat</th>
                          <th>Status</th>
                          <th>QTY</th>
                          <th>Harga</th>
                          <th>Total Harga</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php 
                              $no = 1;
                              $tot_all = 0;
                              foreach($data_obat as $row) {
                                $tot_all += $row['harga']*$row['qty'];
                                  ?>
                                  <tr>
                                      <td><?php echo $no; ?></td>
                                      <td><?php echo $row['nama_obat'];?></td>
                                      <td><?php echo strtoupper($row['status']);?></td>
                                      <td style="text-align:right"><?php echo number_format($row['qty']);?></td>
                                      <td style="text-align:right">Rp. <?php echo number_format($row['harga']);?></td>
                                      <td style="text-align:right">Rp. <?php echo number_format(($row['harga']*$row['qty']));?></td>
                                  </tr>
                                  <?php
                          $no++;    
                          } 
                          ?>
                      </tbody>
                      <tfoot>
                        <td colspan="5"><b>Total</b></td>
                        <td style="text-align:right"><b>Rp. <?=number_format($tot_all)?></b></td>
                      </tfoot>
                  </table>
                  <div class="ln_solid"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Large modal -->

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Form Pemberian Obat</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <form class="form-horizontal form-label-left" method="post" action="<?=base_url()?>pasienresep/add_obat/<?=$data_pasien[0]['id_data_pemeriksaan']?>">
                <div class="modal-body">
                  <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Nama Obat</label>
                    <div class="col-md-9 col-sm-9 ">
                      <input type="text" class="form-control" placeholder="Nama Obat" name="obat" required onkeyup="cekobat()" id="obat">
                      <input type="hidden" id="id_obat" name="id_obat" >
                      <div class="obat-result" id="obat-result"></div>
                    </div>
                  </div>
                  <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">QTY</label>
                    <div class="col-md-9 col-sm-9 ">
                      <input type="number" class="form-control" placeholder="QTY" name="qty" required>
                    </div>
                  </div>
                  <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Status</label>
                    <div class="col-md-9 col-sm-9 ">
                      <select class="form-control" name="status">
                        <option value="ready">Ready</option>
                        <option value="not ready">Not Ready</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <script>
          function cekobat() {
            var search = $("#obat").val();
            // console.log(obat);

            if(search==''){
              $("#obat-result").hide();
            }else{
              $("#obat-result").show();
            }
            console.log(search);
            $('#obat-result').html('');
            $.ajax({
              type:"GET",
              url:"<?=base_url()?>pasienresep/getobat?search="+search,
              success: function (data) {
                $("#obat-result").html(data);
              }
            });
          }

          function setValue(id, name) {
            $('#obat-result').html('');
            $('#id_obat').val(id);
            $('#obat').val(name);
          }
        </script>