<?php
require_once ("Repository/UserRepository.php");
require_once ("Models/User.php");
$url = "http://$_SERVER[HTTP_HOST]/";

$repo = new UserRepository();
$user= $repo -> getUser($_SESSION['id']);
$user_role = $user->getRoleName();

if ($user_role !== 'admin')
{
    header("Location: {$url}?page=page");
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <?php include('Common/headings.php'); ?>
    <link rel="Stylesheet" type="text/css" href="../../Public/css/users.css"/>
    <script src="../../Public/js/admin.js"></script>
    <title>Admin panel</title>
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
                        <th scope="col">Lp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Name Surname</th>
                        <th scope="col">Rola</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row"><?= $user->getIdUser(); ?></th>
                        <td><?= $user->getEmail(); ?></td>
                        <td><?= $user->getNameSurname(); ?></td>
                        <td><?= $user->getRoleName(); ?></td>
                    </tr>
                    </tbody>
                    <tbody class="users-list">
                    </tbody>
                </table>
                <button type="button" onclick="getUsers()">
                    Get all users
                </button>
        </div>
    </div>
</div>
</body>
</html>