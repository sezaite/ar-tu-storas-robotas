<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['boxes'])){
        $boxuKiekis = count($_POST['boxes']);
        $sum = 0;
        for($i = 0; $i < $boxuKiekis; $i++){
            $sum += $_POST['boxes'][$i];  
        }    
    }
    $_SESSION['sum'] = $sum;
    $_SESSION['boxuKiekis'] = $boxuKiekis;
    header('Location: http://localhost/bit/ar-tu-storas-robotas/');
    die;
}
if(isset($_SESSION['sum'])){
    $_SESSION['visi'] = 'Tam storam robotui viskas skanu';
    $_SESSION['netiesa'] = 'Neatpažįstu tavęs. Bet bandyk kartą, jei nori:';
    $_SESSION['tiesa'] = 'Labas, Martyna';
    $_SESSION['mazai'] = 'nu kas čia per išrankumas';
    if($_SESSION['boxuKiekis'] > 0 && $_SESSION['boxuKiekis'] < 4){
        $h1 = $_SESSION['mazai'];
    } else if($_SESSION['sum'] === 22 && $_SESSION['boxuKiekis'] === 5){
        $h1 = $_SESSION['tiesa'];
    } else if ($_SESSION['sum'] === 45 && $_SESSION['boxuKiekis'] === 9){
        $h1 = $_SESSION['visi'];
    } else {
        $h1 = $_SESSION['netiesa'];
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
<h1><?= $h1 ?? 'Išrink visus skanius dalykėlius:' ?> </h1> 
</div>
<form action="" method = "post">
<?php
for($i = 1; $i < 10; $i++){
$HTML[] = "<input type='checkbox' name='boxes[]' value='$i' id='$i'/><label for='$i'><img src='./img/$i.jpg'/></label>";
}
shuffle($HTML);
echo implode('', $HTML);
?>
<button type="submit" class="btn">Pateikti</button>
</form>  
</body>
</html>