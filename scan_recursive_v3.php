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
        if ($depth < 1)
            continue;
        if (is_dir($dir . DIRECTORY_SEPARATOR . $entity)) {
            $listFolderContent = listFolder($dir . DIRECTORY_SEPARATOR . $entity, $listFolderContent, $depth);
        }
    }
    closedir($directory);
    $listFolderContent = array_merge($listFolderContent, $listFolderFunc);
    return $listFolderContent;
}
$listFolderContent = listFolder($dir, $listFolderContent, $depth);
echo var_dump($listFolderContent);

?>
