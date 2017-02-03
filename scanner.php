<?php

$dir = __DIR__;
function SoderzhimoePapki($dir) {
$SpisokPapok = [];
//echo "<br />";
echo "'Список файлов в папке ' . $dir .':' . \r\n";
//echo "<br />";
$SpisokFailovIPapok = scandir($dir);
$IskluchenieDir = ['.', '..'];
if(($key = array_search('.', $SpisokFailovIPapok)) !== FALSE) {
unset($SpisokFailovIPapok[$key]);
}
if(($key = array_search('..', $SpisokFailovIPapok)) !== FALSE) {
unset($SpisokFailovIPapok[$key]);
}
echo implode("\r\n", $SpisokFailovIPapok );
foreach($SpisokFailovIPapok as $papka) {
		if(is_dir($dir . DIRECTORY_SEPARATOR . $papka)) {
			array_push($SpisokPapok, $dir . DIRECTORY_SEPARATOR . $papka);
			}
}
return $SpisokPapok;
}

echo "\r\n";
$SpisokPapok = SoderzhimoePapki($dir);
$depth = $argv[1];
echo var_dump("--&&&&&&&&&&&&&" . $depth);
$SpisokPapokTemp = [];
do {
	foreach($SpisokPapok as $papka){
		$SpisokPapokTemp = array_merge($SpisokPapokTemp, SoderzhimoePapki($papka));
	}
	$depth--;
	$SpisokPapok = $SpisokPapokTemp;
} while($depth>0);

?>
