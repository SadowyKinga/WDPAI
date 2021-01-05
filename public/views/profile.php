<?php
if (!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}
if (!in_array('ROLE_USER', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include("Common/headings.php") ?>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/profile.css"/>
    <script src="../../Public/js/changedata.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Twój profil</title>
</head>
<body>

<!-- formularz zmiany danych -->
<div id="mod2" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
        <header class="w3-container w3-blue">
        <span onclick="document.getElementById('mod2').style.display='none'"
              class="w3-button w3-display-topright">&times;</span>
            <div class="w3-container">
                <p>Zmiana danych</p>
        </header>
        <div class="content3">
                <form action="?page=change_data" method="POST"><k>DANE OSOBOWE</k>
                    <p>Data urodzenia</p>
                    <input name="birth_date" type="date">
                    <p>Pesel</p>
                    <input name="pesel" type="text">
                    <p>Numer telefonu</p>
                    <input name="phone_number" type="text">
                    <p>Numer identyfikatora</p>
                    <input name="id_number" type="text">
                    <p>E-mail</p>
                    <input name="email" type="text">
                    <p> </p>
                    <k>ADRES ZAMIESZKANIA</k>
                    <p>Miejscowość</p>
                    <input name="city" type="text">
                    <p>Ulica</p>
                    <input name="street" type="text">
                    <p>Kod pocztowy</p>
                    <input name="post_code" type="text">
                    <p>Numer domu</p>
                    <input name="house_number" type="text">
                    <p>Numer mieszkania</p>
                    <input name="apart_number" type="text">
                    <p>Województwo</p>
                    <input name="voivodeship" type="text">
                    <button class="saved" type="submit">ZAPISZ<i class="fas fa-check"> </i></button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- formularz zmiany zdjęcia profilowego -->
<div id="mod1" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
        <header class="w3-container w3-blue">
        <span onclick="document.getElementById('mod1').style.display='none'"
              class="w3-button w3-display-topright">&times;</span>
            <div class="w3-container">
                <p>Zmiana zdjęcia profilowego</p>
        </header>
        <div class="content">
            <form action="?page=change_pic" method="POST">
                <p> Podaj ścieżkę do nowego zdjęcia profilowego</p>
                <input name="path_to_pic" type="text">
                <button class="saved" type="submit">ZAPISZ<i class="fas fa-check"> </i></button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- formularz zmiany hasła -->
<div id="mod" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
        <header class="w3-container w3-blue">
        <span onclick="document.getElementById('mod').style.display='none'"
              class="w3-button w3-display-topright">&times;</span>
            <div class="w3-container">
                <p>Zmiana hasła</p>
        </header>
        <div class="content">
            <form action="?page=change_pass" method="POST">
                <p> Podaj stare hasło</p>
                <input name="password_old" type="password">
                <p> Podaj nowe hasło</p>
                <input name="password_new" type="password">
                <p> Powtórz nowe hasło</p>
                <input name="password_new_2" type="password">
                <button class="saved" type="submit">ZAPISZ<i class="fas fa-check"> </i></button>
            </form>
        </div>
    </div>
</div>
</div>

<div class="wrapper">
    <?php include("Common/icons.php") ?>
    <div class="content">
        <?php include("Common/company_sign.php") ?>
        
        <!--SEKCJA GŁÓWNA STRONY-->
        <div class="section">
            <div>
                <button onclick="openNav()" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
            </div>
            <div class="tables">
                <div class="left">
                    <div id="imgname">
                        <img class="picture" src="<?= $user->getPathToPic(); ?>">
                    </div>
                    <div class="info">
                        <h1><?php echo $user->getNameSurname() ?> </h1>
                        <p> KIEROWNIK </p>
                    </div>
                    <ul>
                        <li>
                            <button type="button" id="change" onclick="ChangeData()">ZMIEŃ DANE</button>
                        </li>
                        <li>
                            <button type="button" id="pichange" onclick="ChangePic()">ZMIEŃ ZDJĘCIE PROFILOWE</button>
                        </li>
                        <li>
                            <button type="button" onclick="ChangePass()">ZMIEŃ HASŁO</button>
                        </li>
                    </ul>
                </div>

                <div class="right">
                    <div class="r-left">
                        <form>
                            <p class="data">DANE OSOBOWE</p>
                            <p>DATA URODZENIA</p>
                            <input id="ur" type="text" placeholder="<?php echo $user->getBirthDate() ?>" disabled>
                            <p>PESEL</p>
                            <input id="pesel" type="text" placeholder="<?php echo $user->getPesel() ?>" disabled>
                            <p>NUMER TELEFONU</p>
                            <input id="nrt" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"
                                   placeholder="<?php echo $user->getPhoneNumber() ?>" disabled>
                            <p>NUMER IDENTYFIKATORA</p>
                            <input id="nrid" type="text" placeholder="<?php echo $user->getIdNumber() ?>" disabled>
                            <p>E-MAIL</p>
                            <input id="email" type="email" placeholder="<?php echo $user->getEmail() ?>" disabled>
                        </form>
                    </div>
                    <div class="line"></div>
                    <div class="r-right">
                        <form>
                            <p class="diffp">ADRES ZAMIESZKANIA</p>
                            <p>MIEJSCOWOŚĆ</p>
                            <input id="miasto" type="text" placeholder="<?php echo $user->getCity() ?>" disabled>
                            <p>ULICA</p>
                            <input id="ulica" type="text" placeholder="<?php echo $user->getStreet() ?>" disabled>
                            <p>KOD POCZTOWY</p>
                            <input id="kodp" type="tel" pattern="[0-9]{2}-[0-9]{3}" placeholder="<?php echo $user->getPostCode() ?>" disabled>
                            <div class="adr">
                                <div class="nr-dom">
                                    <p>NR DOMU</p>
                                    <input id="nrd" type="text" placeholder="<?php echo $user->getHouseNumber() ?>" disabled>
                                </div>
                                <div class="nr-mies">
                                    <p>NR MIESZKANIA</p>
                                    <input id="nrm" type="text" placeholder="<?php echo $user->getApartNumber() ?>" disabled>
                                </div>
                            </div>
                            <p>WOJEWÓDZTWO</p>
                            <input id="voiv" type="text" placeholder="<?php echo $user->getVoivodeship() ?>" disabled>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
