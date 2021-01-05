<!DOCTYPE html>
<html>
<head>
    <?php include("Common/headings.php") ?>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/login.css"/>
    <title>BrickShop</title>
</head>
<body>
<div class='container'>
    <div class='logo'>
        <k>
            <img src='../../public/img/Logo.png'>
        </k>
        <s>
            <img src='../../public/img/BrickShop.png'>
        </s>
    </div>
    <form action="?page=login" method="POST">
        <p>
            <img src='../../public/img/Witamy.png'>
        </p>
        <div class="messages">
            <?php
            if (isset($messages)) {
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <div class="input_icon">
            <input name="email" type="text" placeholder="EMAIL">
            <i class="fas fa-user" aria-hidden="true"></i>
            <input name="password" type="password" placeholder="HASŁO">
            <i class="fas fa-lock" aria-hidden="true"></i>
        </div>
        <button class='button1' type="submit"><i class="fas fa-arrow-right fa-lg" style="color: #0B7EE0 "></i></button>
        <button class='button2' type="button"><i class="fas fa-pen"></i><a href="?page=register">ZAREJESTRUJ SIĘ</a></button>
        <button class='button3' type="button"><i class="fab fa-google-plus-g"></i>ZALOGUJ SIĘ PRZEZ GOOGLE</button>
        <button class='button4' type="button"><i class="fab fa-apple"></i>ZALOGUJ SIĘ UŻYWAJĄC KONTA APPLE</button>
    </form>
</div>
</body>
</html>
