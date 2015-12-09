<!-- <?php include("conexion.php");?> -->
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>RARP - Lista de procesos</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <!-- Latest compiled and minified CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
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
                        <button type=\"button\" class=\"btn btn-default\">
                            Ver
                        </button></td>
                        <td>
                            <button type=\"button\" class=\"btn btn-default\">
                                Modificar
                            </button></td>
                        </td>
                        <td>
                            <button type=\"button\" class=\"btn btn-default\">
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
