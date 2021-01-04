<?php
require_once 'AppController.php';
require_once __DIR__ . '//..//Models//User.php';

class SecurityController extends AppController
{

    public function login()
    {
        $user = new User('johny@pk.edu.pl', '12345', 'John', 'Snow');
        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            

           if ($user->getEmail() !== $email) {
                $this->render('login', ['messages' => ['Użytkownik o takim mailu nie istnieje!']]);
                return;
            }

            if ($user->getPassword() !== $password) {
                $this->render('login', ['messages' => ['Błędne hasło!']]);
                return;
            }

            $_SESSION["id"] = $user->getEmail();
            $_SESSION["role"] = $user->getRole();

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=page");
            return;
        }
        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $this->render('login', ['messages' => ['Zostałeś wylogowany!']]);
    }
}