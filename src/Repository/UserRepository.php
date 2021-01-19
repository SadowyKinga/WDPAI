<?php

require_once "Repository.php";
require_once __DIR__ . '//..//Models//User.php';
require_once __DIR__ . '//..//Models//Worker.php';
require_once __DIR__ . '//..//Models//Position.php';
require_once __DIR__ . '//..//Models//Invoice.php';
require_once __DIR__ . '//..//Models//Order.php';

class UserRepository extends Repository
{

    // Użytkownicy
    public function getUser(string $email): ?User //funkcja znajdująca użytkownika po jego emailu
    {
        //w tej metodzie tworzymy nowy obiekt użytkownika, wypełniamy go danymi pobranymi z bazy danych a na koniec zwracamy go
        /*zapytanie sql'owe w prepare*/
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users 
            LEFT JOIN roles ON users.id_role=roles.id_role 
            LEFT JOIN pictures ON users.id_picture=pictures.id_picture
            LEFT JOIN addresses ON users.id_address=addresses.id_address
            WHERE email = :email
        ');
        //podłączamy parametry pod nasz stmt
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute(); //wykonuje $stmt
        $user = $stmt->fetch(PDO::FETCH_ASSOC); //użytkownika z bazy pobieram do zmiennej tymczasowej i zapisuje do tabeli asocjacyjnej
        if ($user == false) {//zabezpieczam gdy użytkownik nie zostanie znaleziony, gdy użytkownik nie zostanie znaleziony wtedy $stmt zwróci nam wartośc false
            return null;
        }
        return new User( //zwracam użytkownika z tabeli asocjacyjnej podając nazwy kolumn z danych które odbieramy
            $user['email'],
            $user['password'],
            $user['name_surname'],
            $user['id_user'],
            $user['name'],
            $user['path'],
            $user['birth_date'],
            $user['pesel'],
            $user['phone_number'],
            $user['id_number'],
            $user['city'],
            $user['street'],
            $user['post_code'],
            $user['house_number'],
            $user['apart_number']

        );
    }

    //tworzenie-dodanie użytkownika
    public function makeUser(string $name_surname, string $email, string $password)
    {
        $db = $this->database->connect();
        $stmt = $db->prepare("INSERT INTO pictures(path) VALUES('Public\img\default_pic.jpg')" );        
        $stmt->execute();
        $id_picture =  $db->lastInsertId();

        $stmt = $db->prepare('
            INSERT INTO  USERS ( name_surname, password, email, id_role, id_picture, id_number) 
            VALUES (:name_surname, :password, :email, 1, :id_picture, 1)
            ');
        //podłączamy parametry pod nasz stmt
        $stmt->bindParam(':name_surname', $name_surname, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id_picture', $id_picture, PDO::PARAM_INT);
        $stmt->execute(); //wykonuje $stmt
    }

    public function getUsers(): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users INNER JOIN roles ON users.id_role=roles.id_role WHERE email != :email;
        ');
        $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function updatePathToPic($path, $email)
    {

        $stmt = $this->database->connect()->prepare('UPDATE pictures set path = :path 
            WHERE pictures.id_picture IN (SELECT id_picture FROM users WHERE email= :email) 
            OR pictures.id_picture IN (SELECT id_picture FROM workers WHERE email= :email)
            OR pictures.id_picture IN (SELECT id_picture FROM analysisinvoices)' );
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':path', $path, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function createPathToPic($path) 
    {   
        $db = $this->database->connect();
        $stmt = $db->prepare('INSERT INTO pictures(path) VALUES(:path)' );
        $stmt->bindParam(':path', $path, PDO::PARAM_STR);
        $stmt->execute();
        return $db->lastInsertId();
    }

    public function updatePassword($email, $password)
    {

        $stmt = $this->database->connect()->prepare('UPDATE users set password = :password WHERE email= :email 
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function changeData($email, $birth_date, $pesel, $phone_number, $id_number, $city, $street, $house_number, $apart_number, $post_code)
    {   
        $db = $this->database->connect();

        $stmt = $db->prepare(
            'SELECT id_address FROM users WHERE email=:email'
        );
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $address = $stmt->fetch(PDO::FETCH_ASSOC);

        if(is_null($address['id_address'])) {
            $stmt = $db->prepare(
                'INSERT INTO addresses (city, street, house_number,
                    apart_number, post_code) VALUES (:city, :street, :house_number, :apart_number, :post_code)');
        } else {
            $stmt = $db->prepare(
                'UPDATE addresses SET city = :city, street=:street, house_number=:house_number,
                    apart_number=:apart_number, post_code=:post_code WHERE id_address IN (SELECT id_address FROM users WHERE email=:email)');
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        }
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':street', $street, PDO::PARAM_STR);
        $stmt->bindParam(':house_number', $house_number, PDO::PARAM_INT);
        $stmt->bindParam(':apart_number', $apart_number, PDO::PARAM_INT);
        $stmt->bindParam(':post_code', $post_code, PDO::PARAM_INT);
        $stmt->execute();
        
        $id_address = NULL;

        if(is_null($address['id_address'])) {
            $id_address = $db->lastInsertId();
        }
        
        if(!is_null($id_address)) {
            $query = 'UPDATE users SET birth_date= :birth_date, pesel= :pesel, phone_number=:phone_number, id_number=:id_number, id_address=:id_address WHERE email= :email';
        } else {
            $query = 'UPDATE users SET birth_date= :birth_date, pesel= :pesel, phone_number=:phone_number, id_number=:id_number WHERE email= :email'; 
        }
        $stmt = $db->prepare($query);

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':birth_date', $birth_date, PDO::PARAM_STR);
        $stmt->bindParam(':pesel', $pesel, PDO::PARAM_STR);
        $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
        $stmt->bindParam(':id_number', $id_number, PDO::PARAM_STR);
        if(!is_null($id_address)) {
            $stmt->bindParam(':id_address', $id_address, PDO::PARAM_INT);
        }        
        $stmt->execute();
    }

    // Pracownicy
    public function getWorker(string $email): ?Worker
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM workers WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $worker = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($worker == false) {
            return null;
        }
        return new Worker(
            $worker['id_worker'],
            $worker['name_surname'],
            $worker['email'],
            $worker['id_role'],
            $worker['path_to_pic'],
            $worker['id_shop'],
            $worker['payment']
        );
    }
    public function getWorkers(): array
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT workers.id_worker, workers.name_surname, pictures.path, roles.name FROM (workers 
                LEFT JOIN roles ON roles.id_role=workers.id_role
                LEFT JOIN pictures as pictures ON workers.id_picture=pictures.id_picture)');
                
        $stmt->execute();
        $workers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $workers;
    }


    public function delete(int $id_worker): void
    {
            try {
                $stmt = $this->database->connect()->prepare('DELETE FROM workers WHERE id_worker = :id_worker;');
                $stmt->bindParam(':id_worker', $id_worker, PDO::PARAM_INT);
                $stmt->execute();
        } catch (PDOException $e) {
            die("Nie udało się usunąć pracownika");
        }
    }


    public function makeWorker(string $name_surname, int $id_role, string $email, string $path_to_pic, int $id_shop, int $payment)
    {
        $id_picture = $this->createPathToPic($path_to_pic);

        $stmt = $this->database->connect()->prepare(
            'INSERT INTO  workers ( name_surname, email, id_role, id_shop, id_picture) 
            VALUES (:name_surname, :email, :id_role , :id_shop, :id_picture)');
        $stmt->bindParam(':name_surname', $name_surname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id_role', $id_role, PDO::PARAM_INT);
        $stmt->bindParam(':id_shop', $id_shop, PDO::PARAM_STR);
        $stmt->bindParam(':id_picture', $id_picture, PDO::PARAM_INT);
        $stmt->execute();

    }

    // Faktury
    public function getInv(): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM companies INNER JOIN invoices ON companies.id_company = invoices.id_company order by making_date DESC;
        ');
        $stmt->bindParam(':id_invoice', $id_invoice, PDO::PARAM_STR);
        $stmt->execute();
        $invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $invoices;
    }

    public function getInvoice(): ?Invoice
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM companies INNER JOIN invoices ON companies.id_company = invoices.id_company order by making_date DESC LIMIT 1
        ');
        //$stmt->bindParam(':making_date', $making_date, PDO::PARAM_STR);
        $stmt->execute();
        $invoice = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($invoice == false) {
            return null;
        }

        return new Invoice(
            $invoice['id_invoice'],
            $invoice['name'],
            $invoice['making_date'],
            $invoice['payment_date'],
            $invoice['bank_account']
        );
    }

    // Zamówienia
    public function getOrder(): ?Order
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT  id_order, companies.name as company_name, shops.name as shop_name, orders.making_date, orders.delivery_date, workers.name_surname FROM orders 
                INNER JOIN companies ON companies.id_company = orders.id_company
                INNER JOIN workers ON workers.id_worker = orders.id_worker
                INNER JOIN shops ON  orders.id_shop = shops.id_shop 
            ORDER BY id_order DESC LIMIT 1');
        //$stmt->bindParam(':making_date', $making_date, PDO::PARAM_STR);
        $stmt->execute();
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($order == false) {
            return null;
        }

        return new Order(
            $order['id_order'],
            $order['company_name'],
            $order['shop_name'],
            $order['making_date'],
            $order['delivery_date'],
            $order['name_surname']
        );
    }

    public function getOrders(): array
    {
        $stmt = $this->database->connect()->prepare(
        'SELECT orders.id_order, orders.making_date, orders.delivery_date, shops.name AS shop_name, workers.name_surname, companies.name FROM orders 
            LEFT JOIN companies ON orders.id_company = companies.id_company
            LEFT JOIN shops ON shops.id_shop=orders.id_shop
            LEFT JOIN workers ON workers.id_worker=orders.id_worker  
            ORDER BY orders.making_date DESC');
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }

    public function makeOrder($id_company, $delivery_date, $id_shop, $id_worker, $product_quant, $product_id)
    {   
        $making_date = date("Y-m-d");
        $db = $this->database->connect();

        $stmt = $db->prepare(
            'INSERT INTO  orders (id_company, making_date, delivery_date, id_shop, id_worker) 
            VALUES (:id_company, :making_date, :delivery_date, :id_shop, :id_worker)');
        $stmt->bindParam(':id_company', $id_company, PDO::PARAM_INT);
        $stmt->bindParam(':making_date', $making_date, PDO::PARAM_STR);
        $stmt->bindParam(':delivery_date', $delivery_date, PDO::PARAM_STR);
        $stmt->bindParam(':id_shop', $id_shop, PDO::PARAM_INT);
        $stmt->bindParam(':id_worker', $id_worker, PDO::PARAM_INT);
        $stmt->execute();
        $id_order =  $db->lastInsertId();

        $stmt = $db->prepare('INSERT INTO  prod_ord (id_order, id_product, quantity) VALUES (:id_order, :id_product, :quantity)');
        for($i = 0; $i < min(count($product_quant), count($product_id)); $i++) {
            $stmt->bindParam(':id_order', $id_order, PDO::PARAM_INT);
            $stmt->bindParam(':id_product', $product_id[$i], PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $product_quant[$i], PDO::PARAM_INT);
            $stmt->execute();
        }
        return $id_order;
    }

    public function getProducts($id_order)
    {
        $stmt = $this->database->connect()->prepare(
        'SELECT products.id_product, products.name, prod_ord.quantity, orders.id_company FROM prod_ord 
            LEFT JOIN products ON products.id_product = prod_ord.id_product
            LEFT JOIN orders ON  orders.id_order = prod_ord.id_order
            WHERE  prod_ord.id_order = :id_order');
        $stmt->bindParam(':id_order', $id_order, PDO::PARAM_INT);

        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function getShops()
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT id_shop, name, address FROM shops');
            $stmt->execute();
            $shops = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $shops;
    }

    public function getRoles()
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT id_role, name FROM roles');
            $stmt->execute();
            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $roles;
    }

    public function getCompanies()
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT id_company, name FROM companies');
        $stmt->execute();
        $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $companies;
    }

    public function getAllProducts() 
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT id_product, name, price FROM products');
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
    }
}
