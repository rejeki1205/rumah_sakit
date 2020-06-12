<?php 
foreach($data_obat as $data) { ?>
    <button style='text-align:left' type='button' class='btn btn-link btn-result' onClick="setValue('<?=$data['id']?>','<?=$data['nama_obat']?>')"><?=$data['nama_obat']?></button><hr>
<?php }
?>