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
    <link rel="Stylesheet" type="text/css" href="../../Public/css/orders.css"/>
    <title>Zamówienia</title>
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
            <div class="godeep">
                <button class="neworder" onclick="getProducts()"> Nowe zamówienie <i class="fas fa-plus"></i></button>
                <button class="showorder" onclick="getProducts()"> Pokaż zamówienie <i class="far fa-eye"></i></button>
                <button onclick="location.href='?page=indexorders'" class="goback">Archiwalne zamówienia <i class="fas fa-arrow-right"></i></button>
            </div>
            <div class="info">
                <form>
                    <div class="top">
                        <div>
                            <p>DOSTAWCA</p>
                            <input type="text" placeholder="<?= $order->getCompanyName() ?>" disabled>
                        </div>
                        <div>
                            <p>NAZWA PRZEDSIĘBIORSTWA</p>
                            <input type="text" placeholder="<?= $order->getShopName() ?>" disabled>
                        </div>
                        <div>
                            <p>IMIĘ I NAZWISKO ZAMAWIAJĄCEGO</p>
                            <input type="text" placeholder="<?= $order->getWorkerName() ?>" disabled>
                        </div>
                    </div>
                    <div class="down">
                        <div>
                            <p>DATA ZŁOŻENIA ZAMÓWIENIA</p>
                            <input type="text" placeholder="<?= $order->getMakingDate() ?>" disabled>
                        </div>
                        <div>
                            <p>PRZEWIDYWANA DATA OTRZYMANIA ZAMÓWIENIA</p>
                            <input type="text" placeholder="<?= $order->getDeliveryDate() ?>" disabled>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bottom">
                <div class="table">
                    <table>
                        <tr class="headings">
                            <td>Numer produktu</td>
                            <td>Nazwa produktu</td>
                            <td>Ilość</td>
                        </tr>
                        <tbody class="product-list">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>  
