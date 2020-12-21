<?php
include_once"../../includes/mssql_conex.php";
// Crear Tabla de Premios por ItemID, Restado Y o Sumado de AP por Ruleta
$premios=mssql_query('
SELECT a.ItemName, b.ItemID
FROM  PS_GameDefs.dbo.Items a
INNER JOIN PS_GameLog.dbo.ruleta b
on b.ItemID = a.ItemID'); 
WHILE ($Items  = mssql_fetch_array ($premios)){
$print = $Items['0']."$$";
// echo $print;
echo "</textarea>";
}
?>