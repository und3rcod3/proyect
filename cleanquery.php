<?php
function strClean($strCadena){
		$string = preg_replace(['/\s+/','/^\s|\s$/'],[' '],'', $strCadena);
		$string = trim($string); //Elimina espacios en blanco al inicio y al final
		$string = stripcslashes($string); //Elimina las \ invertidas
		
	`	$replace = [
			"<script>",
			"</script>",
			"<script src>",
			"<script type=>",
			"SELECT FROM *",
			"DELETE FROM",
			"UNION",
			"INSERT INTO",
			"SELECT COUNT(*) FROM",
			"DROP TABLE",
			"TRUNCATE TABLE",
			"SHOW TABLES",
			"SHOW DATABASES",
			"OR '1'='1",
			'OR "1"="1"',
			'OR ´1´=´1´',
			"is NULL; --",
			"is NULL; --",
			"LIKE'",
			'LIKE "',
			"LIKE ´",
			"OR 'a'='a",
			'OR "a"="a',
			"OR ´a´=´a",
			"OR ´a´=´a",
			"<?php",
			"?>",
			"--",
			"^",
			"[",
			"]",
			"==",
			";",
			"::"
		];

		foreach($replace as $rep)
		{
			$string = str_replace($rep,"",$string);
		}
		return $string;
?>
