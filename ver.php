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

    if ($proceso["formato"] === "iso_29110"){
      print_r($proceso_json);
      //Proceso y id
      echo "
          <div class=\"page-header\">
              <h3>
                  ".$proceso_json["id"]." ".$proceso_json["proceso"]."
              </h3>
          </div></li>";

      echo "<div class=\"list-group\">
              <li class=\"list-group-item\">
                  <h4>".$proceso_json["id"].".1 "."Proposito</h4>
                  <h5>".$proceso_json["proposito"]."</h5>
              </li>";
      //Aqui se imprimen los objetivos
      echo "  <li class=\"list-group-item\">
                  <h4>".$proceso_json["id"].".2 "."Objetivos</h4>";
      $proceso_json["objetivos"] = array_reverse($proceso_json["objetivos"]);
      foreach($proceso_json["objetivos"] as $key => $objetivo) {
          echo "<h5>".chr(65 + $key).") ".$objetivo."</h5>";
      }
      echo "</li>";
      //Aqui se imprimen los roles.
      echo "<li class=\"list-group-item\">
            <h4>".$proceso_json["id"].".3 Rol</h4>
            <table class=\"table table-striped\">
              <thead>
                <tr>
                  <th>Rol</th>
                  <th>Abreviación</th>
                </tr>
              </thead>
              <tbody>";
      $proceso_json["roles"] = array_reverse($proceso_json["roles"]);
      foreach($proceso_json["roles"] as $key_rol => $value_rol){
        echo "<tr>
                <td>".$value_rol[0]."</td>
                <td>".$value_rol[1]."</td>
              </tr>";
      }
      echo "</tbody>
            </table>
            </li>";

      //Aqui se imprimen los productos de entrada.
      echo "<li class=\"list-group-item\">
            <h4>".$proceso_json["id"].".4 Productos de entrada</h4>
            <table class=\"table table-striped\">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Fuente</th>
                </tr>
              </thead>
              <tbody>";
      $proceso_json["productos_entrada"] = array_reverse($proceso_json["productos_entrada"]);
      foreach($proceso_json["productos_entrada"] as $key_pent => $value_pent){
        echo "<tr>
                <td>".$value_pent[0]."</td>
                <td>".$value_pent[1]."</td>
              </tr>";
      }
      echo "</tbody>
            </table>
            </li>";

      //Aqui se imprimen los productos de salida.
      echo "<li class=\"list-group-item\">
            <h4>".$proceso_json["id"].".5 Productos de salida</h4>
            <table class=\"table table-striped\">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Destino</th>
                </tr>
              </thead>
              <tbody>";
      $proceso_json["productos_salida"] = array_reverse($proceso_json["productos_salida"]);
      foreach($proceso_json["productos_salida"] as $key_psal => $value_psal){
        echo "<tr>
                <td>".$value_psal[0]."</td>
                <td>".$value_psal[1]."</td>
              </tr>";
      }
      echo "</tbody>
            </table>
            </li>";

      //Aqui se imprimen los productos internos.
      echo "<li class=\"list-group-item\">
            <h4>".$proceso_json["id"].".6 Productos internos</h4>
            <table class=\"table table-striped\">
              <thead>
                <tr>
                  <th>Nombre</th>
                </tr>
              </thead>
              <tbody>";
      $proceso_json["productos_interno"] = array_reverse($proceso_json["productos_interno"]);
      foreach($proceso_json["productos_interno"] as $key_pint => $value_pint){
        echo "<tr>
                <td>".$value_pint."</td>
              </tr>";
      }
      echo "</tbody>
            </table>
            </li>";

      //Aqui se imprimen las actividades y tareas
      echo "<li class=\"list-group-item\">
              <h4>".$proceso_json["id"].".7 "."Actividades</h4>";
      $cont = 1;
      foreach ($proceso_json["actividades"] as $key_act => $value_act) {
          // key_act es cada actividad (act_0)
          // print_r($value_act[1]);

          foreach ($value_act as $key => $value) {
              // $value act es el array de la actividad
              // key es la key de lo que tiene cada actividad
              //print_r($value);
              if ($key === 0) {
                  echo "<h5>".$proceso_json["id"].".7.".$cont." ".$value_act[0]."</h5>";
                  echo "<table class=\"table table-striped\">
                          <thead>
                            <tr>
                              <th>Nombre de la tarea</th>
                              <th>Rol</th>
                              <th>Producto de entrada</th>
                              <th>Producto de salida</th>
                            </tr>
                          </thead>
                          <tbody>";
              } else {
                  echo "<tr>";
                  foreach($value as $key_tarea => $value_tarea) {
                    echo "<td>".$value_tarea."</td>";
                  }
                  echo "</tr>";
              }

          }
          echo "</tbody>
                </table>";
          $cont++;
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
