<nav id="side-menu" class="grid_3">
	<ul>
<?php
		//find lvl1 page
		$temp_glvl = $_GET["glvl"];
		$temp_id = $_GET["id"];
		while($temp_glvl!=1){
			$SQL="
				SELECT *
				FROM `GROUP_LV".$temp_glvl."`
				WHERE `ID` = ".$temp_id."
			;";
			$db->query($SQL);
			//unset($SQL);
			while($rs=$db->fetchAssoc()){
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
				FROM  `GROUP_LV".$_GET["glvl"]."`
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
			<li id="link-main"><a href="./main-knowledge.php?id=<?php echo $rs["ID"]?>&glvl=2" class="bold"><?php echo $rs["NAME"]; ?></a>
<?php
									//&& $_GET["id"]==$rs["ID"] && $rs["GROUP_LV1_ID"]==1
									//&& $_GET["id"]=="1"
				if($_GET["glvl"]>=2 ){
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
						//if($rs2["GROUP_LV2_ID"]==1){
?>
							<ul>
								<li><a href="./main-knowledge.php?id=<?php echo $rs2["ID"]; ?>&glvl=3" class="bold text-green"><?php echo $rs2["NAME"]; ?></a>
<?php
									if($_GET["glvl"]>=3){ //&& $_GET["id"]==$rs2["ID"]
										$SQL3="
											SELECT * 
											FROM  `GROUP_LV4`
											WHERE `GROUP_LV3_ID` = '{$rs2["ID"]}'
										";
										$result3=@mysql_query($SQL3);
										while($rs3=@mysql_fetch_array($result3)){
											
											
											//if($rs3["GROUP_LV3_ID"]==$parentGroup3){
											//if($rs3["GROUP_LV3_ID"]==$_GET["id"]){
											//if($rs3["GROUP_LV3_ID"]==1){
?>
												<ul> 
													<li><a href="./main-knowledge.php?id=<?php echo $rs3["ID"]; ?>&glvl=4" class="bold"><?php echo $rs3["NAME"]; ?></a>
<?php
														if($_GET["glvl"]>=4){
															$SQL4="
																SELECT * 
																FROM  `GROUP_LV5`
																WHERE `GROUP_LV4_ID` = '{$rs3["ID"]}'
															";
															$result4=@mysql_query($SQL4);
															while($rs4=@mysql_fetch_array($result4)){
																
																// $SQLparentGroup4="
																	// SELECT * 
																	// FROM  `GROUP_LV4`
																	// WHERE `ID` = '{$_GET["id"]}' 
																// ";
																// $resultParentGroup4=@mysql_query($SQLparentGroup4);
																// if($rsPG4=@mysql_fetch_array($resultParentGroup4)){
																	// $parentGroup4=$rsPG4["ID"];
																// }
																
																//if($rs4["GROUP_LV4_ID"]==$parentGroup4){
																//if($rs4["GROUP_LV4_ID"]==$_GET["id"]){
																//if($rs4["GROUP_LV4_ID"]==1){
?>
																<ul>
																	<li><a href="./main-knowledge.php?id=<?php echo $rs4["ID"]; ?>&glvl=5"><?php echo $rs4["NAME"]; ?></a>
										                                	
<?php
																			if($_GET["glvl"]>=5){
																				$SQL5="
																					SELECT * 
																					FROM  `GROUP_LV6`
																					WHERE `GROUP_LV5_ID` = '{$rs4["ID"]}'
																				";
																				$result5=@mysql_query($SQL5);
																				while($rs5=@mysql_fetch_array($result5)){
																					
																					// $SQLparentGroup5="
																						// SELECT * 
																						// FROM  `GROUP_LV5`
																						// WHERE `ID` = '{$_GET["id"]}' 
																					// ";
																					// $resultParentGroup5=@mysql_query($SQLparentGroup5);
																					// if($rsPG5=@mysql_fetch_array($resultParentGroup5)){
																						// $parentGroup5=$rsPG5["ID"];
																					// }
																					
																					//if($rs5["GROUP_LV5_ID"]==$parentGroup5){
																					//if($rs5["GROUP_LV5_ID"]==$_GET["id"]){
																					//if($rs5["GROUP_LV5_ID"]==1){
?>
																					<ul>
																						<li><a href="./main-knowledge.php?id=<?php echo $rs5["ID"]; ?>&glvl=6"><?php echo $rs5["NAME"]; ?></a>
																						</li>
																					</ul>
<?php
																				//}
																			}
																		}
?>
																	</li>
																</ul>
<?php
																//}
															}
														}
?>
													</li><!--end Telecom Market Data -->
												</ul>
<?php
											//}
										}
									}
?>
								</li><!--end Research Thailand(2)-->
							</ul>
<?php
						//}
					}
				}
?>
			</li><!--end Technology--><?php
		}
?>
 </ul>
</nav>	