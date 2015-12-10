<?php
    include("conexion.php");
    include("base.php");
?>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Lista de procesos</h1>
        </div>
        <table class="table table-striped">
            <?php
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
                echo "<table class=\"table table-bordered\"><tr><td>Proceso</td><td></td><td></td><td></td><tr>";
                echo nl2br("\n");
                foreach($lista as $x => $x_value) {
                    echo "<tr><td>".$x_value[proceso]."</td><td>
                        <a href=\"ver.php?nombre=".$x_value[proceso]."\">
                            <button type=\"submit\" class=\"btn btn-default\">
                                Ver
                            </button>
                        </a>
                        </td>
                        <td>
                            <button type=\"button\" class=\"btn btn-default\">
                                Modificar
                            </button></td>
                        </td>
                        <td>
                            <button type=\"submit\" class=\"btn btn-default\">
                                Eliminar
                            </button></td>
                        </td></tr>";
                }                //echo $lista[0][proceso];
                //var_dump($lista[0][0]);
                //print_r($lista[0]);
                //echo $lista['proceso'];
            ?>
        </table>
    </div>
</body>
</html>
