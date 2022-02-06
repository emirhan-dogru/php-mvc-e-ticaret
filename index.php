<?php

require  './vendor/autoload.php';

 
$app = new \Core\Bootstrap();

  
// $app->router->get("/", "IndexController@IndexPage"); 

require './App/router.php';
 $app->run();

// $user = App\Models\User::where("id",2)->get()->toArray();


// echo "<pre>";
// print_r($user);
// echo "</pre>";


?>