<?php

// Conectar al servicio XE (es deicr, la base de datos) en la máquina "localhost"
$conn = oci_pconnect('hr', '12345', 'localhost/XE');
if ($conn) {

    $stid = oci_parse($conn, "select paquete.saludar('Doña juana') from Dual");
    oci_execute($stid);

    echo "<table border='1'>\n";
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_LOBS)) {
        echo "<tr>\n";
        foreach ($row as $item) {
            echo "    <td>" . $item . "</td>\n";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";
}
