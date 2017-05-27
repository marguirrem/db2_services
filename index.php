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

$stid = oci_parse($conn, 'select table_name from user_tables');
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

