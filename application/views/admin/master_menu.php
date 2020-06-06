<div class="">

    <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Master Menu</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="<?=base_url()?>menu/add_edit_menu" class="btn btn-primary"><i class="fa fa-plus-square"></i> New Menu</a>
                                <br/>
                                <br/>
                                <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Level Menu</th>
                                        <th>ID Parent Level</th>
                                        <th>Link Address</th>
                                        <th>Icon</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($menu as $view) {
                                                ?>
                                                <tr>
                                                    <td><?=$no++?></td>
                                                    <td><?php echo $view->id; ?></td>
                                                    <td><?php echo $view->name; ?></td>
                                                    <td><?php echo $view->level; ?></td>
                                                    <td><?php echo $view->id_parent_level; ?></td>
                                                    <td><?php echo $view->controller; ?></td>
                                                    <td><?php echo $view->icon; ?></td>
                                                    <td><?php echo $view->status; ?></td>
                                                    <td style="text-align:center;"><a href="<?=base_url()?>menu/add_edit_menu/<?=$view->id;?>" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                   <a href="<?=base_url()?>menu/delete_data/<?=$view->id;?>" onclick="return confirm('Are you sure to delete data?')" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a></td>
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