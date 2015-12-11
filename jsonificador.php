<?php

    function dame_proceso($nombre) {
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
            if ($value['proceso'] == $nombre) {
                $proceso = $lista[$key];
            }
        }
        return $proceso;
    }

    function dame_proceso_json($nombre) {

        $proceso = dame_proceso($nombre);
        if ($proceso) {
            if ($proceso['formato'] === "iso_12207"){
                $proceso_json = array();


                $proceso_json += array("proceso" => $proceso["proceso"]);
                $proceso_json += array("id" => $proceso["p_id"]);
                $proceso_json += array("notas_proceso" => array());
                $proceso_json += array("proposito" => $proceso["proposito_0"]);
                $proceso_json += array("resultados" => array());
                $proceso_json += array("actividades" => array());

                foreach ($proceso as $key => $value) {
                    if ($key[0] === "a") {
                        $proceso_json["actividades"][$key] = array();
                        array_push($proceso_json["actividades"][$key], $value);
                        // $proceso_json["actividades"][$key]["tareas"] = array();
                    }
                    if ($key[0] === "t") {
                        $proceso_json["actividades"][endKey($proceso_json["actividades"])][$key] = array();
                        array_push($proceso_json["actividades"][endKey($proceso_json["actividades"])][$key], $value);
                        $proceso_json["actividades"][endKey($proceso_json["actividades"])][$key]["notas"] = array();
                        $proceso_json["actividades"][endKey($proceso_json["actividades"])][$key]["opciones"] = array();
                    }
                    if (strpos($key, "nota_tarea_") !== false) {
                        $f = endKey($proceso_json["actividades"]);
                        $f2 = endKey($proceso_json["actividades"][$f]);
                        array_push($proceso_json["actividades"][$f][$f2]["notas"], $value);
                    }
                    if (strpos($key, "nota_num") !== false) {
                        array_push($proceso_json["notas_proceso"], $value);
                    }
                    if (strpos($key, "resultado") !== false) {
                        array_push($proceso_json["resultados"], $value);
                    }
                    if (strpos($key, "opcion") !== false) {
                        $f = endKey($proceso_json["actividades"]);
                        $f2 = endKey($proceso_json["actividades"][$f]);
                        array_push($proceso_json["actividades"][$f][$f2]["opciones"], $value);
                    }

                }

            }
            if ($proceso["formato"] === "libro") {
                $proceso_json = array();
                $proceso_json+= array("proceso" => $proceso["proceso"]);
                $proceso_json+= array("id" => $proceso["p_id"]);
                $proceso_json+= array("objetivo_general" => $proceso["p_objetivo"]);
                $proceso_json+= array("objetivos_especificios" => array());
                $proceso_json+= array("actividades" => array());
                $proceso_json+= array("roles" => array());
                $proceso_json+= array("productos" => array());

                foreach($proceso as $key => $value) {
                    if (strpos($key, "obj_") !== false) {
                        array_push($proceso_json["objetivos_especificios"], $value);
                    }
                    if (strpos($key, "act_") !== false) {
                        array_push($proceso_json["actividades"], array());

                        $proceso_json["actividades"][endKey($proceso_json["actividades"])] += array("descripcion" => $value);
                        $proceso_json["actividades"][endKey($proceso_json["actividades"])] += array("metodos" => array());
                    }
                    if (strpos($key, "met") !== false) {
                        array_push($proceso_json["actividades"][endKey($proceso_json["actividades"])]["metodos"], $value);
                    }

                    if (strpos($key, "rol_desc") !== false) {
                        array_push($proceso_json["roles"], array());
                        $proceso_json["roles"][endKey($proceso_json["roles"])] += array("rol" => $value);
                    }
                    if (strpos($key, "rol_nombre") !== false) {
                        $proceso_json["roles"][endKey($proceso_json["roles"])] += array("rol_nombre" => $value);
                    }
                    if (strpos($key, "prod") !== false) {
                        array_push($proceso_json["productos"], $value);
                    }

                }
                $proceso_json["objetivos_especificios"] = array_reverse($proceso_json["objetivos_especificios"]);
                $proceso_json["actividades"] = array_reverse($proceso_json["actividades"]);
                $proceso_json["roles"] = array_reverse($proceso_json["roles"]);
                $proceso_json["productos"] = array_reverse($proceso_json["productos"]);

            }

            return $proceso_json;
        }


    }



    function endKey($array){
        end($array);
        $end_key = key($array);
        reset($array);
        return $end_key;
    }


?>
