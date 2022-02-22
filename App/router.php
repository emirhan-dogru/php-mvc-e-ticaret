<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$app->router->get(config("BASE_PATH") . '/generate', function () {
    Capsule::schema()->create('users', function ($table) {
        $table->increments('id');
        $table->string('name_surname');
        $table->string('email')->unique();
        $table->string('password')->unique();
        $table->date('birth_date');
        $table->integer('question_type');
        $table->string('question_answer');
        $table->boolean('status')->default(1);
        $table->timestamps();
    });
});

$app->router->get(config("BASE_PATH") . "/", "Frontend/IndexController@IndexPage");
$app->router->get(config("BASE_PATH") . "/urunler", "Frontend/IndexController@ProductPage");
$app->router->get(config("BASE_PATH") . "/urun", "Frontend/IndexController@ProductDetailPage");
$app->router->get(config("BASE_PATH") . "/sepet", "Frontend/IndexController@BasketPage");
$app->router->get(config("BASE_PATH") . "/odeme", "Frontend/IndexController@PaymentPage");
$app->router->get(config("BASE_PATH") . "/hesabim", "Frontend/IndexController@MyAccountPage" , ['before' => 'UserAuth']);
$app->router->get(config("BASE_PATH") . "/giris-yap", "Frontend/IndexController@LoginPage");
$app->router->post(config("BASE_PATH") . "/giris-yap", "Frontend/UserController@loginUser");

$app->router->get(config("BASE_PATH") . "/uye-ol", "Frontend/IndexController@LoginPage");

$app->router->post(config("BASE_PATH") . "/uye-ol", "Frontend/UserController@addUser");

$app->router->get(config("BASE_PATH") . "/logout", function() {
auth()->remove('userLogin');
redirect('giris-yap' , true , 'Oturum Başarıyla Kapatıldı');
}, ['before' => "UserAuth"]);










////////////////////////////// ADMİN ROUTE /////////////////////////////////////////



$app->router->get(config("BASE_PATH") . "/admin/login", 'Backend/AdminController@LoginPage');
$app->router->post(config("BASE_PATH") . "/admin/login", 'Backend/AdminController@LoginForm');


$app->router->group(config("BASE_PATH") . "/admin", function ($router) {
    $router->get("/", 'Backend/AdminController@IndexPage');
    $router->get("/urunler", 'Backend/AdminController@ProductPage');
    $router->get("/kullanicilar", 'Backend/AdminController@UserPage');
    $router->get("/urun-ekle", 'Backend/AdminController@ProductAddPage');
    $router->get("/yetkililer", 'Backend/AdminController@AdminListPage');
    $router->post("/add-new-admin", 'Backend/AdminController@AddNewAdmin');
    $router->post("/update-admin", 'Backend/AdminController@UpdateAdmin');

    $router->post("/update-user", 'Backend/AdminController@UpdateUser');
    $router->post("/product-add", "Backend/ProductController@AddProduct");
    
    $router->get('/admin-logout' , function() {
auth()->remove("adminAuth");
header("Location:" . base_url('admin/login?durum=basarili&mesaj=oturum Başarıyla Kapatıldı!'));
exit();

    });
}, ['before' => "AdminAuth"]);

$app->router->group(config('BASE_PATH') . '/api' , function($router) {

    $router->get('/getAdminById/:id' , 'Backend/ApiController@getByAdminId');
    $router->get('/getUserById/:id' , 'Backend/ApiController@getByUserId');

}, ['before' => "AdminAuth"]);



$app->router->notFound(function () {
    $core = new Core\Controller();
    echo $core->view('frontend.404');
});
