<?php

	function highlightkeyword($str, $search) {
    $highlightcolor = "#EB500B";
    $occurrences = @substr_count(strtolower($str), strtolower($search));
    $newstring = $str;
    $match = array();
 
    for ($i=0;$i<$occurrences;$i++) {
        $match[$i] = stripos($str, $search, $i);
        $match[$i] = substr($str, $match[$i], strlen($search));
        $newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));
    }
 
    $newstring = str_replace('[#]', '<span style="color: '.$highlightcolor.';">', $newstring);
    $newstring = str_replace('[@]', '</span>', $newstring);
    return $newstring;
 
	}
	
	// function hightlight($string,$keyword){
		// $keywords_str = $keyword;
		// $result = $string;
		// $keywords = explode(' ', $keywords_str);
		// foreach($keywords as $k)
		// {
// 		   
		   // $result = str_replace($k, "<b class='text-orange'>$k</b>", $result);
		// }		
		// return $result;
	// }
?> 