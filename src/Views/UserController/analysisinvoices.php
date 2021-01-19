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
    <link rel="Stylesheet" type="text/css" href="../../Public/css/analysisinvoices.css"/>
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title> Szczegóły faktury </title>
</head>
<body>
<!-- Główna sekcja strony -->
<div class="wrapper">
    <?php include("Common/icons.php") ?>
    <div class="content">
        <?php include("Common/company_sign.php") ?>
        <?php include("Common/headings.php") ?>
        <section class ="uploads">
            <form enctype="multipart/form-data" action="?page=analysisinvoices" id="myForm" method="POST">
                <p>Zmień fakturę</p>
                <input name="profile_img" type="file" required>
                <button class="saved" type="submit">ZAPISZ <i class="fas fa-check"> </i></button>
            </form>
        </section>
        <img class="photo" src="../Public/img/faktury.jpg" alt="Brak zdjęcia">
    </div>
</div>
</body>
</html>
