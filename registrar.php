<?php
    include "dbconn.php";

    $name=$_POST['name'];
    $email=$_POST['email'];

    date_default_timezone_set("america/argentina/buenos_aires");
    $fechareg=date("d/m/y/H:i");

    $consulta="insert into datos(nombre,email,fechareg)values('$name','$email','$fechareg')";

    $resultado=mysqli_query($conex,$consulta);

    if($resultado){
        echo "te inscribiste";
        echo "<br>";
        echo "<a href='./index.php'>Volver</a>";
    }else{
        echo "error";
    }
?>