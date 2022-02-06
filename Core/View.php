<?php

namespace Core;

use Jenssegers\Blade\Blade;

class View
{
    public function show($view, $data)
    {
        $blade = new Blade(dirname(__DIR__) . '/resource/views', dirname(__DIR__) . '/resource/cache');

        return $blade->render($view, $data);
    }
}


?>