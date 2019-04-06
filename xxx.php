<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


 <select class="lineahazteVoluntarioFecha" name="diaFecha" id="diaFecha">
                        <option value="">Día</option>
                       <?php
                            for($i=1;$i<=31;$i++):

                               ?> <option value="<?php echo $i ?> "> <?php echo $i ?> </option>
     <?php
     endfor;
     ?>
</select>


 <select class="lineahazteVoluntarioFecha" name="diaAnyo" id="diaAnyo">
     <option value="">Año</option>
 <?php

    $anyoActual=date("Y",time());
    $anyoMin=$anyoActual-18;

    for($j=$anyoMin;$j>=diaAnyo;$j--)
    {
        ?> <option value="<?php echo $j ?> "> <?php echo $j ?> </option>
        <?php
    }
    ?>
    </select>

</body>
</html>