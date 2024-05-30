<?php

namespace Hi\PhpOop\Commons;

use eftec\bladeone\BladeOne;

class Controller
{
    // RENDER VIEW CLIENT
    public function viewClient($view, $data = [])
    {
        $templatedPath = __DIR__ . '/../Views/Client';
        $compiledPath = __DIR__ . '/../Views/compiles';
        $blade = new BladeOne($templatedPath, $compiledPath);

        echo $blade->run($view, $data);
    }

    // RENDER VIEW ADMIN
    public function viewAdmin($view, $data = [])
    {
        $templatedPath = __DIR__ . '/../Views/Admin';
        $compiledPath = __DIR__ . '/../Views/compiles';
        $blade = new BladeOne($templatedPath, $compiledPath);

        echo $blade->run($view, $data);
    }
}
