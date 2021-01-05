<?php
if (!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}
if (!in_array('ROLE_USER', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}
?>

<!DOCTYPE html>
<head>
    <?php include("Common/headings.php") ?>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/workers.css"/>
    <title>Pracownicy</title>
</head>
<body>
<div id="mod" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
        <header class="w3-container w3-blue">
        <span onclick="document.getElementById('mod').style.display='none'"
              class="w3-button w3-display-topright">&times;</span>
            <div class="w3-container">
                <p>Dodanie pracownika</p>
        </header>
        <div class="content">
            <form action="?page=add_worker" id="myForm" method="POST">
                <p> Imię i nazwisko</p>
                <input name="name_surname" type="text">
                <p> Email</p>
                <input name="email" type="text">
                <p> Ścieżka do zdjęcia</p>
                <input name="path_to_pic" type="text">
                <p> Sklep, w którym będzie zatrudniony</p>
                <input name="id_shop" type="text">
                <p> Stanowisko</p>
                <input name="id_position" type="text">
                <p> Stawkę godzinową</p>
                <input name="payment" type="text">
                <div>
                    <button type="submit" id="save">ZAPISZ<i class="fas fa-check"> </i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="wrapper">
    <?php include("Common/icons.php") ?>
    <div class="content">
        <?php include("Common/company_sign.php") ?>
        <div class="section">
            <div class="e">
                <div>
                    <button onclick="openNav()" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                </div>
                <div class="sidemenu">
                    <button onclick="openModal()">DODAJ PRACOWNIKA</button>
                    <button onclick="Delete()">USUŃ PRACOWNIKA</button>
                    <button onclick="location.href='?page=messages'">WYŚLIJ WIADOMOŚĆ</button>
                    <button onclick="getWorkers()">POBIERZ LISTĘ PRACOWNIKÓW</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>