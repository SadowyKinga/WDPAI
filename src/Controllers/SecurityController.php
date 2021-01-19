<?php

/*stringi łączymy za pomocą kropki*/

require_once 'AppController.php'; /*importujemy klasę z której będziemy dziedziczyc*/
require_once __DIR__ . '//..//Models//User.php'; /*musimy importować user ale by to zrobic musimy wyjsc z tego katalogu i wejsc do katalogu models*/
require_once __DIR__ . '//..//Repository//UserRepository.php';

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

class SecurityController extends AppController
{

    public function login()
    {
        /*pobieramy dane, które zostaną wysłane z formularza z indeksu ze strony startowej indeksu za pomocą formularza, którego mamy umieszczonego w login - tagu form odebrac go w seruritycontrolerze, pobrać takie dane czyli email oraz hasło a następnie zweryfikować czy taki użytkownik istnieje w naszym systemie*/
        $userRepository = new UserRepository();
        if ($this->isPost()) { //jeżeli dane nie zostały przesłane
            $email = $_POST['email']; //emaile w bazie danych są unikalne dla danego użytkownika
            $password = $_POST['password'];

            $user = $userRepository->getUser($email); //przechwycony email z powyższego kodu

            if (!$user) { //sprawdzam czy taki użytkownik istnieje
                $this->render('login', ['messages' => ['Użytkownik o takim mailu nie istnieje!']]);
                return;
            }
            /*sprawdzamy czy hasło dla tego użytownika jest różne od tego hasła które zapisaliśmy wyżej - password, jeżeli tak jest to zwracamy nasz formularz logowania  */
            if(!password_verify($password,$user->getPassword())) {
                console_log($password);
                console_log($user->getPassword());
                $this->render('login', ['messages' => ['Błędne hasło!']]);
                return;
            }

            $_SESSION["id"] = $user->getEmail();
            $_SESSION["user_id"] = $user->getIdUser();
            $_SESSION["role"] = $user->getRole();
            $_SESSION["id_numer"] = $user->getIdNumber();

            /*jeżeli dane będą poprawne tzn ze zaden z komunikatów nie zostanie wyrzucony i nie wejdziemy do żadnego warunku if z powyzszych to chcemy wyjsc sobie na nasza str page używając return*/
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=page");
            return;
        }
        $this->render('login');
    }
    
    /*fuknkcja do wylogowania danego użytkownika*/
    public function logout()
    {
        session_unset();
        session_destroy();
        $this->render('login', ['messages' => ['Zostałeś wylogowany!']]);
    }
    
    /*funkcja do dodania nowego użytkownika*/
    public function account(){
        $this->render('account');
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $name_surname = $_POST['name_surname'];
            $email = $_POST['email'];
            $password_1 = $_POST['password_1'];
            $password_2 = $_POST['password_2'];

            if (empty($name_surname)) {
                $this->render('account', ['messages' => ['Imię i nazwisko jest wymagane!']]);
                return;
            }

            if (empty($email)) {
                $this->render('account', ['messages' => ['Email jest wymagany!']]);
                return;
            }

            if (empty($password_1)) {
                $this->render('account', ['messages' => ['Hasło jest wymagane!']]);
                return;
            }

            if (empty($password_2)) {
                $this->render('account', ['messages' => ['Powtórz hasło!']]);
                return;
            }

            if ($password_1 != $password_2) {
                $this->render('account', ['messages' => ['Podane hasła nie są identyczne!']]);
                return;
            }

            $user = $userRepository->getUser($email);

            if ($user) {
                $this->render('account', ['messages' => ['Użytkownik o takim adresie email już istnieje!']]);
                return;
            }
            $hashed_pass = password_hash($password_1, PASSWORD_DEFAULT);
            $user = $userRepository->makeUser($name_surname, $email, $hashed_pass);
            $this->render('account', ['userCreated' => true]);
            $this->render('account', ['userCreated' => true]);
        }
    }
}
