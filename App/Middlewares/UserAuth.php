<?php

namespace App\Middlewares;

use Buki\Router\Http\Middleware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserAuth extends Middleware {

public function handle() {
if (auth()->get('userLogin')) {
    return true;
}
else {
    return new RedirectResponse(base_url('giris-yap?durum=hata&mesaj=Lütfen oturum açınız!'));
    return false;
}
}
}


?>