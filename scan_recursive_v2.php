<?php
$dir = __DIR__;
$listDirs = [];
array_push($listDirs, $dir);
$depth = $argv[1];
$listDirsTemp = [];
function folderContent($listDirs, $depth=0) {
    if ($depth <1)
    return;
        $listDirsTemp = [];
        foreach ($listDirs as $directory) {
            echo 'Список файлов в папке ' . $directory . ':' . "\r\n";
            $listFolderContent = scandir($directory);
            if (($key = array_search('.', $listFolderContent)) !== FALSE) {
                unset($listFolderContent[$key]);
            }
            if (($key = array_search('..', $listFolderContent)) !== FALSE) {
                unset($listFolderContent[$key]);
            }
            echo implode("\r\n", $listFolderContent);
            foreach ($listFolderContent as $folder) {
                if (is_dir($directory . DIRECTORY_SEPARATOR . $folder)) {
                    array_push($listDirsTemp, $directory . DIRECTORY_SEPARATOR . $folder);
                }
            }
        }
        $listDirs = $listDirsTemp;
        folderContent($listDirs, --$depth);
}
echo "\r\n";
folderContent($listDirs, $depth);
?>