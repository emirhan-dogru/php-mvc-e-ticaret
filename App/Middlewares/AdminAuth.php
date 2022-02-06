<?php

namespace App\Middlewares;

use Buki\Router\Http\Middleware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminAuth extends Middleware {

public function handle() {
if (auth()->get('adminAuth')) {
    return true;
}
else {
    return new RedirectResponse(base_url('admin/login'));
    return false;
}
}
}


?>