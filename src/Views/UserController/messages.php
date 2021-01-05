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
    <link rel="Stylesheet" type="text/css" href="../../Public/css/messages.css"/>
    <title>Wiadomości</title>
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
                <div class="searchbar">
                    <form>
                        <input name="search" type="text" placeholder="Wyszukaj...">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class=icons>
                    <div class="add">
                        <button><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="delete">
                        <button><i class="fas fa-ban"></i></button>
                    </div>
                    <div class="grid">
                        <button><i class="fas fa-th-large"></i></button>
                    </div>
                </div>
                <div class="latest">
                    <div class="one" onclick="location.href='#';">
                        <div class="photo"></div>
                        <div class="info">
                            <p class="name">Joanna Tomaszewska</p>
                            <p class="mess">Joanna: Wszystko w porządku :D</p>
                        </div>
                    </div>
                    <div class="two" onclick="location.href='#';">
                        <div class="photo"></div>
                        <div class="info">
                            <p class="name">Kacper Tomasiak</p>
                            <p class="mess">Kacper: Do zobaczenia.</p>
                        </div>
                    </div>
                    <div class="three" onclick="location.href='#';">
                        <div class="photo"></div>
                        <div class="info">
                            <p class="name">Marita Kaczmarczyk</p>
                            <p class="mess">Marita: Myślę, że powinno nam się udać...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="top">
                    <div class="image">
                    </div>
                    <div class="name">Joanna Tomaszewska</div>
                    <div class="icon">
                        <button><i class="fas fa-phone-alt"></i> </button>
                        <button1><i class="fas fa-video"></i></button1>
                    </div>
                </div>
                <div class="messages">
                    <div class="mess1">
                        <div class="avatar">
                            <div class="profilepic">

                            </div>
                            <div class="info">
                                <p class="frst">Kacper</p>
                                <p class="scnd">2 godziny temu</p>
                            </div>
                        </div>
                        <div class="mess">
                            <p>Jest to spotkanie dające uczestnikom możliwość prezentacji doświadczeń związanych z uwzględnieniem przez przedsiębiorstwa problematyki społecznej i środowiskowej w swojej działalności komercyjnej i stosunkach z zainteresowanymi stronami oraz budowaniem pozytywnego wizerunku firmy.</p>
                        </div>
                    </div>
                    <div class="mess2">
                        <div class="avatar">
                            <div class="profilepic"></div>
                            <div class="info">
                                <p class="frst">Marita</p>
                                <p class="scnd">2 godziny temu</p>
                            </div>
                        </div>
                        <div class="mess">
                            <p>Punktem wyjściowym do dyskusji będzie historia działalności w tym zakresie firm Hours i Mentor. Poznamy inspiracje do prospołecznej postawy oraz plusy wynikające z pomocy innym.</p>
                        </div>
                    </div>
                    <div class="mess3">
                        <div class="avatar">
                            <div class="profilepic"></div>
                            <div class="info">
                                <p class="frst">Joanna</p>
                                <p class="scnd">2 godziny temu</p>
                            </div>
                        </div>
                        <div class="mess">
                            <p>Myślę, że powinniśmy tam pójść. I nam pomogą takie wskazówki w późniejszej pracy!</p>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <form>
                        <input input name="message" type="text" placeholder="Napisz coś...">
                        <button type="submit"><i class="fas fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

                        
