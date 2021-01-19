CREATE TABLE shops (
    id_shop SERIAL PRIMARY KEY,
    name VARCHAR(45),
    address VARCHAR(45)
);

CREATE TABLE roles (
    id_role SERIAL PRIMARY KEY,
    name VARCHAR(20)
);

CREATE TABLE companies (
    id_company SERIAL PRIMARY KEY,
    name VARCHAR(45),
    bank_account VARCHAR(26)
);

CREATE TABLE addresses (
    id_address SERIAL PRIMARY KEY,
    city VARCHAR(45),
    street VARCHAR(45),
    house_number VARCHAR(7),
    apart_number VARCHAR(7),
    post_code VARCHAR(20)
);

CREATE TABLE pictures (
    id_picture SERIAL PRIMARY KEY,
    path VARCHAR(45)
);

CREATE TABLE workers (
    id_worker SERIAL PRIMARY KEY,
    id_role INTEGER REFERENCES roles (id_role),
    id_picture INTEGER REFERENCES pictures (id_picture),
    id_shop INTEGER REFERENCES shops (id_shop),
    name_surname VARCHAR(45),
    email VARCHAR(45)
);

CREATE TABLE users (
    id_user SERIAL PRIMARY KEY,
    id_role INTEGER REFERENCES roles (id_role),
    id_picture INTEGER REFERENCES pictures (id_picture),
    id_address INTEGER REFERENCES  addresses (id_address),
    name_surname VARCHAR(200),
    password VARCHAR(120),
    email VARCHAR(45),
    birth_date DATE,
    pesel VARCHAR(45),
    phone_number VARCHAR(9),
    id_number VARCHAR(25)
);

CREATE TABLE shifts (
    id_shift SERIAL PRIMARY KEY,
    name VARCHAR(30),
    hours INTEGER
);

CREATE TABLE products (
    id_product SERIAL PRIMARY KEY,
    id_company INTEGER REFERENCES companies (id_company),
    name VARCHAR(255),
    price REAL
);

CREATE TABLE invoices (
    id_invoice SERIAL PRIMARY KEY,
    id_company INTEGER REFERENCES companies (id_company),
    making_date DATE,
    payment_date DATE,
    id_shop INTEGER REFERENCES shops (id_shop),
    id_worker INTEGER REFERENCES workers (id_worker)
);

CREATE TABLE orders (
    id_order SERIAL PRIMARY KEY,
    id_company INTEGER REFERENCES companies (id_company),
    making_date DATE,
    delivery_date DATE,
    id_shop INTEGER REFERENCES shops (id_shop),
    id_worker INTEGER REFERENCES workers (id_worker)
);

CREATE TABLE messages (
    id_message SERIAL PRIMARY KEY,
    id_user INTEGER REFERENCES users (id_user),
    id_worker INTEGER REFERENCES workers (id_worker),
    date TIMESTAMP,
    messages TEXT
);

CREATE TABLE graphics (
    id_worker INTEGER REFERENCES workers (id_worker),
    id_shift INTEGER REFERENCES shifts (id_shift),
    PRIMARY KEY (id_worker, id_shift),
    date DATE
);

CREATE TABLE prod_ord (
    id_product INTEGER REFERENCES products (id_product),
    id_order INTEGER REFERENCES orders (id_order),
    quantity INTEGER,
    PRIMARY KEY (id_product, id_order)
);

INSERT INTO companies(name, bank_account) VALUES ('Semilac', '48115020567898000022'), ('Pepsi', '12398754972'), ('lenovo', '99854739875');
INSERT INTO pictures(path) VALUES ('Public/img/prof.jpg'), ('Public/img/Joanna.jpg');
INSERT INTO shops(name, address) VALUES ('Sephora', 'Warszawa'), ('żabka', 'Kraków'), ('Komputronik', 'Nowy Sącz');
INSERT INTO products(name, price) VALUES('lakier - 052', 59.99), ('batonik - mars', 4.99), ('laptop -msi', 3054.99);
INSERT INTO roles(name) VALUES ('kierownik'), ('magazynier'), ('sprzedawca');
INSERT INTO workers(name_surname) VALUES ('kierownik'), ('magazynier'), ('sprzedawca');
INSERT INTO addresses(city, street, house_number, apart_number, post_code) VALUES ('Nowy Sącz', 'Barska', 4, 48, 33300);
/* hasło: 12345 */
INSERT INTO users(id_role, id_picture, id_address, name_surname, password, email, birth_date, pesel, phone_number, id_number)
    VALUES (1, 1, 1, 'Katarzyna Janik', '$2y$10$uW6Dsu/eQ0p/5.TgoA6nXu1fd2gh9THrt.Tv37kniEkaB0tvdeusm', 'katarzyna@mail.com', '02-02-1996', '96022256987', '698425469', '123');
INSERT INTO invoices(id_company, making_date, payment_date, id_shop) VALUES(1, '01-31-2021', '12-31-2021', 1);
