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
    <link rel="Stylesheet" type="text/css" href="../../Public/css/graphic.css"/>
    <title>Grafik</title>
</head>
<body>
<div class="wrapper">
    <?php include("Common/icons.php") ?>
    <div class="content">
        <?php include("Common/company_sign.php") ?>
        <link rel="Stylesheet" type="text/css" href="../../Public/css/graphic.css"/>
        <div class="section">
            <div>
                <button onclick="openNav()" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
            </div>
            <div class="photo">
            <img src='../../Public/img/pani_grafik.png'>
            </div>
            <div class="icons">
                <div class="one" onclick="location.href='#';">
                    <div class="date">01.01.2021r - 31.01.2021r  <i class="fas fa-calendar-alt"></i></div>
                    <div class="opinion">Nowy grafik  <i class="fas fa-plus"></i></div>
                </div>
            </div>
            <div class="table">
                <table class="sch">
                    <tr>
                        <td><p0>Poniedziałek</p0></td>
                        <td><p0>Wtorek</p0></td>
                        <td><p0>Środa</p0></td>
                        <td><p0>Czwartek</p0></td>
                        <td><p0>Piątek</p0></td>
                        <td><p0>Sobota</p0></td>
                        <td><p0>Niedziela</p0></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td><d>01</d><p>9:00-17:00</p><i>Joanna Tomaszewska</i></td>
                        <td><d>02</d><p>9:00-17:00</p><i>Kacper Tomasiak</i></td>
                        <td class="w"><d1>03</d1></td>
                    </tr>
                    <tr>
                        <td><d>04</d><p>9:00-17:00</p><i>Marita Kaczmarczyk</i></td>
                        <td><d>05</d><p>9:00-17:00</p><i>Kacper Tomasiak</i></td>
                        <td><d>06</d><p>9:00-17:00</p><i>Kacper Tomasiak</i></td>
                        <td><d>07</d><p>9:00-17:00</p><i>Joanna Tomaszewska</i></td>
                        <td><d>08</d><p>9:00-17:00</p><i>Joanna Tomaszewska</i></td>
                        <td><d>09</d><p>9:00-17:00</p><i>Katarzyna Janik</i></td>
                        <td class="w"><d1>10</d1></td>
                    </tr>
                    <tr>
                        <td><d>11</d><p>9:00-17:00</p><i>Marita Kaczmarczyk</i></td>
                        <td><d>12</d><p>9:00-17:00</p><i>Marita Kaczmarczyk</i></td>
                        <td><d>13</d><p>9:00-17:00</p><i>Kacper Tomasiak</i></td>
                        <td><d>14</d><p>9:00-17:00</p><i>Joanna Tomaszewska</i></td>
                        <td><d>15</d><p>9:00-17:00</p><i>Marita Kaczmarczyk</i></td>
                        <td><d>16</d><p>9:00-17:00</p><i>Katarzyna Janik</i></td>
                        <td class="w"><d1>17</d1></td>
                    </tr>
                    <tr>
                        <td><d>18</d><p>9:00-17:00</p><i>Katarzyna Janik</i></td>
                        <td><d>19</d><p>9:00-17:00</p><i>Kacper Tomasiak</i></td>
                        <td><d>20</d><p>9:00-17:00</p><i>Marita Kaczmarczyk</i></td>
                        <td><d>21</d><p>9:00-17:00</p><i>Joanna Tomaszewska</i></td>
                        <td><d>22</d><p>9:00-17:00</p><i>Marita Kaczmarczyk</i></td>
                        <td><d>23</d><p>9:00-17:00</p><i>Katarzyna Janik</i></td>
                        <td class="w"><d1>24</d1></td>
                    </tr>
                    <tr>
                        <td><d>25</d><p>9:00-17:00</p><i>Joanna Tomaszewska</i></td>
                        <td><d>26</d><p>9:00-17:00</p><i>Marita Kaczmarczyk</i></td>
                        <td><d>27</d><p>9:00-17:00</p><i>Katarzyna Janik</i></td>
                        <td><d>28</d><p>9:00-17:00</p><i>Kacper Tomasiak</i></td>
                        <td><d>29</d><p>9:00-17:00</p><i>Marita Kaczmarczyk</i></td>
                        <td><d>30</d><p>9:00-17:00</p><i>Joanna Tomaszewska</i></td>
                        <td class="w"><d1>31</d1></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
