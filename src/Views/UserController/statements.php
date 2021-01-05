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
    <link rel="Stylesheet" type="text/css" href="../../Public/css/statements.css"/>
    <title>Zestawienia</title>
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
    
            <div class="left">

                <div class="first">
                    <p class="z">Przegląd budżetu</p>
                </div>
                
                <div class="second">
                    <form>
                        <div class="lft">
                            <p> MIESIĄC</p>
                            <input type="text" placeholder="Styczeń">
                        </div>
                        <div class="rgth">
                            <p>ROK</p>
                            <input type="text" placeholder="2021">
                        </div>
                    </form>
                </div>
                    <div class="buttons">
                        <button>SCZEGÓŁY ZESTAWIENIA<i class="fas fa-angle-right"></i></button>
                        <button>ZESTAWIENIE ROCZNE<i class="fas fa-angle-right"></i></button>
                        <button>DRUKUJ ZESTAWIENIE<i class="fas fa-angle-right"></i></button>
                    </div>
                </div>
                
                <div class="fourth">
                    
                    <div class="photo1">
                        <img src="../../Public/img/zestawienie.png">
                    </div>
                    <div class="photo">
                        <img src="../../Public/img/zysk.jpg">
                    </div>
                </div>
            </div>
    </div>
</div>
</body>
