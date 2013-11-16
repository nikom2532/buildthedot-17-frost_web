<?php include("include/header.php");?>
<?php include("include/top-bar.php");?>
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

?>

	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="left">
				<li><a href="main.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="customer.php" >Customer Management</a></li>
				<li><a href="pdf.php" class="active-tab">PDF Management</a></li>
                <li><a href="tag.php">Tag Management</a></li>
                <li><a href="home-info.php">Home Info</a></li>
			</ul> <!-- end tabs -->
			
			<!-- company logo -->
			<a href="#" id="company-branding-small" class="right"><img src="images/mckansys_logo.png" width="200" height="27" alt="logo"></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
		
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="content-module">
			
				<div class="content-module-heading cf">
				
					<h3 class="fl">PDF</h3>
					<span class="fr expand-collapse-text">Click to collapse</span>
					<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				
				</div> <!-- end content-module-heading -->
				
				
				<div class="content-module-main">
					<div id="wrap-add-customer">
						<a href="upload-pdf.php" class="round button orange ic-add image-left" >Upload PDF</a>
                    </div>
					
					<table class="fixed">
						<col width="2em" />
	    				<col width="20em" />
	    				<col width="5em" />
	    				<col width="5em" />
					
						<thead>
					
							<tr>
								<th>No.</th>
								<th>Title</th>
                                <th>Update dated</th>
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
							$strQuery ="SELECT p.ID AS id, 
										p.NAME AS name,
										a.GROUP_LEVEL_NAME AS glvName,
										a.GROUP_LEVEL_ID AS glvId,
										p.UPDATE_DATE AS updateDate
										FROM PDF AS p 
										INNER JOIN PDF_CATEGORY AS a
										ON p.ID = a.ID
										WHERE IS_ASIAN_COUNTRY = '0'
										ORDER BY ID DESC ";
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
								<td><?=$i?></td>
								<td><?=$row['name']?></td>
								<?php
									$originalDate = $row['updateDate'];
									$newDate = date("M d, Y", strtotime($originalDate));
									echo "<td>" .$newDate."</td>";
								?>

								<td>
									<form method='post' action='edit-pdf.php' id='submitform' name='submitform'>
										<INPUT TYPE='image' class='left' SRC='images/icons/table/actions-edit.png' BORDER='0' style='margin:5px 10px 5px 75px;' ALT='EDIT'> 
										<input type='hidden' name='pdfId' value="<?=$row['id']?>"/>
										<input type='hidden' name='glvName' value="<?=$row['glvName']?>"/>
										<input type='hidden' name='glvId' value="<?=$row['glvId']?>"/>	
									</form>
									<form method='post' action='delete-pdf.php'id='submitform' name='submitform'>
										<input type='hidden' name='pdfId' value="<?=$row['id']?>"/>
										<input type='hidden' name='glvName' value="<?=$row['glvName']?>"/>
										<input type='hidden' name='glvId' value="<?=$row['glvId']?>"/>	
										<INPUT TYPE='image' class='left' SRC='images/icons/table/actions-delete.png' BORDER='0' style='margin:5px 0' ALT='DELETE'  onClick='return confirmSubmit()'>
									</form>
								</td>
							</tr>
						
						<?php 
								$i = $i + 1;
							
							}?>
							
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