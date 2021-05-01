<?php 
	include("models/connect.php");
	$dbsql = new ConnectDB();
	$values = $dbsql->list("empresas");
	while ($row = pg_fetch_array($values)) {
		echo $row["cnpj"];
	}
?>
