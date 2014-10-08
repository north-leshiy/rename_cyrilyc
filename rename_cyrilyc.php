<?

$filename = $_SERVER['argv']['1'];
$n        = '';
$last     = '';

if ( strpos($filename, '#U') ) {
	$end       = '.'.end(explode('.', $filename));
	$name_only = str_replace($end, '', $filename);
	$ar        = explode('#U',$name_only);

	if (strlen($ar[count($ar)-1]) > 4) {
		$last = substr($ar[count($ar)-1], 4);
		$ar[count($ar)-1] = substr($ar[count($ar)-1], 0, 4);
	}

	for($i=1;$i<count($ar);++$i){
		$n.='&#'.base_convert($ar[$i],16,10).';';
	}
	$res = html_entity_decode($n, ENT_NOQUOTES,'UTF-8').$last.$end;

	// echo $filename .' -> '. $ar['0'].$res ."\n";
	echo $name_only .' -> '. $res ."\n";
	copy($filename, $ar['0'].$res);
}

?>
