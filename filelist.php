<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function addToFileList($row)
{
    $toadd = '<div class="file">';
    $toadd .= '<div class="file-name"><a href=uploads/' . $row['fileName'] . ' download >' . $row['fileName'] .  '</a> </div>';
    $toadd .= '<div class="file-lastmodified">' . $row['lastModified'] .  '</div>';
    $toadd .= '<div class="file-size">' . printSize($row['fileSize']) .  '</div>';
    $toadd .= '<div class="actions"> <a class="action-button" href="uploads/' . $row['fileName'] . '" download ><img src="images/download.png"></a>';
    //TODO : javascript delete function
    $toadd .= '<a class="action-button" onclick="deleteFile(this)"><img src="images/trash-bin.png"></a></div>';
    $toadd .= '</div>';
    echo $toadd;
}

function printSize($size)
{
    $toprint = "";
    if ($size < 1000)
        $toprint = strval(round($size, 2, PHP_ROUND_HALF_UP)) . " bytes";
    else if ($size < 1000000)
        $toprint = strval(round($size/1000, 2, PHP_ROUND_HALF_UP)) . " KB";
    else if ($size < 1000000000)
        $toprint = strval(round($size/1000000, 2, PHP_ROUND_HALF_UP)) . " MB";
    else
        $toprint = strval(round($size/1000000000, 2, PHP_ROUND_HALF_UP)) . " GB";
    return $toprint;
}
?>