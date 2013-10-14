<div id="wrapper">
	<div id="top-bar">
		<div class="container_12" id="nav-profile">
			<div class="grid_5">
				<a href="./index.php"><img src="images/mckansys_logo.png" alt="logo"></a>
			</div>
			<!-- member login-->
			<ul class="right"> 
				<li id="button-myprofile">
					
					<?php $userID = $_SESSION["userid"];?>
						
						<?php 
						if($_SESSION["userid"]==""){ ?>
							<a href="login.php" class="link grid_2 text-orange uppercase">Sign In</a>
						<?php }
						else{?>
							<a href="myprofile.php?userID=<?=$userID?>" class="ic-user link grid_2 text-orange uppercase">My Profile</a>
						
					
				</li>
				<li id="button-signout">
					<a href="logout.php" class="grid_2 uppercase" onclick="" >Sign out</a>
				</li>
				<?php } ?>
			</ul>
			<!-- -->
		</div>
	</div><!--end top-bar -->
	<div id="nav-bar">
		<div class="container">
			<ul id="topnav" class="grid_6">
				<li>
					<a href="index.php">Home</a>
				</li>
<?php
				//query menu
				$SQL="
					SELECT *
					FROM `GROUP_LV1`
				;";
				$db->query($SQL);
				//unset($SQL);
				while($rs=$db->fetchAssoc()){
?>
				<li>
					<a href="<?php echo $rootpath; ?>main-knowledge.php?id=<?php echo $rs["ID"]; ?>&glvl=1"><?php echo $rs["NAME"]; ?></a>
					<span>
<?php
						$SQL="
						SELECT *
						FROM `GROUP_LV2`
						WHERE `GROUP_LV1_ID` = '{$rs["ID"]}'
						;";
						$result2 = @mysql_query($SQL);
						while($rs2=@mysql_fetch_assoc($result2)){
							if($rs["ID"]==1){
								?><a href="<?php echo $rootpath; ?>main-knowledge.php?id=<?php echo $rs2["ID"]; ?>&glvl=2"><?php echo $rs2["NAME"]; ?></a> | <?php
								}
								}
							?>
					</span>
				</li>
<?php
}
?>
				<!-- <li>
				<a href="">Knowledge</a>
				<span>
				<a href="">Technology</a> |
				<a href="">Strategy</a> |
				<a href="">Around Asean</a>
				</span>
				</li>
				<li>
				<a href="best-practice.php">Best Practice</a>
				</li> -->
			</ul>
			<div class="right">
				<ul id="top-nav-search" class="grid_4">
					<form action="search-result.php" method="GET" id="search-form" class="fr">
						<fieldset>
							<input type="text" id="keyword" name ="keyword" class="" placeholder="Search..." />
							<input type="submit" value="" class="orange icSearch" />
						</fieldset>
					</form>
				</ul>
				<!-- <div class="grid_1" id="adv-seach">
					<a href="advance-search.php" >Advanced Search</a>
				</div> -->
			</div>
		</div><!--end container -->
	</div><!--end nav-bar -->
	<!--End Header -->
