<?php
		//find lvl1 page
		//$temp_glvl = $_GET["glvl"];
		//$temp_id = $_GET["id"];
		
		$temp_glvl = $glvName;
		$temp_id = $glvId;
		
		
		while($temp_glvl>1){
			$SQL="
				SELECT *
				FROM `GROUP_LV".$temp_glvl."`
				WHERE `ID` = ".$temp_id."
			;";
			$resultGlvl = @mysql_query($SQL);
			//$db->query($SQL);
			//unset($SQL);
			while($rs=@mysql_fetch_array($resultGlvl)){
				//find ID
				if($temp_glvl==5){
				 $ID_lvl5= $rs["ID"];
				}
				elseif($temp_glvl==4){
				 $ID_lvl4= $rs["ID"];
				}
				elseif($temp_glvl==3){
				 $ID_lvl3= $rs["ID"];
				}
				elseif($temp_glvl==2){
				 $ID_lvl2= $rs["ID"];
				}
				
				//find ParentID
				$temp_id = $rs["GROUP_LV".($temp_glvl-1)."_ID"];
				if($temp_glvl==5){
					$parentGroup5 = $temp_id;
				}
				elseif($temp_glvl==4){
					$parentGroup4 = $temp_id;
				}
				elseif($temp_glvl==3){
					$parentGroup3 = $temp_id;
				}
				elseif($temp_glvl==2){
					$parentGroup2 = $temp_id;
				}
				$temp_glvl--;
				//echo "temp_glvl=".$temp_glvl." temp_id=".$temp_id;
			}
		}
		echo "<br/>1 = ".$parentGroup2;
		echo "<br/>2 = ".$parentGroup3;
		echo "<br/>3 = ".$parentGroup4;
		echo "<br/>4 = ".$parentGroup5;
		echo "<br/>____";		
		
/*
		//generate the dynamic menu on the LHS
		if(!isset($_GET["glvl"])){
  	$SQL="
  		SELECT * 
				FROM  `GROUP_LV1` 
  	;";
		}
		else{
  	$SQL="
  		SELECT * 
				FROM  `GROUP_LV".$glvName."`
  	;";
		}
		$SQL="
	 		SELECT * 
				FROM  `GROUP_LV2`
				WHERE `GROUP_LV1_ID` = {$temp_id}
	 	;";
		$db->query($SQL);
		while($rs=$db->fetchAssoc()){
?>
				<a href="./main-knowledge.php?id=<?php echo $rs["ID"]?>&glvl=2&gp=<?php 
					$SQL2="
						SELECT * 
						FROM  `GROUP_LV3`
						WHERE `GROUP_LV2_ID` = '{$rs["ID"]}'
					";
					$result2=@mysql_query($SQL2);
					if($rs2=@mysql_fetch_array($result2)){
						echo "y";
					}
					else{
						echo "n";
					}
				?>" class="bold"><?php echo $rs["NAME"]; ?>222</a>
<?php
				//&& $_GET["id"]==$rs["ID"] && $rs["GROUP_LV1_ID"]==1
				//&& $_GET["id"]=="1"
				if($glvName>=2){
					
					$SQL2="
						SELECT * 
						FROM  `GROUP_LV3`
						WHERE `GROUP_LV2_ID` = '{$rs["ID"]}'
					";
					$result2=@mysql_query($SQL2);
															//&& $rs2["GROUP_LV2_ID"]==$rs["ID"]
					while($rs2=@mysql_fetch_array($result2)){
						
						//if($rs2["GROUP_LV2_ID"]==$parentGroup)2{
						//if($rs2["GROUP_LV2_ID"]==$_GET["id"]){
						if($rs2["GROUP_LV2_ID"]==$ID_lvl2){
						//if($rs2["GROUP_LV2_ID"]==1){
?>
									<a href="./main-knowledge.php?id=<?php echo $rs2["ID"]; ?>&glvl=3&gp=<?php 
									$SQL3="
										SELECT * 
										FROM  `GROUP_LV4`
										WHERE `GROUP_LV3_ID` = '{$rs2["ID"]}'
									";
									$result3=@mysql_query($SQL3);
									if($rs3=@mysql_fetch_array($result3)){
										echo "y";
									}
									else{
										echo "n";
									}
								?>" class="bold text-green"><?php echo $rs2["NAME"]; ?>333</a>
<?php
									if($glvName>=3){ //&& $_GET["id"]==$rs2["ID"]
										
										$SQL3="
											SELECT * 
											FROM  `GROUP_LV4`
											WHERE `GROUP_LV3_ID` = '{$rs2["ID"]}'
										";
										$result3=@mysql_query($SQL3);
										while($rs3=@mysql_fetch_array($result3)){
											
											//if($rs3["GROUP_LV3_ID"]==$parentGroup3){
											//if($rs3["GROUP_LV3_ID"]==$_GET["id"] && $_GET["glvl"]==4){
											if($rs3["GROUP_LV3_ID"]==$ID_lvl3){
											//if($rs3["GROUP_LV3_ID"]==1){
?>
													<a href="./main-knowledge.php?id=<?php echo $rs3["ID"]; ?>&glvl=4&gp=<?php 
														$SQL4="
															SELECT * 
															FROM  `GROUP_LV5`
															WHERE `GROUP_LV4_ID` = '{$rs3["ID"]}'
														";
														$result4=@mysql_query($SQL4);
														if($rs4=@mysql_fetch_array($result4)){
															echo "y";
														}
														else{
															echo "n";
														}
													?>" class="bold"><?php echo $rs3["NAME"]; ?>444</a>
<?php
														if($glvName>=4){
															
															$SQL4="
																SELECT * 
																FROM  `GROUP_LV5`
																WHERE `GROUP_LV4_ID` = '{$rs3["ID"]}'
															";
															$result4=@mysql_query($SQL4);
															while($rs4=@mysql_fetch_array($result4)){
																
																//if($rs4["GROUP_LV4_ID"]==$parentGroup4){
																//if($rs4["GROUP_LV4_ID"]==$_GET["id"]){
																if($rs4["GROUP_LV4_ID"]==$ID_lvl4){
																//if($rs4["GROUP_LV4_ID"]==1){
?>
																	<a href="./main-knowledge.php?id=<?php echo $rs4["ID"]; ?>&glvl=5&gp=<?php 
																		$SQL5="
																			SELECT * 
																			FROM  `GROUP_LV6`
																			WHERE `GROUP_LV5_ID` = '{$rs4["ID"]}'
																		";
																		$result5=@mysql_query($SQL5);
																		if($rs5=@mysql_fetch_array($result5)){
																			echo "y";
																		}
																		else{
																			echo "n";
																		}
																	?>"><?php echo $rs4["NAME"]; ?>555</a>
<?php
																		if($glvName>=5){
																			$SQL5="
																				SELECT * 
																				FROM  `GROUP_LV6`
																				WHERE `GROUP_LV5_ID` = '{$rs4["ID"]}'
																			";
																			$result5=@mysql_query($SQL5);
																			while($rs5=@mysql_fetch_array($result5)){
																				
																				//if($rs5["GROUP_LV5_ID"]==$parentGroup5){
																				//if($rs5["GROUP_LV5_ID"]==$_GET["id"]){
																				if($rs5["GROUP_LV5_ID"]==$ID_lvl5){
																				//if($rs5["GROUP_LV5_ID"]==1){
?>
																							<a href="./main-knowledge.php?id=<?php echo $rs5["ID"]; ?>&glvl=6&gp=y"><?php echo $rs5["NAME"]; ?></a>
<?php
																				}
																			}
																		}// end glvl=5
?>
<?php
																}
															}
														}// end glvl=4
?>
<?php
											}
										}
									}// end glvl=3
?>
<?php
						}
					}
				}// end glvl=2
?>
			<!--end Technology--><?php
		}// end glvl=1
*/
?>