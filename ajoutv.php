<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php
    require('conn.php');

    ?>
    <div class="main">
        <div class="nav">
            <img class="logo" src="img/logo.png" alt="logo">
            <ul>
                <li><a href="achatvoit.html" class="link">Achat d'une voiture</a> </li>
                <li><a href="venteform.php" class="link">Vente d'une voiture</a> </li>
                <li><a href="#" class="link">Liste des voitures</a></li>
                <li><a href="#" class="link">Statistiques</a> </li>
                <li><a href="ajoutf.php" class="link">Ajout des frais</a> </li>
            </ul>
        </div>
        <div class="cont" style="height:'auto'; backdrop-filter: blur(12px);">
            <?php
            $ser = $_POST['ser'];
            $dta = $_POST['dta'];
            $pra = $_POST['pra'];
            $klma = $_POST['klma'];
            $dtv = $_POST['dtv'];
            $prv = $_POST['prv'];
            $klmv = $_POST['klmv'];
            $req = "INSERT INTO `vente`(`serie`, `datea`, `prixa`, `kiloa`, `datev`, `prixv`, `kilov`) VALUES ('$ser','$dta',$pra,$klma,'$dtv',$prv,$klmv);";
            $res = mysqli_query($con, $req);
            if (mysqli_affected_rows($con) == -1) {
                echo "<script>alert('Une erreur'" . mysqli_error() . ");</script>";
                die("ERREUR" . mysqli_error($con));
            } else {
                $req2 = "SELECT * FROM frais WHERE nbvoit=?";
                $stmt = mysqli_prepare($con, $req2);
                mysqli_stmt_bind_param($stmt, 's', $ser);
                mysqli_stmt_execute($stmt);
                $res2 = mysqli_stmt_get_result($stmt);

                $fr = 0;
                while ($r = mysqli_fetch_array($res2)) {
                    $fr += $r['frais'];
                }

                $x = $prv - ($pra + $fr);

                if ($x > 0) {
                    echo "<h1 style='color: green;'>tu as gagné: +" . $x . "</h1> <br>";
                } else {
                    echo "<h1 style='color: red;'>tu as perdu: " . $x . "</h1> <br>";
                }

                $req3 = "UPDATE `voiture` SET `vendu`='n' WHERE 'serie'='$ser'";
                $res3 = mysqli_query($con, $req3);
                $date1 = strtotime($dta);
                $date2 = strtotime($dtv);
                $diff = (($date2 - $date1) / 86400);
                echo "<h1>voiture vendu dans: " . $diff . " jours</h1> <br>";
                echo "<h1>voiture utilisé pour: " . $klmv - $klma . " kilometre</h1> <br>";
                echo "<h1>Ajout effectué avec succès</h1> <br> <a href='index.html' class='link'>Retourner à l'Acceuil</a>";
            }
            ?>
        </div>
    </div>
    <script>
        $(window).on('load', function () {
            $(".loader").fadeOut(1000);
            $(".main").fadeIn(1000);

        });
    </script>
    <script src="main.js"></script>
</body>

</html>