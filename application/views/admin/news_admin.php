<div class="">

    <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Master News <?=$menu[0]->name?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="<?=base_url()?>newscontent/add_edit/<?=$id_menu?>" class="btn btn-primary"><i class="fa fa-plus-square"></i> New News</a>
                                <br/>
                                <br/>
                                <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($news as $view) {
                                                ?>
                                                <tr>
                                                    <td><?=$no++?></td>
                                                    <td><?php echo $view->judul; ?></td>
                                                    <td><?php echo $view->keterangan; ?></td>
                                                    <td style="text-align:center;"><a href="<?=base_url()?>newscontent/add_edit/<?=$id_menu?>/<?=$view->id;?>" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                   <a href="<?=base_url()?>newscontent/delete_data/<?=$id_menu?>/<?=$view->id;?>" onclick="return confirm('Are you sure to delete data?')" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a></td>
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