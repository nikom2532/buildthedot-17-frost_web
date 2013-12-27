<?php
include ("include/header.php");
@session_start();
$rootpath = "../";
include ($rootpath . "lib/db.php");
include ($rootpath . "lib/conn.inc.php");
include ($rootpath . "lib/func_date.php");
if (!$db -> open()) {
	die($db -> error());
}
include("include/top-bar.php");
include("lib/func_pagination.php");

$msg = $_GET['msg'];
if ($msg=="Sucess") {
    $message = "Process Complete";
    ?>
     <script type="text/javascript">
        showNotification({
            message: "<?php echo $message; ?>",
            type: "success",
            autoClose: true,
            duration: 5                                        
        });
    </script>
    <?php
}if($msg=="Failed"){
	$message = "Process Failed! Please try again";
    ?>
     <script type="text/javascript">
        showNotification({
            message: "<?php echo $message; ?>",
            type: "error",
            autoClose: true,
            duration: 5                                        
        });
    </script>
    <?php
}
$header_with_tag = "group";
include("include/header-with-tabs.php");
?>
	<!-- MAIN CONTENT -->
	<div id="content">
		<div class="page-full-width cf">
			<div class="content-module">
				<div class="content-module-heading cf">
					<h3 class="fl">Group</h3>
					<span class="fr expand-collapse-text">Click to collapse</span>
					<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				</div> <!-- end content-module-heading -->
				<div class="content-module-main">
					<div id="wrap-add-customer">
						<a href="upload-pdf.php" class="round button orange ic-add image-left" >Upload PDF</a>
          </div>
<?php
					//include ("include/side-menu-knowledge3.php");
					if($_GET["grouplevel"]==""){
						$_GET["grouplevel"]=1;
					}
?>
					<div id="wrap-add-customer">
						<a href="group.php?grouplevel=1">Group level 1</a><?php 
						if($_GET["grouplevel"]==1){ ?> &lt;---<?php }
					?></div>
					<div id="wrap-add-customer">
						<a href="group.php?grouplevel=2">Group level 2</a><?php 
						if($_GET["grouplevel"]==2){ ?> &lt;---<?php }
					?></div>
					<div id="wrap-add-customer">
						<a href="group.php?grouplevel=3">Group level 3</a><?php 
						if($_GET["grouplevel"]==3){ ?> &lt;---<?php }
					?></div>
					<div id="wrap-add-customer">
						<a href="group.php?grouplevel=4">Group level 4</a><?php 
						if($_GET["grouplevel"]==4){ ?> &lt;---<?php }
					?></div>
					<div id="wrap-add-customer">
						<a href="group.php?grouplevel=5">Group level 5</a><?php 
						if($_GET["grouplevel"]==5){ ?> &lt;---<?php }
					?></div>
					<div id="wrap-add-customer">
						<a href="group.php?grouplevel=6">Group level 6</a><?php 
						if($_GET["grouplevel"]==6){ ?> &lt;---<?php }
					?></div>
					<table class="fixed">
						<col width="2em" />
    				<col width="8em" />
    				<col width="15em" />
    				<col width="5em" />
    				<col width="5em" />
						<thead>
							<tr>
								<th>No.</th>
								<th>Group Level Title Name</th>
								<th>Description</th>
								<th>Group Parent Title Name</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
<?php 
							/*---------Paging------------*/	
							$i=$_GET['i'];
							$page=1;//Default page
							$limit=10;//Records per page
							$start=0;//starts displaying records from 0
							if(isset($_GET['page']) && $_GET['page']!=''){
								$page=$_GET['page'];
								$i=$page*10;
							}
							$start=($page-1)*$limit;
							/*---------end Paging------------*/	
							$strQuery ="
								SELECT * 
								FROM  `GROUP_LV".$_GET["grouplevel"]."` 
							";
							$result = mysql_query($strQuery);	
							$Num_Rows = mysql_num_rows($result);
							$strQuery .= "LIMIT $start , $limit";
							//echo $strQuery;
							$result = mysql_query($strQuery);	
							if($page ==1){
								$i = 1;
							}
							while ($row = mysql_fetch_array($result)) {
?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['NAME']; ?></td>
									<td><?php echo $row['DESCRIPTION']; ?></td>
									<td><?php
										if($_GET["grouplevel"] != 1){
											$sql_parent_group="
												SELECT * 
												FROM `GROUP_LV".(($_GET["grouplevel"])-1)."`
												WHERE `ID` = '".$row["GROUP_LV".($_GET["grouplevel"]-1)."_ID"]."' 
											;";
											$result_parent_group = @mysql_query($sql_parent_group);
											while($rs_parent_group = @mysql_fetch_array($result_parent_group)){
												echo $rs_parent_group["NAME"];
											}
										}
										else{
											echo "-";
										}
									?></td>
<?php
									// $originalDate = $row['updateDate'];
									// $newDate = date("M d, Y", strtotime($originalDate));
									// echo "<td>" . $newDate . "</td>";
?>
									<td>
										<form method='post' action='edit-group.php' id='submitform' name='submitform'>
											<INPUT TYPE='image' class='left' SRC='images/icons/table/actions-edit.png' BORDER='0' style='margin:5px 10px 5px 75px;' ALT='EDIT'> 
											<input type='hidden' name='glvl_id' value="<?php echo $row['ID'];?>"/>
<?php
											if($_GET["grouplevel"] != 1){
?>
												<input type='hidden' name='glvl_id_parent' value="<?php echo $row["GROUP_LV".($_GET["grouplevel"]-1)."_ID"]; ?>"/>
<?php
											}
?>
											<input type='hidden' name='glvl_glvl' value="<?php echo $_GET["grouplevel"]; ?>"/>
										</form>
										<form method='post' action='delete-group.php'id='submitform' name='submitform'>
											<input type='hidden' name='pdfId' value="<?=$row['ID']?>"/>
											<input type='hidden' name='glvId' value="<?=$row['glvId']?>"/>	
											<input type='hidden' name='glvName' value="<?=$row['glvName']?>"/>	
											<INPUT TYPE='image' class='left' SRC='images/icons/table/actions-delete.png' BORDER='0' style='margin:5px 0' ALT='DELETE'  onClick='return confirmSubmit()'>
										</form>
									</td>
								</tr>
<?php
							$i = $i + 1;
							}
?>
						</tbody>
					</table>
<?php
					echo pagination($limit, $page, "pdf.php?page=", $Num_Rows);
					//call function to show pagination
?>
				</div> <!-- end content-module-main -->
			</div> <!-- end content-module -->
		</div> <!-- end full-width -->
	</div> <!-- end content -->
<?php include("include/footer.php");?>