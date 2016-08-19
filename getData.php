<?php 
include ("alphabet.php");
$str = $_POST['resultText'];
$counta = array(
	"a" => "0",
	"b" => "0",
	"c" => "0",
	"d" => "0",
	"e" => "0",
	"f" => "0",
	"g" => "0",
	"h" => "0",
	"i" => "0",
	"j" => "0",
	"k" => "0",
	"l" => "0",
	"m" => "0",
	"n" => "0",
	"o" => "0",
	"p" => "0",
	"q" => "0",
	"r" => "0",
	"s" => "0",
	"t" => "0",
	"u" => "0",
	"v" => "0",
	"w" => "0",
	"x" => "0",
	"y" => "0",
	"z" => "0");

$col1=array();
$col1["id"]="";
$col1["label"]="Letter";
$col1["pattern"]="";
$col1["type"]="string";

$col2=array();
$col2["id"]="";
$col2["label"]="Count";
$col2["pattern"]="";
$col2["type"]="number";

$cols = array($col1,$col2);

$rows = array();
while (strlen($str) > 0) {
	if (ctype_alpha($str{0})) {
		if (ctype_upper($str{0})) {
			$counta[$lower1[$uppera[$str{0}]]]++;
		} else {

			$counta[$str{0}]++;
		}
	}	
	$str = mb_substr($str, 1);
}

$i=1;
while($i<26){
	$temp = array();
	// the following line will be used to slice the Pie chart
	$temp[] = array('v' => (string) $lower1[$i], 'f' => null); 

	// Values of each slice
	$temp[] = array('v' => (int) $counta[$lower1[$i]], 'f' => null);
	$rows[] = array('c' => $temp);
	$i++;
}
$temp = array();
// the following line will be used to slice the Pie chart
$temp[] = array('v' => (string) $lower1[0], 'f' => null); 

// Values of each slice
$temp[] = array('v' => (int) $counta[$lower1[0]], 'f' => null);
$rows[] = array('c' => $temp);
 
/*$table = array('cols' => $cols, 'rows' => $rows);
$jsonTable = json_encode($table);
echo $jsonTable;*/

$data=array("cols"=>$cols,"rows"=>$rows);
$json_data = json_encode($data);
echo $json_data;



//$string = file_get_contents("sampleData.json");
//echo $string;

?>