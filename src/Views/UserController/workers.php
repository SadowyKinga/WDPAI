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
    <meta charset="UTF-8">
    <?php include("Common/headings.php") ?>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/workers.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="../../Public/js/workers.js"></script>
    <script>
    $(document).ready(() => {
        getWorkers();
    })
    </script>
    <title>Pracownicy</title>
</head>
<body>

<div id="mod" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
        <header class="w3-container w3-blue">
        <span onclick="document.getElementById('mod').style.display='none'"
              class="w3-button w3-display-topright">&times;</span>
            <div class="w3-container">
                <p>Dodaj pracownika</p>
        </header>
        <div class="content">
            <form enctype="multipart/form-data" action="?page=add_worker" id="myForm" method="POST">
                <p> Podaj imię i nazwisko</p>
                <input name="name_surname" type="text" required>
                <p> Wybierz stanowisko</p>
                <?php
                    $default = $shops[0]["id_role"];
                    echo "<select name='id_role' value='$default'>";
                    foreach($roles as &$role) {
                        $id = $role["id_role"];
                        $name = $role["name"];
                        echo "<option value='$id'>$name</option>";
                    }
                ?>
                </select>
                <p> Podaj email</p>
                <input name="email" type="email" required>
                <p>Wybierz zdjęcie</p>
                <input name="profile_img" type="file" required>
                <p> Podaj sklep w którym będzie zatrudniony</p>
                <?php
                    $default = $shops[0]["id_shop"];
                    echo "<select name='id_shop' value='$default'>";
                    foreach($shops as &$shop) {
                        $id = $shop["id_shop"];
                        $adress = $shop["address"];
                        $name = $shop["name"];
                        echo "<option value='$id'>$name w $adress</option>";
                    }
                ?>
                </select>
                <p> Podaj stawkę godzinową</p>
                <input name="payment" type="number" min="15" required>
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
                    <div button class = "one">
                    <?php $id = 0;
                    if($_SESSION["id_numer"] == "admin"){
                        echo'<button class =""one" onclick="openModal()"'.$id.'">DODAJ PRACOWNIKA<?button>';
                    }else{
                        echo'<button class ="#?id='.$id.'">DODAJ PRACOWNIKA<?p>';
                    }
                    ?>
                    </div>
                    <div button class = "two">
                    <!--<button class= "one" onclick="openModal()">DODAJ PRACOWNIKA</button>-->
                    <?php $id = 0;
                    if($_SESSION["id_numer"] == "admin"){
                        echo'<button class =""two" onclick="Delete()"'.$id.'">USUŃ PRACOWNIKA<?button>';
                    }else{
                        echo'<button class ="#?id='.$id.'">USUŃ PRACOWNIKA<?p>';
                    }
                    ?>
                    </div>
                    <!--<button class = "two" onclick="Delete()">USUŃ PRACOWNIKA</button>-->
                    <button class = "three" onclick="location.href='?page=messages'">WYŚLIJ WIADOMOŚĆ</button>
                    <button class = "four" onclick="getWorkers()">POBIERZ PRACOWNIKÓW</button>
                </div>
            </div>
            <div class="wrap">
            </div>
        </div>
    </div>
</div>
</body>
</html>

