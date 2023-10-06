<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();

        $montantEuro=0;
        $tabHistorique =[];
        if(isset($_POST['submit'])){
            $montant=floatval($_POST['nbr_franc']);

            if($montant<0){
                echo "Le nombre doit etre positif";
            }else{
                $montantEuro=$montant/650;

                // Récupérez l'historique actuel s'il existe
                if (isset($_SESSION['tabHistorique'])) {
                    $tabHistorique = $_SESSION['tabHistorique'];
                }
                // Ajoutez la conversion à l'historique
                $tabHistorique[] = [
                    'franc' => $montant,
                    'euro' => $montantEuro
                ];

                // Enregistrez l'historique dans la session
                $_SESSION['tabHistorique'] = $tabHistorique;

                echo "L'Historique : ";
                print_r($tabHistorique);
        
            }
        }
    ?>
    <form action="" method = "POST">
        <label for="">Nombre en FRANC</label>
        <br>
        <br>
        <input type="text"  name="nbr_franc" id="" required>
        <br>
        <br>
        <button type="submit" name="submit">Convertir</button>
        <br>
        <br>
        <label for="">Nombre en EURO</label>
        <br>
        <br>
        <input type="text" name="nbr_euro" id=""  value=" <?php echo "$montantEuro"; ?>" readonly>
    </form>
</body>
</html>