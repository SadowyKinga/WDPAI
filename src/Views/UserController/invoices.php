<?php
if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if(!in_array('ROLE_USER', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include("Common/headings.php") ?>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/invoices.css"/>
    <script src="../../Public/js/invoices.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Faktury</title>
</head>
<body>
<div class="wrapper">

    <?php include("Common/icons.php") ?>

    <div class="content">
        <?php include("Common/company_sign.php") ?>
        <div class="section">
            <div>
                <button onclick="openNav()" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
            </div>
            <img src='../../Public/img/semilacc.png'>
            <h1> FAKTURA 01.12.2021 - 31.12.2021 </h1>
            <button onclick="location.href='?page=indexinvoices'" class="goback">PRZEJDŹ DO ARCHIWALNYCH FAKTUR <i class="fas fa-arrow-right"></i></button>
            
            <div class="top_of_the_page">
                <div class="window">
                    <div class="left">
                        <p> Nazwa firmy:</p>
                        <p> Numer rachunku:</p>
                        <p> Termin płatności:</p>
                    </div>
                    <div class="center">
                        <p><?=$invoice->getComapyName()?></p>
                        <p><?=$invoice->getBankAccount()?></p>
                        <p><?=$invoice->getPaymentDate()?></p>
                        <k>Poznaj również nasze najnowsze kolory!</k>
                    </div>
                    <div class="right">
                    <img src='../../Public/img/semilac.jpg'>
                        <div class="rr">
                        <img src='../../Public/img/semilac1.jpg'>
                    </div>
                </div>
                    <button onclick="location.href='?page=analysisinvoices'" class="goback">Szczegóły <i class="fas fa-angle-right"></i></i></button>
                </div>
                <div class="under">
                <p>KWOTA: 528 zł </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>