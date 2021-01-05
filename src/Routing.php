
<?php

require_once 'Controllers/SecurityController.php';
require_once 'Controllers/PageController.php';

class Routing {
    private $routes = [];

    public function __construct()

    {
        $this->routes = [
            'page' => [
                'controller' => 'PageController',
                'action' => 'show'
            ],
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'login';
        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];

            $action = $this->routes[$page]['action'];
            $object = new $controller;
            $object->$action();
        }
    }
}
