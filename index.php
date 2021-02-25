<?php

if(!empty($_POST)){
    for($i = 1; $i <= count($_POST); $i++){
        _d($_POST);
        _d($_POST[$i]);
        _d($_POST["$i"]);
    
    }
header('Location : http://localhost/bit/ar-tu-storas-robotas/index.php');
die;
    
}

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

<form action="index.php" method = "POST">
<?php
$HTML = "";
for($i = 1; $i < 10; $i++){
$HTML .= "<input type='checkbox' name='$i' value='$i' id='$i'/><label for='$i'><img src='./img/$i.jpg'/></label>";
}
echo $HTML;
?>
<button type="submit">Pateikti</button>
</form>
    
</body>
</html>