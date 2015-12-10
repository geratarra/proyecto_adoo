<?php
    include("base.php");
    include("jsonificador.php");

    $proceso = dame_proceso($_GET["nombre"]);
    $proceso_json = dame_proceso_json($_GET["nombre"]);

    echo "<body><div class=\"container\">";
    if ($proceso["formato"] === "iso_12207") {
        print_r($proceso_json);

        echo "
            <div class=\"page-header\">
                <h3>
                    ".$proceso_json["id"]." ".$proceso_json["proceso"]."
                </h3>
            </div>";

        echo "<div class=\"list-group\">
                <li class=\"list-group-item\">
                    <h4>Notas</h4>";
        foreach($proceso_json["notas_proceso"] as $key => $notas) {
            echo "<h5>".$notas."</h5>";
        }
        echo "</li>";

        echo "<div class=\"list-group\">
                <li class=\"list-group-item\">
                    <h4>".$proceso_json["id"].".1 "."Proposito</h4>
                    <h5>".$proceso_json["proposito"]."</h5>
                </li>
            ";
        echo "  <li class=\"list-group-item\">
                    <h4>".$proceso_json["id"].".2 "."Resultados</h4>";

        foreach($proceso_json["resultados"] as $key => $resultado) {
            echo "<h4>".$key.") ".$resultado."</h4>";
        }
        echo "</li>";
        echo "<li class=\"list-group-item\">
                <h4>".$proceso_json["id"].".3 "."Actividades</h4>";
        foreach ($proceso_json["actividades"] as $key_act => $value_act) {
            // key_act es cada actividad (act_0)
            // print_r($value_act[1]);
            $cont = 1;
            foreach ($value_act as $key => $value) {
                // $value act es el array de la actividad
                // key es la key de lo que tiene cada actividad
                if ($key === 0) {
                    echo "<h5>".$proceso_json["id"].".3.".key($proceso_json["actividades"][$key_act])." ".$value_act[0]."</h5>";
                } else {
                    foreach($value as $key_tarea => $value_tarea) {
                        if ($key_tarea === 0) {
                            echo $proceso_json["id"].".3.".key($proceso_json["actividades"][$key_act]).".".$cont." ";
                            echo $value_tarea."<br>";
                        } else {
                            foreach($value_tarea as $key_nota_opcion => $value_nota_opcion) {
                                if ($key_tarea === "notas") {
                                    echo "Notas<br>";
                                    echo "<p>".$value_nota_opcion."</p>";
                                } else {
                                    echo "Opciones<br>";
                                    echo "<p>".$value_nota_opcion."</p>";
                                }
                            }
                        }
                    }

                    // $cont = 1;
                    // foreach($value as $x => $y) {
                    //     // entre aqui porque y es un array de toda la tarea
                    //     if ($x === 0) {
                    //         echo $proceso_json["id"].".3.".key($proceso_json["actividades"][$key_act]).".".$cont;
                    //         echo $y."<br>";
                    //         // echo $proceso_json["id"].".3.".key($proceso_json["actividades"][$key_act]).".";
                    //     } else {
                    //         if
                    //         echo "....".$x."....";
                    //         if ($x === "notas") {
                    //             echo "<br>Notas:";
                    //             foreach($y as $key_nota => $value_nota) {
                    //                 echo $value_nota;
                    //             }
                    //         }
                    //         if ($x === "opciones") {
                    //             echo "<br>Opciones:";
                    //             foreach($y as $key_nota => $value_nota) {
                    //                 echo $value_nota;
                    //             }
                    //         }
                    //         // break;
                    //     }
                    //     $cont++;
                    // }
                    $cont++;
                }

                // echo "aquiiii ".$value;
                // echo "<h5>".$proceso_json["id"].".3.".key($proceso_json["actividades"][$key_act]).".".key(proceso_json["actividades"])."</h5>";
            }
        }
        echo "</li>";
        echo "</div>";

    }


    echo "<br>";
    // print_r($proceso_json);
    // echo $_GET["nombre"];
    echo "</div>";
    echo "</body>";
    echo "</html>";
?>
