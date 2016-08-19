<?php 
	include ("alphabet.php");
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

	$inp_source = $_POST['sourceText'];
	$inp_shift = $_POST['shift'];
	class Encrypt {

		var $source;
		var $shift;
		var $result;
		public function __construct($inp_source, $inp_shift)
		{
			$this -> source = $inp_source;
			$this -> shift = $inp_shift % 26;
			$this -> result = '';
		}

		function Process($lowera, $lower1, $uppera, $upper1, $counta)
		{
			$str = $this -> source;
			while (strlen($str) > 0) {
				if (ctype_alpha($str{0})) {
					if (ctype_upper($str{0})) {
						$this -> result = $this -> result.$upper1[($uppera[$str{0}] + $this -> shift) % 26];
						$counta[$lower1[$uppera[$str{0}]]]++;
						//echo $counta[$lower1[$uppera[$str{0}]]]."\n";
					} else {
						$this -> result = $this -> result.$lower1[($lowera[$str{0}] + $this -> shift) % 26];
						$counta[$str{0}]++;
						//echo $counta[$str{0}]."\n";
					}
				} else {
					$this -> result = $this -> result.$str{0};
				}
				$str = mb_substr($str, 1);
			}
		}

		function ShowResult()
		{
			return $this -> result;
		}
	}

	$obj = new Encrypt("$inp_source", "$inp_shift");
	$obj -> Process($lowera, $lower1, $uppera, $upper1, $counta);

	echo $obj -> ShowResult();
 ?>