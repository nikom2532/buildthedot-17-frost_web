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

$header_with_tag = "customer";
include("include/header-with-tabs.php");
?>
		
<!-- MAIN CONTENT -->
<div id="content">

	<div class="page-full-width cf">

		<div class="content-module">
			<div style="margin-top: 15px; margin-bottom: 15px; margin-left: 15px;"><a href="./customer.php">Customer Management</a> --&gt; Customer Download</div>
			<div class="content-module-heading cf">

				<h3 class="fl">Customer</h3>
				<span class="fr expand-collapse-text">Click to collapse</span>
				<span class="fr expand-collapse-text initial-expand">Click to expand</span>

			</div>
			<!-- end content-module-heading -->

			<div class="content-module-main">

				<table class="fixed">
					<col width="2em" />
    				<col width="8em" />
    				<col width="8em" />
    				<col width="7em" />
					<thead>

						<tr>
							<th>No.</th>
							<th>Download Datetime</th>
							<th>PDF</th>
							<!-- <th>Name Surname</th> -->
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
						$strQuery = "
							SELECT * 
							FROM  `DOWNLOAD_STATISTICS`
							WHERE `USER_ID` = '{$_POST["userId"]}'
						";
						$result = mysql_query($strQuery);
						$Num_Rows = mysql_num_rows($result);
						$strQuery .= "LIMIT $start , $limit";
						//echo $strQuery;
						$result = mysql_query($strQuery);
							
						if($page ==1){
						}
								$i = 1;
							//qi soft - 
						while ($row = mysql_fetch_array($result)) {
?>
							<tr>
								<td><?=$i++?></td>
								<td><?php echo $row['DOWNLOAD_DATETIME']; ?></td>
								<td><?php
								// echo $row["PDF_ID"];
									$sql_readpdf = "
										SELECT *
										FROM  `PDF`
										where `ID` = '{$row["PDF_ID"]}' ;
									";
									$result_readpdf = @mysql_query($sql_readpdf);
									while ($rs_readpdf = @mysql_fetch_array($result_readpdf)) {
										?><!--<a href="#" id="pdf_read"><?php echo $rs_readpdf["NAME"]; ?></a>-->
										<form method='post' action='edit-pdf.php' id='pdf_form' name='submitform'>
											<input type='hidden' name='pdfId' value="<?php echo $rs_readpdf['id']; ?>"/>
<?php
											
?>
											<input type="submit" value="<?php echo $rs_readpdf["NAME"]; ?>" />
										</form><?php
									}
								?></td>
								<!-- <td><?=$row['firstname'] . "&nbsp;" . $row['lastname']?></td> -->
							</tr>
<?php
						}
?>
						<script>
							//$("#pdf_read").click(function(){
							//	$("#pdf_form").submit();
							//});
						</script>
					</tbody>

				</table>
				<?php
					echo pagination($limit, $page, "customer-download.php?page=", $Num_Rows);
				?>
			</div>
			<!-- end content-module-main -->

		</div>
		<!-- end content-module -->

	</div>
	<!-- end full-width -->

</div>
<!-- end content -->


<?php include("include/footer.php");?>