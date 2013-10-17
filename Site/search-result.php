<?php include("include/header.php");?>
<?php include("include/top-menu.php");?>
<?php include("lib/func_search.php");?>
<?php require("lib/func_pagination.php");?>



	<div id="content">
    	<div class="container_12" id="container">
        <div id="content-middle" class="grid_12">

       	  	<h1 id="head-title" class="text-green grid_12">Search Result</h1>
          	
              <br class="clear"/>      
              <div id="advancesearch-result">
              		<?php include("advance-search-proc.php");?>
              		<?php if($Num_Rows != 0){?>
              		<h2 class="text-lightgreen2 grid_12"><span class="text-orange"><?=$Num_Rows?> </span> results founds for <?="<span class='text-orange'>\"".$keyword."\"</span>"?></h1>
              		 <?php 
              		 //echo "keyword=>".$keyword;
					 //$keys = explode(" ",$keyword);
					 // foreach($keys as $k){
	    				// echo  $k.",";
					// }
              		 	while($fetchArraySearch =mysql_fetch_array($cmdQuerySearch)){
				
                      ?>	
              		<section class="grid_11">
              		
                    	<h3>Title : <a href="report-detail-no-sidemenu.php?id=<?=$fetchArraySearch['ID'];?> "><?=highlightkeyword($fetchArraySearch['NAME'],$keyword)?></a></h3>
                    	<?php $date= $fetchArraySearch['UPDATE_DATE'];
                    		 $date = date('F d, Y', strtotime($date));
                    	?>
                    	<h3>Date : <?=highlightkeyword($date,$year)?></h3>
                    	<?php
						// description
						if(strpos($keyword, ' ') !== false) {
							$keywords_str = $keyword;
							$string = $fetchArraySearch['DESCRIPTION'];
							$result = $string;
							$keywords = explode(' ', $keywords_str);
							foreach($keywords as $k)
							{
							   
							   $result = str_replace($k, "<b class='search-hightlight'>$k</b>", $result);
							}
						 ?>               						
							   Description :<?php echo $result; ?> 
						<?php 
						}
						else{
						
							   echo highlightkeyword($fetchArraySearch['DESCRIPTION'],$keyword);
						}	              	
                    	?>
                        <!-- <p>Description :<?=highlightkeyword($fetchArraySearch['DESCRIPTION'],$keyword)?> 
                        	<a href="report-detail-no-sidemenu.php?id=<?=$fetchArraySearch['ID'];?> "><span class='italic text-orange'>read more</span></a>
                        	
                        </p> -->
                    </section>
                   <?php } 
      ?>
                   <div class="grid_12" id="page-num">
                    <ul class="left">

					<?php		
					 echo pagination($limit,$page,"advance-search-result.php?keyword=$keyword&categoryID=$categoryID&year=$year&page=",$Num_Rows); //call function to show pagination
					?>		
                    </ul>
					</div><!--end page-num -->
                    <?php }?>
              </div><!--end advancesearch-year -->
             
        </div><!--end content-middle -->
    	</div><!--end container_12 -->
    </div><!--end content -->
<?php include("include/footer.php");?>