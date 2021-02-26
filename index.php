<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    _d($_POST);
    if (isset($_POST['boxes'])){
        $boxuKiekis = count($_POST['boxes']);
        $sum = 0;
        for($i = 0; $i < $boxuKiekis; $i++){
            $sum += $_POST['boxes'][$i];  
        }    
    }  else {
        echo 'nieko nepasirinkai, seneliumbai';
    }
    $_SESSION['sum'] = $sum;
    $_SESSION['boxuKiekis'] = $boxuKiekis;
    header('Location: http://localhost/bit/ar-tu-storas-robotas/');
    die;
}
if(isset($_SESSION['sum'])){
    if($_SESSION['sum'] === 22 && $_SESSION['boxuKiekis'] === 5){
        echo 'Labas, Martyna';
    } else if ($_SESSION['sum'] === 45 && $_SESSION['boxuKiekis'] === 9){
        echo 'Tam storam robotui viskas skanu';
    } else {
        echo 'nezinau, nezinau, nepazistu taves';
    }
}
session_destroy();

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robotu gaudykle</title>
    <link rel="stylesheet" href="style.css">    
</head>
<body>
<div>
<h1>Prašome pasirinkti tik skanius patiekalus:</h1> 
<img src="./img/main.jpg" alt="riesutu sviestas">
</div>
<form action="" method = "post">
<?php
$HTML = "";
for($i = 1; $i < 10; $i++){
$HTML .= "<input type='checkbox' name='boxes[]' value='$i' id='$i'/><label for='$i'><img src='./img/$i.jpg'/></label>";
}
echo $HTML;
?>
<button type="submit">Pateikti</button>
</form>
    
</body>
</html>