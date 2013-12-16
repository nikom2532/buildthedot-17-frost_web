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
include("include/top-bar.php");?>
<?php include("lib/func_pagination.php");?>
<script type="text/javascript">
 	$(document).ready(function(){ 
    });
	 function confirmSubmit()
		{
		var agree=confirm("Are you sure you want to delete?");
		if (agree)
			return true ;
		else
			return false ;
		}   
        function showSuccessMessage(){
            showNotification({
                type : "error",
                message: "This is a sample success notification"
            });    
        }
         function showErrorMessage(){
	        showNotification({
	                    type : "error",
	                    message: "This is a sample success notification"
	                });    
	            }                                    
</script>
<?php 
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

$header_with_tag = "info";
include("include/header-with-tabs.php");
?>
		
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="content-module">
			
				<div class="content-module-heading cf">
				
					<h3 class="fl">Home Info</h3>
					<span class="fr expand-collapse-text">Click to collapse</span>
					<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				
				</div> <!-- end content-module-heading -->
				
				
				<div class="content-module-main">
					
					<table class="fixed">
						<col width="5em" />
						<col width="17em" />
	    				<col width="5em" />
	    				<col width="5em" />
					
						<thead>
					
							<tr>
								<th>Detail</th>
								<th>Description</th>
                                <th>Update dated</th>
								<th>Actions</th>
							</tr>
						
						</thead>
						
						<tbody>
							<?php 
							$SQLINFO="
										SELECT * 
										FROM  `INFO`
										";
										$resultInfo =@mysql_query($SQLINFO);
										while($row =@mysql_fetch_array($resultInfo)){		
										
							?>
						
							<tr>
								<td class="left"><?=$row['DETAIL']?></td>
								<td class="left"><?=$row['DESCRIPTION']?></td>
								<?php
									$originalDate = $row['UPDATE'];
									$newDate = date("M d, Y", strtotime($originalDate));
									echo "<td>" .$newDate."</td>";
								?>

								<td>
									<form method='post' action='edit-info.php' id='submitform' name='submitform'>
										<INPUT TYPE='image' class='left' SRC='images/icons/table/actions-edit.png' BORDER='0' style='margin:5px 10px 5px 75px;' ALT='EDIT'> 
										<input type='hidden' name='infoId' value="<?=$row['ID']?>"/>	
									</form>
								</td>
							</tr>

						<?php }?>
						</tbody>
						
					</table>

				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>