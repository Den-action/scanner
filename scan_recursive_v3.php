<?php

$depth = $argv[1];
$dir = __DIR__;
$listFolderContent = [];
function listFolder($dir, $listFolderContent, $depth = 1) {
    --$depth;
    $listFolderFunc = [];
    $directory = opendir($dir);
    while (false !== ($entity = readdir($directory))) {
        if ($entity == '.' || $entity == '..') {
            continue;
        }
        $listFolderFunc [] = $dir . DIRECTORY_SEPARATOR . $entity;
    }
    closedir($directory);
    $listFolderContent = array_merge($listFolderContent, $listFolderFunc);
    foreach ($listFolderFunc as $item) {
        if ($depth < 1)
            break;
        if (is_dir($item)) {
            $listFolderContent = listFolder($item, $listFolderContent, $depth);
        }
    }
    return $listFolderContent;
}
$listFolderContent = listFolder($dir, $listFolderContent, $depth);
echo var_dump($listFolderContent);

?>
