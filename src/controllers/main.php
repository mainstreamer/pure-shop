<?php

require_once 'app/twig/lib/Twig/Autoloader.php';
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

    if ($_GET['page']=='catalogue' && isset ($_GET['category'])) {
        include 'db.php'; //database mock
        $category_id = $categories[$_GET['category']];
        $input = ['x'=>$categories,'get'=>$_GET, 'items'=>$items, 'cid'=>$category_id];

        echo $twig->render('category.twig',$input);
    }

    elseif ($_GET['page']=='catalogue') {
     include 'db.php'; //database mock

        $input = ['x'=>$categories,'get'=>$_GET];
        echo $twig->render('catalogue.twig',/*array_merge($_GET,$categories)*/ $input);
    } else

echo $twig->render('index.twig',[
'name' => 'User',
]);

} catch (Exception $e) {
die ('ERROR: ' . $e->getMessage());
}