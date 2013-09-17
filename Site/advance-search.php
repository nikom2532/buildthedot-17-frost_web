<?php include("include/header.php");?>
<?php include("include/top-menu.php");?>
	<div id="content">
    	<div class="container_12" id="container">
        <div id="content-middle" class="grid_12">

       	  		<h1 id="head-title" class="text-green grid_12">Advanced Search</h1>
          	
        		<form action="advance-search-result.php" method="GET"  id="search" class="fr">
                <div class="grid_5">
                     <input type="text" id="keyword" name="keyword" placeholder="Keyword.." />
                </div>
                <div class="grid_6" id="advancesearch-kw">
                	 <p>Result include one or more of the words</p>
                </div>
                <br class="clear"/>
                               
                <div class="grid_5">
        	    <?php
            		$strSQL = "SELECT * FROM  group_lv1 ORDER BY ID ";
					$cmdQuery =  mysql_query($strSQL);
					
		        ?>        

                      <select id="category_id" name="category_id">
                            <option selected="selected" value="">Select a category</option>
                      <?php while($fetchArray=mysql_fetch_array($cmdQuery)){

                      ?>
                            <option value="<?=$fetchArray['ID']?>">
		                    <?=$fetchArray['NAME']?>
		                    </option>
		          <?php } ?>
                      </select>
                </div>
                <div class="grid_6" id="advancesearch-cat">
                	   <p>Result include selected category</p>
                </div>
                <br class="clear"/>   
				 <div class="grid_5">
                      <select id="year" name="year">
                            <option selected="selected" value="">Select a year</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                        </select>
                </div>
                <div class="grid_6" id="advancesearch-year">
                	     <p>Result include in range of year</p>
                </div>
                <br class="clear"/>
                <div class="grid_5">
                	<input type="submit" value="Search" class="button orange image-right ic-search"/>
                </div>
              </form>
              <br class="clear"/>
              
              </div>
        </div><!--end content-middle -->
    	</div><!--end container_12 -->
    </div><!--end content -->
<?php include("include/footer.php");?>