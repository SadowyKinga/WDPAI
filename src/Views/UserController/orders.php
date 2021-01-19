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
    <link rel="Stylesheet" type="text/css" href="../../Public/css/orders.css" />
    <link rel="Stylesheet" type="text/css" href="../../Public/css/workers.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="../../Public/js/orders.js"></script>
    <title>Zamówienia</title>
</head>

<body>
    <script>
    $(document).ready(() => <?php 
        if(isset($order)) {
            $order_id = $order->getOrderId(); echo "getProducts($order_id)";
        }
    ?>);
    </script>
    <div id="mod" class="w3-modal">
        <div class="w3-modal-content w3-card-4">
            <header class="w3-container w3-blue">
                <span onclick="document.getElementById('mod').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <div class="w3-container">
                    <p>Dodaj zamówienie</p>
            </header>
            <div class="content">
                <form action='?page=orderAdd' method='POST'>
                    <p>Wybierz firmę</p>
                    <?php
                    $default = $companies[0]["id_company"];
                    echo "<select name='id_company' value='$default'>";
                    foreach ($companies as &$company) {
                        $id = $company["id_company"];
                        $name = $company["name"];
                        echo "<option value='$id'>$name</option>";
                    }
                    ?>
                    </select>
                    <p>Wybierz datę dostawy</p>
                    <input name="delivery_date" type="date" required>
                    <p>Wybierz sklep</p>
                    <?php
                    $default = $shops[0]["id_shop"];
                    echo "<select name='id_shop' value='$default' required>";
                    foreach ($shops as &$shop) {
                        $id = $shop["id_shop"];
                        $adress = $shop["address"];
                        $name = $shop["name"];
                        echo "<option value='$id'>$name w $adress</option>";
                    }
                    ?>
                    </select>
                    <p>Wybierz pracownika</p>
                    <?php
                    $default = $workers[0]["id_worker"];
                    echo "<select name='id_worker' value='$default' required>";
                    foreach ($workers as &$worker) {
                        $id = $worker["id_worker"];
                        $name = $worker["name_surname"];
                        echo "<option value='$id'>$name</option>";
                    }
                    ?>
                    </select>
                    <p>Dodaj produkty</p>
                    <div class="products" id="products">
                        <div id="product" class="product">
                            <?php
                            $default = $products[0]["id_product"];
                            echo "<select name='product_id[]' value='$default' required>";
                            foreach ($products as &$product) {
                                $id = $product["id_product"];
                                $name = $product["name"];
                                echo "<option value='$id'>$name</option>";
                            }
                            ?>
                            </select>
                            <input class="product-quant" type="number" name="product_quant[]" min="1" required>
                        </div>


                    </div>
                    <div class="product-add" onclick="addProduct()">+ Dodaj produkt</div>

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
                <div>
                    <button onclick="openNav()" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                </div>
                <div class="godeep">
                    <button class="neworder" onclick="openModal()">Utwórz nowe zamówienie <i class="fas fa-plus"></i></button>
                    <button class="showorder" onclick=<?php 
                            if(isset($order)) {
                                $order_id = $order->getOrderId(); echo "getProducts($order_id)";
                            } else {
                                echo "javascript:void()";
                            }
                    ?> >Odśwież tabelę <i class="fas fa-plus"></i></button>
                    <button onclick="location.href='?page=indexorders'" class="goback">Przejdź do archiwalnych zamówień <i class="fas fa-arrow-right"></i></button>
                </div>
                <div class="info">
                    <?php
                    if (is_null($order)) {
                        echo "<div>Brak zamówień</div>";
                    } else {
                        $companyName = $order->getCompanyName();
                        $shopName = $order->getShopName();
                        $workerName = $order->getWorkerName();
                        $makingDate = $order->getMakingDate();
                        $deliveryDate = $order->getDeliveryDate();

                        echo "
                        <form>
                        <div class='top'>
                            <div>
                                <p>DOSTAWCA</p>
                                <input type='text' placeholder='$companyName' disabled>
                            </div>
                            <div>
                                <p>NAZWA PRZEDSIĘBIORSTWA</p>
                                <input type='text' placeholder='$shopName' disabled>
                            </div>
                            <div>
                                <p>IMIĘ I NAZWISKO ZAMAWIAJĄCEGO</p>
                                <input type='text' placeholder='$workerName' disabled>
                            </div>
                        </div>
                        <div class='down'>
                            <div>
                                <p>DATA ZŁOŻENIA ZAMÓWIENIA</p>
                                <input type='text' placeholder='$makingDate' disabled>
                            </div>
                            <div>
                                <p>OCZEKIWANA DATA OTRZYMANIA ZAMÓWIENIA</p>
                                <input type='text' placeholder='$deliveryDate' disabled>
                            </div>
                        </div>
                        </form>
                        ";
                    }
                    ?>

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
