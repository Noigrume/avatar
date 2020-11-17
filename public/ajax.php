<?php

use Avatar\SvgAvatarFactory;
use Helper\FileSystemHelper;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo SvgAvatarFactory::getRandomMatrix($_GET['size'], $_GET['colors'])->render();
        exit;

    case 'POST':
        $svg = $_POST['svg'];
        $fileSystemHelper = new FileSystemHelper();
        $filename = $fileSystemHelper->createFile($svg, 'avatars', 'svg');
        echo $filename;
        exit;
}
