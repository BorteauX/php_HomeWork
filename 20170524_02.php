<?php
date_default_timezone_set ("Asia/Taipei" );
    $dirname =".";
    if(isset($_GET['dirname'])){
        $dirname =$_GET['dirname'];
        if (isset($_GET['filename'])){
            // 刪除
            $delfile = $_GET['filename'];
            unlink("{$dirname}/{$delfile}");
        }

    }


$fp = @opendir($dirname); //打開資料夾
?>
<form action="20170524_03.php" method="post" enctype ="mutipart/form-data">
    <input type="text" name="dirname">
    <input type="submit" value="chdir">

    <!--上傳-->

    <input type="file" name="upload">
    <input type="submit" value="upload">
</form>
<hr>
<table border="1" width="100%">
    <tr>
        <th>檔名</th>
        <th>類型</th>
        <th>大小</th>
        <th>修改時間</th>
        <th>刪除</th>
    </tr>
    <?php

    while ($file = readdir($fp)) {  //讀取資料夾
        echo '<tr>';
        echo "<td>{$file}</td>";
        $type = "";
        if (is_dir("{$dirname}/{$file}")) {    //is_dir判斷是否為目錄
            $type = "目錄";
        } else if (is_file("{$dirname}/{$file}")){   //is_file 判斷檔案是否存在
            $type = "檔案";
        }

        echo "<td>$type</td>";
        echo "<td>".filesize("{$dirname}/{$file}")."</td>";     //顯示檔案大小
        echo "<td>" . date('Y-m-d H:i:s',filemtime("{$dirname}/{$file}"))."</td>";  //顯示檔案修改時間
        echo "<td><a href='?dirname={$dirname}&filename={$file}' onclick=\"return confirm('Del ?')\">Delete</a></td>";

        echo '</tr>';
    }

    ?>

</table>
