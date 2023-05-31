<?php

function addToFileList($row)
{
    $path = ".uploads/" . $row['userID'] . "/" . $row['fileName'];
    $toadd = '<div class="file">';
    $toadd .= '<div class="file-name"><a href=' . $path . ' download >' . $row['fileName'] .  '</a> </div>';
    $toadd .= '<div class="file-lastmodified">' . $row['lastModified'] .  '</div>';
    $toadd .= '<div class="file-size">' . printSize($row['fileSize']) .  '</div>';
    $toadd .= '<div class="actions"> <a class="action-button" href="' . $path . '" download ><img src="images/download.png"></a>';
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