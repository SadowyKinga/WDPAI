<?php
if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if(!in_array('ROLE_USER', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}

<!DOCTYPE html>
<html>
<head>
    <?php include("Common/headings.php") ?>
    <link rel="Stylesheet" type="text/css" href="../Public/css/page.css" />
    <title>Strona Główna</title>
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <img class="koszyk" src="../Public/img/Logo.png" alt="Brak zdjęcia">
            <img class="napis" src="../Public/img/BrickShop.png" alt="Brak zdjęcia">
        </div>
    <div class="a">
        <button class="okno1" onclick="location.href='?page=profile';" style="cursor: pointer;">
            <a1><img id="inscription" src='../Public/img/moj profil.png'></a1>
        </button>
    </div>
    <div class="b">
        <button class="okno2" onclick="location.href='?page=statements';" style="cursor: pointer;">
            <b1><img id="inscription" src='../Public/img/Zestawienia.png'></b1>
        </button>
    </div>
    <div class="c">
        <button class="okno3" onclick="location.href='?page=startorders';" style="cursor: pointer;">
            <c1><img id="inscription" src='../Public/img/Zamówienia.png'></c1>
        </button>
    </div>
    <div class="d">
        <button class="okno4" onclick="location.href='?page=inv';" style="cursor: pointer;">
            <d1><img id="inscription" src='../Public/img/faktury.png'></d1>
        </button>
    </div>
    <div class="e">
        <button class="okno5" onclick="location.href='?page=startworkers';" style="cursor: pointer;">
            <e1><img id="inscription" src='../Public/img/pracownicy.png'></e1>
        </button>
    </div>
    <div class="f">
        <button class="okno6" onclick="location.href='?page=graphic';" style="cursor: pointer;">
            <f1><img id="inscription" src='../Public/img/grafik.png'></f1>
        </button>
    </div>
    <div class="g">
        <button class="okno7" onclick="location.href='?page=messages';" style="cursor: pointer;">
            <g1><img id="inscription" src='../Public/img/wiadomosci.png'></g1>
        </button>
    </div>
</div>
</body>
</html> 
