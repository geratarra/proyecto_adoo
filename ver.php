<?php
    include("base.php");
    include("conexion.php");
    $sql = "select * from t2";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $lista = array();
        while ($row = $result->fetch_assoc()) {
            array_push($lista, json_decode($row["proceso"], true));
        }

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $proceso = NULL;
    foreach($lista as $key => $value) {
        if ($value[proceso] == $_GET["nombre"]) {
            $proceso = $lista[$key];
        }
    }

    $proceso_json = array();
    if ($proceso) {
        $proceso_json += array("proceso" => $proceso["proceso"]);
        $proceso_json += array("id" => $proceso["p_id"]);
        $proceso_json += array("proposito" => $proceso["proposito_0"]);
        $proceso_json += array("actividades" => array());

        $resultado = array();
        $tareas = array();
        foreach ($proceso as $key => $value) {
            // echo "Key=" . $key . ", Value=" . $value;
            // echo "<br>";
            if (strpos($key,'resultado') !== false) {
                // if (array_key_exists('resultado', $proceso_json)) {
                //     echo "entre";
                //     echo $value;
                //     array_push($proceso_json['resultado'], $value);
                //     // $proceso_json["resultado"] += $value;
                //
                // } else {
                //     $proceso_json += array("resultado" => $value);
                // }
                array_push($resultado, $value);
            }
            if ($key[0] === 'a') {
                // echo array_search($key, array_keys($proceso));
                // print_r(array_slice($proceso, array_search($key, $proceso)));
                $nuevo = array_slice($proceso, array_search($key, array_keys($proceso)) +1);
                foreach ($nuevo as $key_tarea => $value_tarea) {
                    if ($key_tarea !== 'a'){
                        // array_push($tareas, array($key_tarea, $value_tarea));
                        $tareas[$key_tarea] = $value_tarea;
                    }
                }
                // $proceso_json["actividades"] += array("actividad" => array($value, $tareas));
                // array_push($proceso_json["actividades"], array($value, $tareas));
                $proceso_json["actividades"][$value] = $tareas;
                $tareas = array();
                // echo "<br>";
                // print_r($nuevo);
            }
        }
        echo "<body>";
        echo "<div class=\"container\">";
        $proceso_json += array("resultado" => $resultado);
        // $proceso_json += array("actividad" => $tareas);
        // array_push($proceso_json, $resultado);
        // echo "<br>nuevooooo<br>";
        // print_r($tareas);
        echo "<br><br>";
        echo "Proceso jason:<br>";
        print_r($proceso_json);
        echo "
            <div class=\"page-header\">
                <h1>".$proceso_json["proceso"]."</h1>
            </div>";
        echo "
        <ul class=\"list-group\">
            <li class=\"list-group-item\">
                <h3>ID</h3>
                <p>".$proceso_json[id]."</p>
            </li>
            <li class=\"list-group-item\">
                <h3>Proposito</h3>
                <p>".$proceso_json[proposito]."</p>
            </li>";
        echo "
            <li class=\"list-group-item\">
                <h3>Resultados esperados</h3>";
        foreach($proceso_json[resultado] as $key_resultado => $value_resultado) {
            echo "<p>".$key_resultado.": ".$value_resultado."</p><br>";
        }
        echo "</li>";

        echo "<li class=\"list-group-item\">
                <h3>Actividades</h3>";

        echo "</li>";
        echo "</ul>";
    }

    echo "<br>";
    // print_r($proceso);
    // echo $_GET["nombre"];
    echo "</div>";
    echo "</body>";
    echo "</html>";
?>
