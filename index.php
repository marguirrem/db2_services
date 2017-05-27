<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Conexion</title>
</head>
<body>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$conn = oci_connect('SYSTEM', 'oracle', 'localhost/orcl.localdomain');


$stid = oci_parse($conn, "INSERT INTO usuario (usuario_id,usuario_nombre,usuario_password) VALUES (2,'Josué','12345')");

oci_execute($stid); // La fila se consolida y es visible inmediatamente a otros usuarios

//$sql='select table_name from user_tables';
$sql1='select usuario_nombre,usuario_password from usuario';
$stid = oci_parse($conn, $sql1);
oci_execute($stid);

echo "<table>\n";
while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>".($item !== null ? htmlspecialchars($item, ENT_QUOTES) : "&nbsp;")."</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

?>

</body>
</html>

