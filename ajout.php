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
        <div class="cont">
            <?php
            $ser=$_POST['ser'];
            $slc=$_POST['slc'];
            $slc2=$_POST['slc2'];
            $numsach=$_POST['numsach'];
            $puis=$_POST['puis'];
            $energie=$_POST['r'];
            $fichtech=$_POST['fichtech'];
            $disp="d";
            $req="INSERT INTO `voiture`(`serie`, `marque`, `modele`, `numsach`, `puissance`, `energie`, `fichtech`,`vendu`) VALUES ('$ser','$slc','$slc2','$numsach',$puis,'$energie','$fichtech','$disp');";
            $res=mysqli_query($con,$req);
            if(mysqli_affected_rows($con)==-1){
                echo "<script>alert(". mysqli_error() .");</script>";
                die("ERREUR".mysqli_error($con));
            }
            else{
                echo "<script>alert('Ajout effectué avec succès');</script>";
                echo "<h1>Ajout effectué avec succès</h1> <br> <a href='index.html' class='link'>Retourner à l'Acceuil</a>";
            }
            ?>
        </div>
    </div>
    <script>
        $(window).on('load',function(){
            $(".loader").fadeOut(1000);
            $(".main").fadeIn(1000);

        });
    </script>
    <script src="main.js"></script>
</body>
</html>