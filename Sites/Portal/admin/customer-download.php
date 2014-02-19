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

			Customer Management --> Customer Download
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
    				<col width="5em" />
    				<col width="6em" />
					<thead>

						<tr>
							<th>No.</th>
							<th>Download Datetime</th>
							<th>Username</th>
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
								<td><?=$i?></td>
								<td><?php echo $row['DOWNLOAD_DATETIME']; ?></td>
								<td><?php echo $row["USER_ID"]; ?></td>
								<td><?php echo $row["PDF_ID"]; ?></td>
								<!-- <td><?=$row['firstname'] . "&nbsp;" . $row['lastname']?></td> -->
							</tr>
<?php
						}
?>
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