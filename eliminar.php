<?php
    include("conexion.php");

    $la_buena = "delete from t2 where proceso like '%".$_GET["nombre"]."%'";
    if ($conn->query($la_buena) === TRUE) {
        echo "
            <script language=\"javascript\">
                alert(\"Proceso borrado exitosamente\");
                window.location = 'lista.php';
            </script>
            ";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

?>
