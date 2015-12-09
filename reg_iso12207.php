<?php

    // // var_dump($_POST);
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbName = "adoo";
    //
    // // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    //
    // // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $json = json_encode($_POST);
    // echo $json;
    // echo json_encode($_POST);
    echo nl2br("\n");
    $sql = "INSERT INTO t2 (proceso) VALUES ('".$json."')";

    if ($conn->query($sql) === TRUE) {
        echo "
            <script language='javascript'>
                alert('Registro exitoso');
                window.location = 'iso_12207.html';
            </script>";
        //header('Location: iso_12207.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // echo "Connected successfully\n";

    // var_dump($_POST);
    // $lista = array();
    // array_push($lista, "nombre", $_POST["proceso"]);
    // array_push($lista, "id", $_POST["p_id"]);
    // foreach ($_POST as $key => $value) {
        // if ($key == "proceso") {
            // array_push($lista, $key, $value);
        // }

        // echo "key >> " + $key + "\n";
        // echo $key, "\n";
    // }
    // var_dump($lista);
    // echo nl2br("\n");
    // print_r(json_encode($lista));
    // print_r(json_decode(json_encode($_POST)));
    $conn->close();
?>


<!-- array(15) { ["proceso"]=> string(10) "un proceso" ["p_id"]=> string(3) "123" ["nota_num_0"]=> string(12) "nota proceso" ["proposito_0"]=> string(17) "proposito proceso" ["resultado_num_0"]=> string(20) "resultado esperaod 1" ["resultado_num_1"]=> string(18) "resultado espera 2" ["act_0"]=> string(7) "una act" ["tarea_0_act_0"]=> string(11) "tarea act 1" ["nota_tarea_0"]=> string(18) "nota tarea 1 act 1" ["opcion_0"]=> string(20) "opcion tarea 1 act 1" ["tarea_1_0"]=> string(13) "tarea 2 act 1" ["act_1"]=> string(5) "act 2" ["tarea_2_1"]=> string(13) "tarea 1 act 2" ["tarea_3_1"]=> string(13) "tarea 1 act 2" ["opcion_1"]=> string(22) "opcion 1 tarea 2 act 2" } -->
