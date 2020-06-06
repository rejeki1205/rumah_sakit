        <!-- jQuery -->
        <script src="<?=base_url()?>assets_admin/vendors/jquery/dist/jquery.min.js"></script>
        <!-- dropify -->
        <script src="<?=base_url()?>assets_admin/dropify/dist/js/dropify.min.js"></script>

        <div class="">
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Form News Content</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br/>
                  <form class="form-horizontal form-label-left" method="post" action="<?=base_url()?>newscontent/add_edit_save/<?=$id_news?>/<?=$id_item?>" enctype="multipart/form-data">

                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Title</label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" placeholder="Title" name="title" value="<?php if($item) { echo $item[0]->judul; } ?>" required>
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Content</label>
                        <div class="col-md-9 col-sm-9 ">
                          <textarea name="content"><?php if($item) { echo $item[0]->keterangan; } ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Image</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="file" id="foto" class="dropify" name="foto" accept="jpg|jpeg|png" />
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                          <a href="<?=base_url()?>newscontent/news/<?=$id_news?>" class="btn btn-danger">Back</a>
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
        <script>
            tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange formatpainter linkchecker lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
            toolbar_drawer: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            });
        </script>
        <?php if($item) { ?>
        <script>
            var baseUrlFile = "<?php echo base_url();?>assets/image_news/<?=$item[0]->foto;?>";
            console.log("FILE: "+baseUrlFile);
            var drEvent = $('#foto').dropify();
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();
            drEvent.settings['defaultFile']=baseUrlFile;
            drEvent.destroy();
            drEvent.init();
        </script>
        <?php } else { ?>
            <script>
                var drEvent = $('#foto').dropify();
            </script>
        <?php } ?>