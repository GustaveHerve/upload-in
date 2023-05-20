<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function addToFileList($row)
{
    $toadd = '<div class="file">';
    $toadd .= '<a href=uploads/' . $row['fileName'] . ' download ><p>' . $row['fileName'] .  '</p></a>';
    $toadd .= '<p>' . $row['lastModified'] .  '</p>';
    $toadd .= '<p>' . $row['fileSize'] .  '</p>';
    $toadd .= '<div class="actions"> <a href="uploads/' . $row['fileName'] . '" download ><img src="images/download.png"></a></div>';
    $toadd .= '</div>';
    echo $toadd;
}
?>