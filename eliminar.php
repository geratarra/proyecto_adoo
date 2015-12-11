<?php
    include("conexion.php");
    // $sql = "select * from t2 where proceso like '%".$_GET["nombre"]."%'";
    // echo $sql;
    // $result = $conn->query($sql);
    // $la_buena = "delete from t2 where proceso = ".$result;
    $la_buena = "delete from t2 where proceso like '%".$_GET["nombre"]."%'";

    echo "<br>la buena >> ".$la_buena;
    if ($conn->query($la_buena) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

?>
