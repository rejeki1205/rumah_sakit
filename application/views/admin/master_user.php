
<div class="">

    <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Master User</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="<?=base_url()?>user/add_edit_user" class="btn btn-primary"><i class="fa fa-plus-square"></i> New User</a>
                                <br/>
                                <br/>
                                <div class="card-box table-responsive">

                                <input style="margin-left:15px;" class="col-sm-4 form-control" type="text" onkeyup="caridata()" id="keyword" placeholder="Masukan nama atau username">
                                <div id="view">
                                    <table id="datatables" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID User</th>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>Status User</th>
                                            <th>Level Akses</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                foreach($user as $view) {
                                                    ?>
                                                    <tr>
                                                        <td><?=$no++?></td>
                                                        <td><?php echo $view->id; ?></td>
                                                        <td><?php echo $view->name; ?></td>
                                                        <td><?php echo $view->username; ?></td>
                                                        <td><?php echo $view->status_user; ?></td>
                                                        <td><?php if ($view->role == 1) {echo "Admin User" ;       }  
                                                                else if ($view->role == 2) {echo "Admin MR" ;    }
                                                                else if ($view->role == 3) {echo "Dokter" ;      }
                                                                else if ($view->role == 4) {echo "Pendaftaran" ; }  ?>   
                                                        </td>        
                                                        <td style="text-align:center;"><a href="<?=base_url()?>user/add_edit_user/<?=$view->id;?>" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?=base_url()?>user/delete_data/<?=$view->id;?>" onclick="return confirm('Are you sure to block data?')" class="btn btn-danger btn-sm" title="Block"><i class="fa fa-lock"></i></a></td>
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
</div>
<script>
//Logic Jquery dan Ajax Utama 
function caridata() {
    //menampung nilai input dari text keyword
    var kunci = $("#keyword").val();
    
    $.ajax({
      url: "<?php echo base_url();?>user/search_user", // controller tujuan
      type: 'POST', 
      data: {keyword: kunci}, // memasukan data kedalam ajax post 
      success: function(response){ 
        // jika berhasil request, balikan controller dimasukan dalam variabel response         
        // Ganti isi dari div view dengan view yang diambil dari controller 
        $("#view").html(response);
        $('#datalist').dataTable( {
            "searching": false,
            "bLengthChange": false,
        } );
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
        alert(xhr.responseText); // munculkan alert
      } // tutup error request
    }); // tutup ajax

  } 
</script>