   <!-- jQuery -->
   <script src="<?=base_url()?>assets_admin/vendors/jquery/dist/jquery.min.js"></script>

        <div class="">
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Form Menu</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br/>
                  <form data-parsley-validate class="form-horizontal form-label-left" action="<?=base_url()?>menu/add_edit_menu_save/<?php if($menuItem) { echo $menuItem[0]->id; } ?>" method="POST">
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="name" value="<?php if($menuItem) { echo $menuItem[0]->name; } ?>"
                          placeholder="ex. Sports" required="required" />
                      </div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Level Menu<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <select class="form-control" onchange="change_level()" id="level" name="level">
                            <option value="1" <?php if($menuItem) { if($menuItem[0]->level == 1) { echo "selected"; } } ?>>Level 1</option>
                            <option value="2" <?php if($menuItem) { if($menuItem[0]->level == 2) { echo "selected"; } } ?>>Level 2</option>
                        </select>
                        </div>
                    </div>
                    <div class="field item form-group" id="id_parent_level">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Id Parent Level<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                      <select class="form-control" name="id_parent_level">>
                            <?php 
                            foreach($menu as $v) {
                                ?>
                                <option <?php if($menuItem) { if($menuItem[0]->id_parent_level == $v->id) { echo "selected"; } } ?> value="<?=$v->id?>"><?=$v->id?> -- <?=$v->name?></option>
                                <?php 
                            }
                            ?>
                        </select></div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Link Address<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" value="<?php if($menuItem) { echo $menuItem[0]->controller; } ?>" name="controller" required='required' /></div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Icon</label>
                      <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="icon" value="<?php if($menuItem) { echo $menuItem[0]->icon; } ?>" ></div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Status<span
                          class="required">*</span></label>
                      <div class="col-md-6 col-sm-6">
                        <div class="radio">
                                <label>
                                <input type="radio" class="flat" value="active" checked name="status" <?php if($menuItem) { if($menuItem[0]->status == 'active') { echo "selected"; } } ?>> Active
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" class="flat" name="status" value="not active" <?php if($menuItem) { if($menuItem[0]->status == 'not active') { echo "selected"; } } ?>> Not Active
                                </label>
                            </div></div>
                    </div>
                    <div class="ln_solid">
                      <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <a class="btn btn-danger" href="<?=base_url()?>menu">Back</a>
                            <button type='reset' class="btn btn-warning">Reset</button>
                            <button type='submit' class="btn btn-primary" name="save">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if($menuItem) { if($menuItem[0]->level == 2) { echo "<script> $('#id_parent_level').show(); </script>"; } else { 
          echo "<script> $('#id_parent_level').hide(); </script>";
        } } else { echo "<script> $('#id_parent_level').hide(); </script>"; } ?>

        <script>
        function change_level(){
          var level_val = $("#level").val();

          // console.log(level_val);
          if (level_val == 2) {
            $("#id_parent_level").show();
          } else {
            $("#id_parent_level").hide();
          }
        }
    </script>
        