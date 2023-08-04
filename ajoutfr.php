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
            $dtf=$_POST['dtf'];
            $fra=$_POST['fra'];
            $la=$_POST['la'];
            $req="INSERT INTO `frais`(`nbvoit`, `dateach`, `frais`, `titref`) VALUES ('$ser','$dtf',$fra,'$la');";
            $res=mysqli_query($con,$req);
            if(mysqli_affected_rows($con)==-1){
                echo "<script>alert(". mysqli_error() .");</script>";
                die("ERREUR".mysqli_error($con));
            }
            else{
                $req2="select * from 'frais' where nbvoit='$ser';";
                $res2=mysqli_query($con,$req2);
                $fr=0;
                while ($r = mysqli_fetch_array($res2)) {
                    $fr+=$r['frais'];
                }
                echo "<h1>Le frais totale pour la voiture:".$ser." est". $fr." </h1> ";
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