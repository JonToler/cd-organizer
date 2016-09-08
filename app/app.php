<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/cd.php";

    $app = new Silex\Application();

    session_start();
    if (empty($_SESSION['cds'])) {
        $_SESSION['cds'] = array();
    }

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get('/', function() use ($app){
      // return 'test';
      return $app['twig']->render('inventory.html.twig', array('cds' => $_SESSION['cds']));
    });

    $app->post('/postcd', function() use ($app) {
        $artist = $_POST['artist'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $genre = $_POST['genre'];
        $new_cd = new Cd($artist, $title, $price, $genre);
        array_push($_SESSION['cds'], $new_cd);
        return $app->redirect('/');
    });

    $app->get('/empty_inventory', function() use ($app){
        CD::clear();
        return $app->redirect('/');
    });

    return $app;
?>
