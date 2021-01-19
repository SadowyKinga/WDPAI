<!DOCTYPE html>
<html>
<head>
    <?php include("Common/headings.php") ?>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/account.css"/>
    <title>Zarejestruj się</title>
</head>
<body>
<?php 
if($userCreated) {
    echo "
        <script type=\"text/javascript\">
            setTimeout(() => window.location.href = '/?page=login', 500)
        </script>
    ";
}
?>
<div class='container'>
    <div class='logo'>
        <p>  <img src='../Public/img/Logo.png'> <br> <img src='../Public/img/BrickShop.png'> </p>
    </div>
    <form action="?page=account" method="POST">
    <h1> Załóż konto w BrickShop</h1>
    <h2>Aby założyć konto, wypełnij poniższe pola.</h2>
    <h3>Twoje dane -----------------------------------------------------</h3>
    <div class="mess">
        <?php
        if (isset($messages)) {
            foreach ($messages as $message) {
                echo $message;
            }
        }
        ?>
    </div>
    <p>Imię i nazwisko</p>
        <input name="name_surname" type="text" placeholder="imię i nazwisko">
        <h3>Dane konta -----------------------------------------------------</h3>
        <p>Wybierz login</p>
        <input name="email" type="text" placeholder="email@mail.com" >
        <p>Hasło</p>
        <input name="password_1" type="password" placeholder="●●●●●">
        <p>Powtórz hasło</p>
        <input name="password_2" type="password" placeholder="●●●●●" >
        <button class='button1' type="submit"> <i> Załóż konto </i></button>
    </form>
</div>
</body>
</html>
