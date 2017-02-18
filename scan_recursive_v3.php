<?php

$depth = $argv[1];
//$depth = 3;
$dir = __DIR__;
function listFolder($dir, $depth = 1) {
    --$depth;
    $directory = opendir($dir);
    $listFolderContent = (scandir($dir));
    while (false !== ($key = array_search('.', $listFolderContent))) {
        unset($listFolderContent[$key]);
    }
    while (false !==($key = array_search('..', $listFolderContent))) {
        unset($listFolderContent[$key]);
    }
    echo 'Список содержимого папки ' . $dir . ':' . implode($listFolderContent) . "\r\n";
    while (false !== ($folder = readdir($directory))) {
        if ($folder == '.' || $folder == '..') {
            continue;
        }
        if ($depth < 1)
            break;
        if (is_dir($dir . DIRECTORY_SEPARATOR . $folder)) {
                listFolder($dir . DIRECTORY_SEPARATOR . $folder, $depth);
        }
    }
        closedir($directory);
}
listFolder($dir, $depth);

?>
