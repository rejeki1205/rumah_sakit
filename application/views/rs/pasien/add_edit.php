        <!-- jQuery -->
        <script src="<?=base_url()?>assets_admin/vendors/jquery/dist/jquery.min.js"></script>

        <div class="">
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Form <?php if($pasien) { echo "Edit"; } else { echo "Registrasi"; } ?> Pasien</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br/>
                  <form class="form-horizontal form-label-left" method="post" action="<?=base_url()?>pasien/add_edit_save/<?php if($pasien) { echo $pasien[0]->id_pasien; } ?>" enctype="multipart/form-data">

                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Pasien</label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" placeholder="Nama Pasien" name="name" 
                          value="<?php if($pasien) { echo $pasien[0]->nama_pasien; } ?>" required>
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Tanggal Lahir</label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="tgl_lahir" 
                          value="<?php if($pasien) { echo $pasien[0]->tgl_lahir; } ?>" required>
                        </div>
                      </div>
                      
                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" placeholder="Alamat" name="alamat" 
                          value="<?php if($pasien) { echo $pasien[0]->alamat; } ?>" required>
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">No Telp</label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" placeholder="No Telp" name="tlp" 
                          value="<?php if($pasien) { echo $pasien[0]->no_tlp; } ?>" required>
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">No Rekam Medis</label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" placeholder="No Rekam Medis" name="no_rekam_medis" 
                          value="<?php if($pasien) { echo $pasien[0]->no_rekam_medis; } else { echo $no_rm; } ?>" required
                          <?php if($pasien) { echo "readonly"; }?>>
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Jenis Kelamin</label>
                        <div class="col-md-9 col-sm-9 ">
                        <div class="radio">
                                  <label>
                                  <input type="radio" class="flat" value="l" checked name="jk" <?php if($pasien) { if($pasien[0]->jenis_kelamin == 'l') { echo "checked"; } } ?>> Laki-Laki
                                  </label>
                              </div>
                              <div class="radio">
                                  <label>
                                  <input type="radio" class="flat" name="jk" value="p" <?php if($pasien) { if($pasien[0]->jenis_kelamin == 'p') { echo "checked"; } } ?>> Perempuan
                                  </label>
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                          <a href="<?=base_url()?>Pasien" class="btn btn-danger">Back</a>
                          <button type="reset" class="btn btn-warning">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>