<table id="datalist" class="table table-striped table-bordered" style="width:100%">
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