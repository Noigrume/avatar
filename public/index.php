<?php

use Avatar\SvgAvatarFactory;
use Helper\FileSystemHelper;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';

const DEFAULT_SIZE_VALUE = 5;
const DEFAULT_COLORS_VALUE = 3;

//$tab = [];
//for($i = 0 ; $i < 5; $i++){
//    for($j = 0 ; $j < 5; $j++){
//
//        $tab[$i][$j] = \Helper\ColorTools::getRandomColor();
//    }
//}
//
//dump($tab);

if (!empty($_POST)) {

    switch($_POST['action']){
        case 'generate':
            $svg = SvgAvatarFactory::getRandomMatrix($_POST['size'],$_POST['colors'])->render();
            include TEMPLATES_DIR . '/index.phtml';
            break;

        case 'save':
            $svg = $_POST['svg'];

            $fileSystemHelper = new FileSystemHelper();
            $filename = $fileSystemHelper->createFile($svg, 'avatars', 'svg');

            header('Location: show.php?filename=' . urlencode($filename));
            exit;

        case 'download':
            $svg = $_POST['svg'];

            $filename = "my-avatar.svg";
            header('Content-type: image/svg+xml');
            header("Content-Disposition: attachment; filename=$filename");
            echo $svg;
            exit;
    }
}
else {
    $svg = SvgAvatarFactory::getRandomMatrix(DEFAULT_SIZE_VALUE,DEFAULT_COLORS_VALUE)->render();
    include TEMPLATES_DIR . '/index.phtml';
}





