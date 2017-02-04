<?php

$dir = __DIR__;
$spisokPapok = [];
array_push($spisokPapok, $dir);
$depth = $argv[1];
$spisokPapokTemp = [];
function soderzhimoePapki($spisokPapok, $depth=0) {
while($depth > 0) {
    $spisokPapokTemp = [];
    foreach ($spisokPapok as $papka) {
        echo 'Список файлов в папке ' . $papka . ':' . "\r\n";
        $spisokFailovIPapok = scandir($papka);
        if (($key = array_search('.', $spisokFailovIPapok)) !== FALSE) {
            unset($spisokFailovIPapok[$key]);
        }
        if (($key = array_search('..', $spisokFailovIPapok)) !== FALSE) {
            unset($spisokFailovIPapok[$key]);
        }
        echo implode("\r\n", $spisokFailovIPapok);
        foreach ($spisokFailovIPapok as $folder) {
            if (is_dir($papka . DIRECTORY_SEPARATOR . $folder)) {
                array_push($spisokPapokTemp, $papka . DIRECTORY_SEPARATOR . $folder);
            }
        }
    }
    $spisokPapok = $spisokPapokTemp;
    soderzhimoePapki($spisokPapok);
    $depth--;
}
}
echo "\r\n";
soderzhimoePapki($spisokPapok, $depth);

?>
