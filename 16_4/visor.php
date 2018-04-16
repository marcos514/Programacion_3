<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <center>
    <table>
        <?php
            $archivo=fopen("nombres/fotos.txt","r");
            while(!feof($archivo))
            {
                $linea=trim(fgets($archivo));
                if($linea != "")
                {
                    echo "<tr><td><img src='fotos/".$linea."' width='100px' heigth='100px'/><td><a href='zoom.php?ruta=".$linea."'>VER</a></td> </td>";
                } 
            }
            fclose($archivo);
        ?>
        
    </table>    
</body>
</html>