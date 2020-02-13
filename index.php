<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Générateur de mot de passe</h1>
    <h2>Sélectionner les options de votre mot de passe sécurisé</h2>
    <table>
    <form action="index.php" method="POST">
            <tr>
                <td>
                    <input type="checkbox" name="chiffres"><label for="chiffres"> Avec des chiffres [0 1 2 3 4 5 6 7 8 9]</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="minuscules"><label for="minuscules"> Avec des lettres minuscules [a b c...x y z]</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="majuscules"><label for="majuscules"> Avec des lettres majuscules [A B C...X Y Z]</label>
                </td>
            </tr>

            <tr>
                <td>
                    <select name="nbCaracteres">
                    <?php
                        for($valeurNbCaracteres = 1; $valeurNbCaracteres <= 32; $valeurNbCaracteres++)
                        {
                        echo "<option value=".$valeurNbCaracteres.">".$valeurNbCaracteres."</option>";
                        }
                        ?>
                            </select>
                                <label for="nbCaracteres">Nombre de caractères dans le mot de passe</label>
                </td>
            </tr>
            <tr>
                <td>

                    <select name="nbMotDePasse">
                    <?php
                        for($valeurNbMdp = 1; $valeurNbMdp <= 10; $valeurNbMdp++)
                        {
                        echo "<option value=".$valeurNbMdp.">".$valeurNbMdp."</option>";
                        }
                        ?>
                    </select>
                        <label for="nbMotDePasse">Nombre de mots de passe à générer</label>
                </td>
            </tr>
            <tr>
                <td>
                        <input type="submit" name="submit" id="submit" value="Créer le mot de passe">
                </td>
            </tr>
        </form>
    </table>
    <?php

        $choix_chiffres = $_POST['chiffres'];
        $lettres_minuscules = $_POST['minuscules'];
        $lettres_majuscules = $_POST['majuscules'];
        $carac_speciaux = $_POST['caracteresSpeciaux'];
        $carac_similaires = $_POST['caracteresSimilaires'];
        $nb_caract = $_POST['nbCaracteres'];
        $nb_mdp = $_POST['nbMotDePasse'];

        $chiffres = array("0","1","2","3","4","5","6","7","8","9");
        $minuscules = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
        $majuscules = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"); 
        $caracteresSpeciaux = array(";", ",", ".", "/", ":", "|", "(", ")", "~", "#", "{", "}", "-", "=", "$", "*", "!", "?", "€");


        $carac_utilisés = array();


        if(isset($choix_chiffres))
        {
            for($i = 0; $i < count($chiffres) ; $i++)
            {
                $carac_utilisés[] = $chiffres[$i];
            }
        }
        if(isset($lettres_minuscules))
        {
            for($i = 0; $i < count($minuscules); $i++)
            {
                $carac_utilisés[] = $minuscules[$i];
            }
        }
        if(isset($lettres_majuscules))
        {
            for($i = 0; $i < count($majuscules); $i++)
            {
                $carac_utilisés[] = $majuscules[$i];
            }
        }
        if(isset($carac_speciaux))
        {
            for($i = 0; $i < count($caracteresSpeciaux); $i++)
            {
                $carac_utilisés[] = $caracteresSpeciaux[$i];
            }
        }

        if(!isset($choix_chiffres) && !isset($lettres_minuscules) && !isset($lettres_majuscules) && !isset($carac_speciaux))
        {
            echo "<p class='achtung'>Veuillez selectionner au moins une option</p>";
        }

            for($i =1; $i <= $nb_mdp; $i++)
            {
                echo"<div class='demo'><p class='byline'>";
                for($j = 1; $j <= $nb_caract; $j++)
                {
                    $longueur = rand(0,count($carac_utilisés));
                    $password = $carac_utilisés[$longueur];
                    echo $password;
                }
                echo "</p></div>";
            }

    ?>
</body>
</html>