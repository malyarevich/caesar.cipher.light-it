<?php 
	include ("alphabet.php");
	
	$inp_source = $_POST['sourceText'];
	$inp_shift = $_POST['shift'];
	class Descrypt {

		var $source;
		var $shift;
		var $result;
		var $five_best;
		public function __construct($inp_source, $inp_shift)
		{
			$this -> source = $inp_source;
			$this -> shift = $inp_shift % 26;
			$this -> result = '';
			$this -> five_best = array();
		}

		function Shifting($lowera, $lower1, $uppera, $upper1, $cur_shift)
		{
			$str = $this -> source;
			$shift_result = '';
			while (strlen($str) > 0) {
				if (ctype_alpha($str{0})) {
					if (ctype_upper($str{0})) {
						$shift_result = $shift_result.$upper1[($uppera[$str{0}] + (26 - $cur_shift)) % 26];
					} else {
						$shift_result = $shift_result.$lower1[($lowera[$str{0}] + (26 - $cur_shift)) % 26];
					}
				} else {
					$shift_result = $shift_result.$str{0};
				}
				$str = mb_substr($str, 1);
			}
			return $shift_result;
		}

		function Analizing($cur_result, $cur_shift, $cur_percent)
		{
			if (count($this -> five_best) < 5) {
				$new_element = array("percent" => $cur_percent, "shift" => $cur_shift, "result" => $cur_result);
				array_push($this -> five_best, $new_element);
			} else {
				if ($this -> five_best[count($this -> five_best)]["percent"] < $cur_percent) {
					$new_element = array("percent" => $cur_percent, "shift" => $cur_shift, "result" => $cur_result);
					array_pop($this -> five_best);
					array_push($this -> five_best, $new_element);
				}
			}
			rsort($this -> five_best);
		}

		function CalcPercent($lowera, $lower1, $uppera, $upper1, $cur_result)
		{
			$count_all_words = 0;
			$count_words_with_vowel = 0;
			$flag_word_begin = false;
			$flag_word_with_vowel = false;
			$flag_find_vowel = false;
			$str = $cur_result . " ";//in last char we inc count of vowel
			while (strlen($str) > 0) {
				//echo "strlen($str)".strlen($str)."fb = ".$flag_word_begin."; fv = ".$flag_word_with_vowel."\n";
				if ($flag_word_begin == false) {#not word
					if (ctype_alpha($str{0}) == true) {#now new word
						$flag_word_begin = true;
						$count_all_words ++;

						if (ctype_upper($str{0})) {#Big letter
							switch ($uppera[$str{0}]) {
								case 1:
									$flag_find_vowel = true;
									break;
								case 5:
									$flag_find_vowel = true;
									break;
								case 9:
									$flag_find_vowel = true;
									break;
								case 15:
									$flag_find_vowel = true;
									break;
								case 21:
									$flag_find_vowel = true;
									break;
								case 25:
									$flag_find_vowel = true;
									break;
							}
						} else {#little letter
							switch ($lowera[$str{0}]) {
								case 1:
									$flag_find_vowel = true;
									break;
								case 5:
									$flag_find_vowel = true;
									break;
								case 9:
									$flag_find_vowel = true;
									break;
								case 15:
									$flag_find_vowel = true;
									break;
								case 21:
									$flag_find_vowel = true;
									break;
								case 25:
									$flag_find_vowel = true;
									break;
							}
						}
						if ($flag_find_vowel == true) {
							$flag_find_vowel = false;
							$flag_word_with_vowel = true;
						}
					}
				} else { #now word continue
					if (ctype_alpha($str{0}) == true) {#Yes, word continue
						if (ctype_upper($str{0}) == true) {#Big letter
							switch ($uppera[$str{0}]) {
								case 1:
									$flag_find_vowel = true;
									break;
								case 5:
									$flag_find_vowel = true;
									break;
								case 9:
									$flag_find_vowel = true;
									break;
								case 15:
									$flag_find_vowel = true;
									break;
								case 21:
									$flag_find_vowel = true;
									break;
								case 25:
									$flag_find_vowel = true;
									break;
							}
						} else {#little letter
							switch ($lowera[$str{0}]) {
								case 1:
									$flag_find_vowel = true;
									break;
								case 5:
									$flag_find_vowel = true;
									break;
								case 9:
									$flag_find_vowel = true;
									break;
								case 15:
									$flag_find_vowel = true;
									break;
								case 21:
									$flag_find_vowel = true;
									break;
								case 25:
									$flag_find_vowel = true;
									break;
							}
						}
						if ($flag_find_vowel == true) {
							$flag_find_vowel = false;
							$flag_word_with_vowel = true;
						}
					} else { #no, word end
						if ($flag_word_with_vowel == true) {
							$count_words_with_vowel ++;
							$flag_word_with_vowel = false;
						}
						$flag_word_begin = false;
					}
				}
				
				$str = mb_substr($str, 1);
			}
			//echo $count_words_with_vowel ." / " . $count_all_words . " = ". ($count_words_with_vowel / $count_all_words * 100) . $cur_result . "\n"; 
			$percent = $count_words_with_vowel / $count_all_words * 100;
			if ($count_all_words !== 0) {
				return $percent; 
			} else {
				return 0;
			}
		}

		function Process($lowera, $lower1, $uppera, $upper1)
		{
			if ($this -> shift !== 0)
			{
				$this -> result = $this -> Shifting($lowera, $lower1, $uppera, $upper1, $this -> shift);
			} else {
				$cur_shift = 0;
				while ($cur_shift < 26) {
					$cur_result = $this -> Shifting($lowera, $lower1, $uppera, $upper1, $cur_shift);
					$cur_percent = $this -> CalcPercent($lowera, $lower1, $uppera, $upper1, $cur_result);
					$this -> Analizing($cur_result, $cur_shift, $cur_percent);
					$cur_shift ++;
				}
				//$this -> result = $this -> five_best[0]["result"] . "\n" . $this -> five_best[0]["shift"];
			}
		}

		function ShowResult()
		{
			header('Content-Type: application/x-javascript; charset=utf8');
			$elems = array();
			if ($this -> shift !== 0)
			{
				$elem = array('percent' => 100, 'shift' => $this -> shift, 'result' => $this -> result);
				array_push($elems, $elem);
			} else {
				$i = 0;
				while ($i < 5) {
					$elem = array('percent' => $this -> five_best[$i]["percent"], 'shift' => $this -> five_best[$i]["shift"], 'result' => $this -> five_best[$i]["result"]);
					array_push($elems, $elem);
					//$result = $result . $this -> five_best[$i]["result"]."\n".$this -> five_best[$i]["shift"]."\n".($this -> five_best[$i]["percent"])."%\n";
					$i++;
				}
			}
			$json_data = json_encode($elems);
			return $json_data;

		}

	}

	$obj = new Descrypt("$inp_source", "$inp_shift");
	$obj -> Process($lowera, $lower1, $uppera, $upper1);

	echo $obj -> ShowResult();
 ?>