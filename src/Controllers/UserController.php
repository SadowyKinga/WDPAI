<?php

/*stringi łączymy za pomocą kropki*/

require_once 'AppController.php'; /*importujemy klasę z której będziemy dziedziczyc*/
require_once __DIR__ . '//..//Models//User.php'; /*musimy importować user ale by to zrobic musimy wyjsc z tego katalogu i wejsc do katalogu models*/
require_once __DIR__ . '//..//Models//Worker.php';
require_once __DIR__ . '//..//Models//Order.php';
require_once __DIR__ . '//..//Repository//UserRepository.php';
require_once 'Database.php';

$uploaddir = "Public/img/";

class UserController extends AppController{ /*extends - dziedziczenie po klasie AppController*/
    
    //Strona zestawień
    public function statements()
    {
        $this->render('statements'); //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }

    // Strona z fakturami  
    public function indexi()
    {
        $userRepository = new UserRepository();
        $this->render('invoices', ['invoice' => $userRepository->getInvoice()]); //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }

    //Strona z fakturami
    public function invoices()
    {
        $userRepository = new UserRepository();
        header('Content-type: application/json');
        http_response_code(200);
        $invoices = $userRepository->getInv();
        echo $invoices ? json_encode($invoices) : '';
    }

    //Strona z fakturami archiwalnymi 
    public function indexinvoices()
    {
        $this->render('olderinvoices'); //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }

    //Strona ze szczegółami faktur
    public function analysisinvoices()
    {
        $this->render('analysisinvoices'); //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }


     //Strona z wiadomościami
    public function messages()
    {
        $this->render('messages'); //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }

    // Strona zamówienia
    public function indexOrders()
    {
        $userRepository = new UserRepository();

        //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
        $this->render(
            'orders',
            [
                'order' => $userRepository->getOrder(),
                'shops' => $userRepository->getShops(),
                'companies' => $userRepository->getCompanies(),
                'workers' => $userRepository->getWorkers(),
                'products' => $userRepository->getAllProducts()
            ]
        );
    }

    //Strona zamówienia
    public function orders()
    {
        $id_order = $_GET["id_order"];
        if (is_null($id_order)) {
            http_response_code(402);
            echo "Missing id_order";
        } else {
            $userRepository = new UserRepository();
            header('Content-type: application/json');
            http_response_code(200);
            $products = $userRepository->getProducts($id_order);
            echo $products ? json_encode($products) : '';
        }
    }

    // Strona z zamówieniami archiwalnymi 
    public function indexOlderOrders()
    {
        $this->render('olderorders'); //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }

    // Strona z zamówieniami archiwalnymi 
    public function olderorders()
    {
        $userRepository = new UserRepository();
        header('Content-type: application/json');
        http_response_code(200);
        $orders = $userRepository->getOrders();
        echo $orders ? json_encode($orders) : '';
    }

    //dodanie zamówienia
    public function orderAdd()
    {
        if ($this->isPost()) {
            $userRepository = new UserRepository();
            $id_company = $_POST['id_company'];
            $delivery_date = $_POST['delivery_date'];
            $id_shop = $_POST['id_shop'];
            $id_worker = $_POST['id_worker'];

            // listy przedmiotów
            $product_quant = $_POST['product_quant'];
            $product_id = $_POST['product_id'];
            $order_id = $userRepository->makeOrder($id_company, $delivery_date, $id_shop, $id_worker, $product_quant, $product_id);
            $this->render('startorders', [], 'startorders'); //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
        }
    }

    // Strona profilu - mój profil
    public function profile()
    {
        $userRepository = new UserRepository();
        $this->render('profile', ['user' => $userRepository->getUser($_SESSION['id'])]); //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }

    //dodanie/zmiana zdjęcia użytkownika
    public function change_pic()
    {
        $userRepository = new UserRepository();
        if ($this->isPost()) {

            $uploadfile = $uploaddir . basename($_FILES['profile_img']['name']);

            if (move_uploaded_file($_FILES['profile_img']['tmp_name'], $uploadfile)) {
                $user = $userRepository->updatePathToPic($uploadfile, $_SESSION['id']);
                $this->render('profile', ['imgUpdated'], 'profile');
            } else {
                echo "Nieprawidłowe zdjęcie\n";
            }
        }
    }

    //dodanie/zmiana danych użytkownika
    public function change_data()
    {
        $userRepository = new UserRepository();
        if ($this->isPost()) {
            $birth_date = $_POST['birth_date'];
            $pesel = $_POST['pesel'];
            $phone_number = $_POST['phone_number'];
            $id_number = $_POST['id_number'];
            $city = $_POST['city'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $apart_number = $_POST['apart_number'];
            $post_code = $_POST['post_code'];
            if (empty($birth_date)) {
                echo ('Musisz podać starą lub nową datę urodzenia!');
                return;
            }
            if (empty($pesel)) {
                echo ('Musisz podać stary lub nowy pesel!');
                return;
            }
            if (empty($phone_number)) {
                echo ('Musisz podać stary lub nowy telefon kontaktowy!');
                return;
            }
            if (empty($id_number)) {
                echo ('Musisz podać stary ub nowy identyfikator!');
                return;
            }
            if (empty($city)) {
                echo ('Musisz podać stare lub nowe miasto!');
                return;
            }
            if (empty($street)) {
                echo ('Musisz podać starą lub nową ulicę!');
                return;
            }
            if (empty($house_number)) {
                echo ('Musisz podać stary lub nowy numer domu!');
                return;
            }
            if (empty($apart_number)) {
                echo ('Musisz podać stary lub nowy numer mieszkania!');
                return;
            }
            if (empty($post_code)) {
                echo ('Musisz podać stary lub nowy Kod pocztowy');
                return;
            }
            $user = $userRepository->changeData($_SESSION['id'], $birth_date, $pesel, $phone_number, $id_number, $city, $street, $house_number, $apart_number, $post_code);
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=profile");
        }
    }

    //zmiana obecnego hasła użytkonika
    public function change_pass()
    {
        $userRepository = new UserRepository();
        if ($this->isPost()) {
            $password_old = $_POST['password_old'];
            $password_new = $_POST['password_new'];
            $password_new_2 = $_POST['password_new_2'];
            if (empty($password_old)) {
                echo ('Musisz podać stare hasło');
                return;
            }
            if (empty($password_new)) {
                echo ('Musisz podać nowe hasło');
                return;
            }
            if (empty($password_new_2)) {
                echo ('Musisz powtórzyć hasło');
                return;
            }

            $user = $userRepository->getUser($_SESSION['id']);

            if (!password_verify($password_old, $user->getPassword())) {
                echo ('Podałeś błędne stare hasło');
                return;
            }

            if ($password_new != $password_new_2) {
                echo ('Podane nowe hasła nie są identyczne');
                return;
            }

            $hashed_password_new = password_hash($password_new, PASSWORD_DEFAULT);

            $user = $userRepository->updatePassword($_SESSION['id'], $hashed_password_new);

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=profile");
        }
    }

    // Strona grafik
    public function graphic()
    {
        $this->render('graphic'); //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }

    // Strona pracownicy
    public function indexWorkers()
    {
        $userRepository = new UserRepository();
        $this->render('workers', ['shops' => $userRepository->getShops(), 'roles' => $userRepository->getRoles()]); //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }

    //strona pracownicy
    public function workers()
    {
        $userRepository = new UserRepository();
        header('Content-type: application/json');
        http_response_code(200);
        $workers = $userRepository->getWorkers();
        echo $workers ? json_encode($workers) : '';
    }

//usuwanie danego pracownika
    public function workerDelete(): void
    {
        if (!isset($_POST['id_worker'])) {
            http_response_code(404);
            return;
        }
        $userRepository = new UserRepository();
        $worker = $userRepository->getWorker((int)$_POST['id_worker']);
        $userRepository->delete((int)$_POST['id_worker']);
        http_response_code(200);
    }

    //dodanie danego użytkownika
    public function workerAdd()
    {
        $userRepository = new UserRepository();
        if ($this->isPost()) {
            $name_surname = $_POST['name_surname'];
            $id_role = $_POST['id_role'];
            $email = $_POST['email'];
            $uploadfile = $uploaddir . basename($_FILES['profile_img']['name']);

            if (move_uploaded_file($_FILES['profile_img']['tmp_name'], $uploadfile)) {
                $path_to_pic = $uploadfile;
            } else {
                echo "Nieprawidłowe zdjęcie\n";
                return;
            }

            $id_shop = intval($_POST['id_shop']);
            if (empty($id_role)) {
                echo ('Sklep jest wymagany!');
            }

            $payment = intval($_POST['payment']);
            if (empty($name_surname)) {
                echo ('Imię i nazwisko jest wymagane!');
                return;
            }
            if (empty($id_role)) {
                echo ('Stanowisko jest wymagane!');
                return;
            }
            if (empty($email)) {
                echo ('Email jest wymagany!');
                return;
            }
            if (empty($payment)) {
                echo ('Stawka godzinowa jest wymagana!');
                return;
            }
            $worker = $userRepository->getWorker($email);
            if ($worker) {
                die("Pracownik o tym adresie email już istnieje");
            }
            $worker = $userRepository->makeWorker($name_surname, $id_role, $email, $path_to_pic, $id_shop, $payment);
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=startworkers");
            return;
        }
    }
}
