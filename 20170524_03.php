<?php
$upload = $_FILES['upload'];
if ($upload['error']==0){
    echo $upload['name'];
    if (copy(
        $upload['tmp_name'], "./upload/{$upload['name']}")){
        echo 'upload OK';
    }else{
        echo 'copy fail';
    }
}else{
    echo 'upload fail';
}