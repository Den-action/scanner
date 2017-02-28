<?php

$depth = $argv[1];
$dir = __DIR__;
function listFolder($dir, $depth) {
    --$depth;
    $listFolderContent = [];
    $directory = opendir($dir);
    while (false !== ($entity = readdir($directory))) {
        if ($depth < 0)
            continue;
        if ($entity == '.' || $entity == '..') {
            continue;
        }
        $listFolderContent [] = $dir . DIRECTORY_SEPARATOR . $entity;

        if (is_dir($dir . DIRECTORY_SEPARATOR . $entity)) {
            $listFolderContent = array_merge($listFolderContent, listFolder($dir . DIRECTORY_SEPARATOR . $entity, $depth));
        }
    }
    closedir($directory);
    return $listFolderContent;
}
$listFolderContent = listFolder($dir, $depth);
var_dump($listFolderContent);

?>
