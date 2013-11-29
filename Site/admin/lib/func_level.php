<?php
function getLevelName($lvName, $lvId) {
			$lv1 = 0;
			$lv2 = 0;
			$lv3 = 0;
			$lv4 = 0;
			
			if($lvName == 2){
				$SQLLV2 =" SELECT * 
					FROM  `GROUP_LEVEL2`
					";
					$result =@mysql_query($SQLLV2);
			
			    while($row = @mysql_fetch_array($result)){		
					if($row['ID'] == $lvId){
						$lv1 = $row['GROUP_LEVEL1_ID'];	
					    $lv2 = $lvId;
					}	
					
				switch ($lvId) {
				// lv1 = 1			
					case $row['ID']:	
						$lv1 = $row['GROUP_LEVEL1_ID'];	
						$lv2 = $lvId;
					    //echo "lv1  = $lv1"."<br>";
					    break;
					
					}
				}
			}// end group level name = 2
			
			if($lvName == 3){
				switch ($lvId) {
				// lv2 = 3
				case 3:	
					$lv3 = $lvId;
					$lv2 = 2;
					$lv1 = 1;	
				    // echo "lv2  = $lv2"."<br>";
				    // echo "lv1  = $lv1"."<br>";
				    break;
				case 4:
					$lv3 = $lvId;
					$lv2 = 2;
					$lv1 = 1;
				    // echo "lv2  = $lv2"."<br>";
				    // echo "lv1  = $lv1"."<br>";
				    break;
				case 5:
					$lv3 = $lvId;
					$lv2 = 2;
					$lv1 = 1;
				    // echo "lv2  = $lv2"."<br>";
				    // echo "lv1  = $lv1"."<br>";
				    break;
				case 6:
					$lv3 = $lvId;
					$lv2 = 2;
					$lv1 = 1;
				    // echo "lv2  = $lv2"."<br>";
				    // echo "lv1  = $lv1"."<br>";
				    break;		
				case 7:	
					$lv3 = $lvId;
					$lv2 = 2;
					$lv1 = 1;
				    // echo "lv2  = $lv2"."<br>";
				    // echo "lv1  = $lv1"."<br>";
				    break;
				case 8:
					$lv3 = $lvId;
					$lv2 = 2;
					$lv1 = 1;
				    // echo "lv2  = $lv2"."<br>";
				    // echo "lv1  = $lv1"."<br>";
				    break;
				// lv2 = 2
				case 9:
					$lv3 = $lvId;
					$lv2 = 2;
					$lv1 = 1;
				    // echo "lv2  = $lv2"."<br>";
				    // echo "lv1  = $lv1"."<br>";
				    break;
				case 10:
					$lv3 = $lvId;
					$lv2 = 2;
					$lv1 = 1;
				    // echo "lv2  = $lv2"."<br>";
				    // echo "lv1  = $lv1"."<br>";
				    break;
				case 11:
					$lv3 = $lvId;
					$lv2 = 2;
					$lv1 = 1;
				    // echo "lv2  = $lv2"."<br>";
				    // echo "lv1  = $lv1"."<br>";
				    break;
				case 12:
					$lv3 = $lvId;
					$lv2 = 4;
					$lv1 = 1;
				    // echo "lv2  = $lv2"."<br>";
				    // echo "lv1  = $lv1"."<br>";
				    break;
				}
			}// end group level name = 3
			
			if($lvName == 4){
				switch ($lvId) {
				// lv2 = 3
				case 5:
					$lv4 = $lvId;
					$lv3 = 10;
					$lv2 = 3;
					$lv1 = 1;		
				    // echo "lv3  = $lv3"."<br>";
				    // echo "lv2  = $lv2"."<br>";
					// echo "lv1  = $lv1"."<br>";
				    break;
				case 6:
					$lv4 = $lvId;
					$lv3 = 10;
					$lv2 = 3;
					$lv1 = 1;
				    // echo "lv3  = $lv3"."<br>";
				    // echo "lv2  = $lv2"."<br>";
					// echo "lv1  = $lv1"."<br>";
				    break;
				case 7:
					$lv4 = $lvId;
					$lv3 = 11;
					$lv2 = 3;
					$lv1 = 1;
				    // echo "lv3  = $lv3"."<br>";
				    // echo "lv2  = $lv2"."<br>";
					// echo "lv1  = $lv1"."<br>";
				    break;
				case 8:
					$lv4 = $lvId;
					$lv3 = 12;
					$lv2 = 4;
					$lv1 = 2;
				    // echo "lv3  = $lv3"."<br>";
				    // echo "lv2  = $lv2"."<br>";
					// echo "lv1  = $lv1"."<br>";
				    break;
				
				}
			}// end group level name = 4
			 echo "lv4  = $lv4"."<br>";
			 echo "lv3  = $lv3"."<br>";
			 echo "lv2  = $lv2"."<br>";
			 echo "lv1  = $lv1"."<br>";
			 
			 $gLv4Id = $lv4;
			 $gLv3Id = $lv3;
			 $gLv2Id = $lv2;
			 $gLv1Id = $lv1;
			 
			 echo "$gLv1Id";
			 echo "$gLv2Id";
			 echo "$gLv3Id";
		}
?>