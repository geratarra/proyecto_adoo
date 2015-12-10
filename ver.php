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
        echo "<div class=\"list-group\">
                <li class=\"list-group-item\">
                    <h4>".$proceso_json["id"].".3 "."Actividades</h4>";
        foreach ($proceso_json["actividades"] as $key_act => $value_act) {
            echo "<h5>"
        }
        echo "</div>";

    }


    echo "<br>";
    // print_r($proceso_json);
    // echo $_GET["nombre"];
    echo "</div>";
    echo "</body>";
    echo "</html>";
?>
