<?php
header('Content-type: text/javascript; charset: UTF-8');

echo "var tinyMCEImageList = new Array(";

$dir = new DirectoryIterator( base_url().'files/images/works/');
//$dirsize = count($dir);
foreach ($dir as $fileinfo){
    if (!$fileinfo->isDot() && $fileinfo->isFile())
   {
        echo '["'.$fileinfo->getFilename().'","'.$fileinfo->getFilename().'"]';
        break;
    }
}

echo ')';
?>
