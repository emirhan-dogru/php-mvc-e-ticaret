<?php

use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;

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
    if ($status != null || $status == false) {
        $tmpMessage = '?durum=' . ($status ? 'basarili' : 'hata')  . '&mesaj=' . $message;
    }

    header('Location:' . base_url($url . $tmpMessage));
}

function format_date($date, $format = 'd/F/Y H:i')
{
    $date_formatter = new \Jenssegers\Date\Date();
    $date_formatter->setlocale('tr');
    return $date_formatter->parse($date)->format($format);
}
