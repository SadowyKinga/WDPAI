<?php
require_once 'Controllers/SecurityController.php';
require_once 'Controllers/PageController.php';
require_once 'Controllers/UserController.php';


class Routing
{
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
            ],
            'account' => [
                'controller' => 'SecurityController',
                'action' => 'account'
            ],
            'statements' => [
                'controller' => 'UserController',
                'action' => 'statements'
            ],
            'invoices' => [
                'controller' => 'UserController',
                'action' => 'invoices'
            ],
            'indexinvoices' => [
                'controller' => 'UserController',
                'action' => 'indexInvoices'
            ],
            'olderinvoices' => [
                'controller' => 'UserController',
                'action' => 'olderinvoices'
            ],
            'analysisinvoices' => [
                'controller' => 'UserController',
                'action' => 'analysisInvoices'
            ],
            'inv' => [
                'controller' => 'UserController',
                'action' => 'indexi'
            ],
            'messages' => [
                'controller' => 'UserController',
                'action' => 'messages'
            ],
            'startorders' => [
                'controller' => 'UserController',
                'action' => 'indexOrders'
            ],
            'orders' => [
                'controller' => 'UserController',
                'action' => 'orders'
            ],
            'indexorders' => [
                'controller' => 'UserController',
                'action' => 'indexOlderOrders'
            ],
            'olderorders' => [
                'controller' => 'UserController',
                'action' => 'olderorders'
            ],
            'profile' => [
                'controller' => 'UserController',
                'action' => 'profile'
            ],
            'change_pic' => [
                'controller' => 'UserController',
                'action' => 'change_pic'
            ],
            'change_data' => [
                'controller' => 'UserController',
                'action' => 'change_data'
            ],
            'change_pass' => [
                'controller' => 'UserController',
                'action' => 'change_pass'
            ],
            'graphic' => [
                'controller' => 'UserController',
                'action' => 'graphic'
            ],
            'startworkers' => [
                'controller' => 'UserController',
                'action' => 'indexWorkers'
            ],
            'workers' => [
                'controller' => 'UserController',
                'action' => 'workers'
            ],
            'delete_worker' => [
                'controller' => 'UserController',
                'action' => 'workerDelete'
            ],
            'add_worker' => [
                'controller' => 'UserController',
                'action' => 'workerAdd'
            ],
            'orderAdd' => [
                'controller' => 'UserController',
                'action' => 'orderAdd'
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
