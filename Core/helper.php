<?php

use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
use App\Models\AdminNotifications;
use Cocur\Slugify\Slugify;

function config($key, $default = "")
{
    return \Arrilot\DotEnv\DotEnv::get($key, $default);
}


function base_url($url = "")
{
    return config('BASE_URL') . $url;
}

function auth()
{
    return \Core\Auth::getInstance();
}

function passwordHash($password)
{
    $factory = new PasswordHasherFactory([
        'common' => ['algorithm' => 'bcrypt'],
        'memory-hard' => ['algorithm' => 'sodium'],
    ]);

    $passwordHasher = $factory->getPasswordHasher('common');

    return $passwordHasher->hash($password);
}


function passwordVerify($hash, $password)
{
    $factory = new PasswordHasherFactory([
        'common' => ['algorithm' => 'bcrypt'],
        'memory-hard' => ['algorithm' => 'sodium'],
    ]);

    $passwordHasher = $factory->getPasswordHasher('common');

    return $passwordHasher->verify($hash, $password);
}

function response($content = [])
{
    $response = new \Symfony\Component\HttpFoundation\Response();
    $response->headers->set('Content-type', 'application/json');
    $response->setContent(json_encode($content));
    $response->send();
}

function questions()
{
    return [
        1 => "İlk evcil hayvanınızın adı nedir ?",
        2 => "İlk okul öğretmeninizin adı nedir ?",
        3 => "En refret ettiğiniz renk nedir ?"
    ];
}

function redirect($url = "", $status = null, $message = null)
{

    $tmpMessage = '';
    if ($status != null || $message != null) {
        $tmpMessage = '?durum=' . ($status ? 'basarili' : 'hata')  . '&mesaj=' . $message;
    }

    header('Location:' . base_url($url . $tmpMessage));
    exit;
}

function format_date($date, $format = 'd/F/Y H:i')
{
    $date_formatter = new \Jenssegers\Date\Date();
    $date_formatter->setlocale('tr');
    return $date_formatter->parse($date)->format($format);
}

function addAdminNotification( $title, $type = "success" ){
       
    AdminNotifications::create(
          [
              "title"=> $title, 
              "type" =>$type 
           ]
      );

  }


  function slug( $text ){        
      $slugify = new Slugify();
      return $slugify->slugify( $text );
  }


  function upload( $name ){
      return \Core\Upload::getInstance($name);
  }

  function guid() {
      if (function_exists('com_create_guid') === true)
      {
          return trim(com_create_guid(), '{}');
      }
      return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
  }

  function imgDir(){
      return "uploads/".date("Y")."/".date("m");
  }

  function getBasketSum($where = [] , $field = "count") {
      if (count($where) == 0) {
          $where = [
                "user_id" => auth()->get('userLogin')['id'],
                'basket_status' => 'aktif'
        ];
      }
      return App\Models\Baskets::where($where)->sum($field);
}

function money($money) {
    return number_format($money , 2 , "," , ".");
}
