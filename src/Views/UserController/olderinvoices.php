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
    <script src="../../Public/js/orders.js"></script>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/olderinvoices.css"/>
    <title> Starsze faktury </title>
</head>
<body>
    
<div class="wrapper">
    <?php include("Common/icons.php") ?>
    <div class="content">
        <?php include("Common/company_sign.php") ?>
        
        <!-- Główna sekcja strony -->
        <div class="section">
        <form action='?page=orderAdd' method='POST'>
                    <p>Wybierz firmę</p>
                    <select name = "id_company" value = "1">
                        <option value="1">Semilac</option>
                        <option value ="2"> Pepsi</option>
                        <option value = "3">lenovo</option>
                    </select>
                <table class="table">
                    <thead>
                    <tr>
                        <td class="w">Id faktury</td>
                        <td class="w">Nazwa firmy</td>
                        <td class="w">Termin płatności</td>
                        <td class="w">Numer rachunku</td>
                        <td class="w">Kwota</td>
                        <td class="w">Okres rozliczeniowy</td>
                        <td class="w">Szczegóły</td> 
                    </tr>
                    <tr>
                        <td><p0>1</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>31.01.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>250 zł</p0></td>
                        <td><p0>01.01.2021 - 31.01.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                    <tr>
                        <td><p0>2</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>28.02.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>50 zł</p0></td>
                        <td><p0>01.02.2021 - 28.02.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                    <tr>
                        <td><p0>3</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>31.03.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>100 zł</p0></td>
                        <td><p0>01.03.2021 - 31.03.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                    <tr>
                        <td><p0>4</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>30.04.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>150 zł</p0></td>
                        <td><p0>01.04.2021 - 30.04.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                    <tr>
                        <td><p0>5</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>31.05.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>200 zł</p0></td>
                        <td><p0>01.05.2021 - 31.05.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                    <tr>
                        <td><p0>6</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>30.06.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>500 zł</p0></td>
                        <td><p0>01.06.2021 - 30.06.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                    <tr>
                        <td><p0>7</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>31.07.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>400 zł</p0></td>
                        <td><p0>01.07.2021 - 31.07.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                    <tr>
                        <td><p0>8</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>31.08.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>350 zł</p0></td>
                        <td><p0>01.08.2021 - 31.08.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                    <tr>
                        <td><p0>9</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>30.09.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>250 zł</p0></td>
                        <td><p0>01.09.2021 - 30.09.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                    <tr>
                        <td><p0>10</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>31.10.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>300 zł</p0></td>
                        <td><p0>01.10.2021 - 31.10.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                    <tr>
                        <td><p0>11</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>30.11.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>120 zł</p0></td>
                        <td><p0>01.11.2021 - 30.11.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                    <tr>
                        <td><p0>12</p0></td>
                        <td><p0>Semilac</p0></td>
                        <td><p0>31.12.2021</p0></td>
                        <td><p0>48115020567898000022</p0></td>
                        <td><p0>528 zł</p0></td>
                        <td><p0>01.12.2021 - 31.12.2021</p0></td>
                        <th scope="col"> <i class="fas fa-arrow-right"></i></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
