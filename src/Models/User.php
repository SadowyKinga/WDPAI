<?php

class User /*klasa dla użytkownika by mógł korzystać z aplikacji webbowskiej po zalogowaniu się*/
{
    private $id_user;
    private $name_surname;
    private $password;
    private $email;
    private $role=['ROLE_USER'];
    private $name;
    private $path_to_pic;
    private $birth_date;
    private $pesel;
    private $phone_number;
    private $id_number;
    private $city;
    private $street;
    private $house_number;
    private $apart_number;
    private $post_code;

    /*tworzymy konstruktor*/
    public function __construct(
        string $email,
        string $password,
        string $name_surname,
        int $id_user = null,
        string $name = null,
        string $path_to_pic = null,
        string $birth_date = null,
        string $pesel = null,
        string $phone_number = null,
        string $id_number = null,
        string $city = null,
        string $street = null,
        string $post_code = null,
        string $house_number = null,
        string $apart_number = null
    )
    {
        $this->id_user = $id_user;
        $this->email = $email;
        $this->password = $password;
        $this->name_surname = $name_surname;
        $this->name = $name;
        $this->path_to_pic = $path_to_pic;
        $this->birth_date = $birth_date;
        $this->pesel = $pesel;
        $this->phone_number = $phone_number;
        $this->id_number = $id_number;
        $this->city = $city;
        $this->street = $street;
        $this->house_number = $house_number;
        $this->apart_number = $apart_number;
        $this->post_code = $post_code;
    }

    /*utworzenie getterów i tworzenie setterów*/
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getRoleName(): string
    {
        return $this->name;
    }

    public function getNameSurname(): string
    {
        return $this->name_surname;
    }

    public function getBirthDate()
    {
        if(is_null($this->birth_date)) {
            return "";
        }
        return $this->birth_date;
    }

    public function getPhoneNumber(): string
    {
        if(is_null($this->phone_number)) {
            return "";
        }
        return $this->phone_number;
    }

    public function getPesel(): string
    {
        if(is_null($this->pesel)) {
            return "";
        }
        return $this->pesel;
    }

    public function getIdNumber(): string
    {
        if(is_null($this->id_number)) {
            return "";
        }
        return $this->id_number;
    }

    public function getCity(): string
    {
        if(is_null($this->city)) {
            return "";
        }
        return $this->city;
    }

    public function getStreet(): string
    {
        if(is_null($this->street)) {
            return "";
        }
        return $this->street;
    }

    public function getHouseNumber(): string
    {
       if(is_null($this->house_number)) {
            return 0;
        }
        return $this->house_number;
    }

    public function getApartNumber(): string
    {
        if(is_null($this->apart_number)) {
            return 0;
        }
        return $this->apart_number;
    }

    public function getPostCode(): string
    {
         if(is_null($this->post_code)) {
            return 0;
        }
        return $this->post_code;
    }

    public function getPathToPic(): string
    {
       if($this->path_to_pic) {
            return $this->path_to_pic;
        } else {
            return 'javascript:void';
        }
    }
}
