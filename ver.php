<?php
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

        $resultado = array();
        $tareas = array();
        foreach ($proceso as $key => $value) {
            echo "Key=" . $key . ", Value=" . $value;
            echo "<br>";
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
                echo "<br>siiii<br>";
                echo $proceso[$key];
                echo "<br>";
                echo array_search($key, $proceso);
                print_r(array_slice($proceso, array_search($key, $proceso)));
                $nuevo = array_slice($proceso, array_search($key, $proceso));
                // foreach ( as $key_tarea => $value_tarea) {
                //     if ($key_tarea !== 'a'){
                //         array_push($tareas, $value_tarea);
                //     }
                // }
                // echo "<br>";
                // print_r($nuevo);
            }
        }
        $proceso_json += array("resultado" => $resultado);
        // $proceso_json += array("actividad" => $tareas);
        // array_push($proceso_json, $resultado);
        echo "<br>nuevooooo<br>";
        // print_r($nuevo);
        echo "<br><br>";
        // print_r($proceso_json);
    }

    echo "<br>";
    print_r($proceso);
    // echo $_GET["nombre"];
?>
