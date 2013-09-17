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
						$SQLparentGroup="
							SELECT * 
							FROM  `GROUP_LV2`
							WHERE `ID` = '{$_GET["id"]}' 
						";
						$resultParentGroup=@mysql_query($SQLparentGroup);
						if($rsPG=@mysql_fetch_array($resultParentGroup)){
							$parentGroup=$rsPG["ID"];
						}
						
						//if($rs2["GROUP_LV2_ID"]==$parentGroup){
						if($rs2["GROUP_LV2_ID"]==1){
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
												
											$SQLparentGroup="
												SELECT * 
												FROM  `GROUP_LV3`
												WHERE `ID` = '{$_GET["id"]}' 
											";
											$resultParentGroup=@mysql_query($SQLparentGroup);
											if($rsPG=@mysql_fetch_array($resultParentGroup)){
												$parentGroup=$rsPG["ID"];
											}
											
											//if($rs3["GROUP_LV3_ID"]==$parentGroup){
											if($rs3["GROUP_LV3_ID"]==2){
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
																
																$SQLparentGroup="
																	SELECT * 
																	FROM  `GROUP_LV4`
																	WHERE `ID` = '{$_GET["id"]}' 
																";
																$resultParentGroup=@mysql_query($SQLparentGroup);
																if($rsPG=@mysql_fetch_array($resultParentGroup)){
																	$parentGroup=$rsPG["ID"];
																}
																
																//if($rs4["GROUP_LV4_ID"]==$parentGroup){
																if($rs4["GROUP_LV4_ID"]==2){
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
																					
																					$SQLparentGroup="
																						SELECT * 
																						FROM  `GROUP_LV5`
																						WHERE `ID` = '{$_GET["id"]}' 
																					";
																					$resultParentGroup=@mysql_query($SQLparentGroup);
																					if($rsPG=@mysql_fetch_array($resultParentGroup)){
																						$parentGroup=$rsPG["ID"];
																					}
																					
																					//if($rs5["GROUP_LV5_ID"]==$parentGroup){
																					if($rs5["GROUP_LV5_ID"]==2){
?>
															                            <ul>
															                                <li><a href="./main-knowledge.php?id=<?php echo $rs5["ID"]; ?>&glvl=6"><?php echo $rs5["NAME"]; ?></a>
															                                </li>
															                            </ul>
<?php
																					}
																				}
																			}
?>
										                                </li>
										                            </ul>
<?php
																}
															}
														}
?>
							                        </li><!--end Telecom Market Data -->
							                    </ul>
<?php
											}
										}
									}
?>
				                </li><!--end Research Thailand(2)-->
							</ul>
<?php
						}
					}
				}
?>
	        </li><!--end Technology--><?php
		}
?>
<?php
			//Old HTML from Noi
			/*
?>
	        <li id="link-main"><a href="#" class="bold">Technology</a>
	            <ul>
	                <li><a href="#" class="bold text-green">Research Thailand(2)</a>
	                    <ul> 
	                        <li><a href="#" class="bold">Telecom Market Data</a>
	                            <ul>
	                                <li><a href="#">Fixed-line voice</a></li>
	                                <li><a href="#">Fixed-line data</a></li>
	                                <li><a href="#">Mobile voice</a></li>
	                                <li><a href="#">Mobile data</a></li>
	                            </ul>
	                        </li><!--end Telecom Market Data -->
	                        <li><a href="#" class="bold">ICT Industry Outlook</a>
	                            <ul>
	                                <li><a href="#">Application</a></li>
	                                <li><a href="#">Service</a></li>
	                                <li><a href="#">Infrastructure</a></li>
	                                <li><a href="#">Sector focus</a></li>
	                                <li><a href="#">Consumer market</a></li>
	                            </ul>
	                        </li><!--end ICT Industry Outlook-->
	                    </ul>
	                </li><!--end Research Thailand(2)-->
	             </ul>
	            <ul>
	                <li><a href="#" class="text-lightblue bold">Global Trend(2)</a>
	                <ul> 
	                        <li><a href="#" class="bold">ICT Technology</a>
	                            <ul>
	                                <li><a href="#">Application</a></li>
	                                <li><a href="#">Service</a></li>
	                                <li><a href="#">Infrastructure</a></li>
	                            </ul>
	                        </li><!--end ICT Technology-->
	                        <li><a href="#" class="bold">Highlight of the Month</a></li>
	                    </ul>
	                </li><!--end Global Trend(2) -->
	            </ul>
	        </li><!--end Technology-->
	        
	        <li class="break-menu"><a href="#" class="bold">Strategy</a>
	            <ul> 
	                <li><a href="#">E-business</a></li>
	                <li><a href="#">Customer </a></li>
	                <li><a href="#">Infrastructure Experience</a></li>
	                <li><a href="#">Value innovation</a></li>
	                <li><a href="#">Process Improvement </a></li>
	                <li><a href="#">Go to Market</a></li>
	                <li><a href="#">Competitive analysis</a></li>
	            </ul>
	        </li><!--end Strategy -->
	        <li class="break-menu"><a href="#" class="bold">Around Asean</a>
	            <ul>
	                <li><a href="#" class="bold">Update AEC News</a></li>
	                <li><a href="#" class="bold">Competency Index</a>
	                    <ul> 
	                        <li><a href="#">World Economic Index</a></li>
	                        <li><a href="#">Competency Index</a></li>
	                        <li><a href="#">Country Profile</a></li>
	                    </ul>
	                 </li>
	            </ul>
	        
	        </li><!--end Around Asean -->
<?php		*/ ?>
    </ul>
</nav>	