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
                <li><a href="index.html" class="link">Acceuil</a> </li>
                <li><a href="achatvoit.html" class="link">Achat d'une voiture</a> </li>
                <li><a href="#" class="link">Liste des voitures</a></li>
                <li><a href="#" class="link">Statistiques</a> </li>
                <li><a href="ajoutf.php" class="link">Ajout des frais</a> </li>
            </ul>
        </div>
        <div class="form">
            <form action="ajoutv.php" method="post">
                <?php
                $req = "SELECT * FROM `voiture`";
                $res = mysqli_query($con, $req) or die(mysqli_error($con));
                if (!$res) {
                    die("Erreur SQL" . mysqli_error($con));
                }
                ?>
                serie : <select name="ser" id="ser">
                    <option>choisir un serie</option>
                    <?php
                    while ($r = mysqli_fetch_array($res)) {
                        if($r['vendu']=="d"){
                            echo "<option value=".$r['serie'].">" . $r['serie'] . "</option>";
                        }
                    }
                    ?>
                </select> <br>
                Date d'achat: <input type="date" name="dta" id="dta" placeholder="date achat">
                <br> Prix d'achat: <input type="number" name="pra" id="pra" placeholder="prix achat"><br>
                kilometrage achat:  <input type="number" name="klma" id="klma" placeholder="kilometrage">
                Date de vendre: <input type="date" name="dtv" id="dtv" placeholder="date vendre">
                <br> Prix de vente: <input type="number" name="prv" id="prv" placeholder="prix vendre"><br>
                kilometrage vente:  <input type="number" name="klmv" id="klmv" placeholder="kilometrage apres util"><br>
                <div class="but"><button type="submit">Submit</button><button type="reset">Reset</button></div>
            </form>
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