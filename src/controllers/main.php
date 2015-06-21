<?php

require_once './app/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

try {
// specify where to look for templates
$loader = new Twig_Loader_Filesystem('templates');

// initialize Twig environment
$twig = new Twig_Environment($loader);

// load template
//$template = $twig->loadTemplate('index.twig');

// set template variables
// render template
//echo $template->render([

    if ($_GET['page']=='catalogue') {
        echo $twig->render('catalogue.twig',$_GET);
    } else

echo $twig->render('index.twig',[
'name' => 'User',
]);

} catch (Exception $e) {
die ('ERROR: ' . $e->getMessage());
}