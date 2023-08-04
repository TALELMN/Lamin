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
                <li><a href="venteform.php" class="link">Vente d'une voiture</a> </li>
                <li><a href="#" class="link">Liste des voitures</a></li>
                <li><a href="#" class="link">Statistiques</a> </li>
            </ul>
        </div>
        <div class="form">
            <form action="ajoutfr.php" method="post">
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
                        echo "<option>" . $r['serie'] . "</option>";
                    }
                    ?>
                Date: <input type="date" name="dtf" id="dtf">
                <br>
                frais: <input type="number" name="fra" id="fra">
                </select> <br>
                <textarea name="la" id="la" cols="30" rows="10" placeholder="Lister les objet achetés"></textarea>
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