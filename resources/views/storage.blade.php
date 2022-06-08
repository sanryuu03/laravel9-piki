<?php
    $target = $_SERVER['DOCUMENT_ROOT']."/../laravelpiki/storage/app/assets";
    $link = $_SERVER['DOCUMENT_ROOT']."/storage";
    if(symlink( $target, $link )){
        echo "OK.";
    } else {
        echo "Gagal.";
    }
?>
