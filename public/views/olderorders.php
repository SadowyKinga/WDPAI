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
    <link rel="Stylesheet" type="text/css" href="../../Public/css/olderorders.css"/>
    <title> Archiwalne zamówienia </title>
</head>
<body>
<div class="wrapper"> 
    <?php include("Common/icons.php") ?>
    <div class="content">
        <?php include("Common/company_sign.php") ?>
        <div class="section">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Imię i nazwisko zamawiającego</th>
                        <th scope="col">Nazwa dostawcy</th>
                        <th scope="col">Nazwa sklepu</th>
                        <th scope="col">Id zamówienia</th>
                        <th scope="col">Data zamówienia</th>
                        <th scope="col">Data dostarczenia</th>                   
                    </tr>
                    </thead>
                    <tbody class="olderorders-list">
                    </tbody>
                </table>
                <button type="button" onclick="getAllOrders()">Pobierz wszystkie zamówienia</button>
            </div>
        </div>
    </div>
</body>
</html>
