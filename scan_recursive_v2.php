<?php
$listDirs[] = __DIR__;
$depth = $argv[1];
function listFolder($listDirs, $depth=0) {
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
                    $listDirsTemp[] = $directory . DIRECTORY_SEPARATOR . $folder;
                }
            }
        }
        $listDirs = $listDirsTemp;
    listFolder($listDirs, --$depth);
}
echo "\r\n";
listFolder($listDirs, $depth);
?>