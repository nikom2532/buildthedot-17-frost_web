<?php include("include/header.php");?>
<?php include("include/top-menu.php");?>
	<div id="content">
    	<div class="container_12" id="container">
        <div id="content-middle" class="grid_12">

       	  		<h1 id="head-title" class="text-green grid_12">Advanced Search</h1>
          	
        		<form action="#" method="POST" id="advancesearch-form" class="fr">
                <div class="grid_5">
                     <input type="text" id="search-keyword" class="" placeholder="Keyword.." />
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

                      <select id="category">
                            <option selected="selected">Select a category</option>
                      <?php while($fetchArray=mysql_fetch_array($cmdQuery)){

                      ?>
                            <option value="<?=$fetchArray['NAME']?>">
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
                      <select id="year">
                            <option selected="selected">Select a year</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2011">2012</option>
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
              <div id="advancesearch-result">
              		<h2 class="text-lightgreen2 grid_12">Search results</h1>
              		<section class="grid_11">
                    	<h3>Benchmarking Technology's Effect On Employee Engagement</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    </section>
                    <section class="grid_11">
                    	<h3>Benchmarking Technology's Effect On Employee Engagement</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    </section>
                    <section class="grid_11">
                    	<h3>Benchmarking Technology's Effect On Employee Engagement</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    </section>
                    <section class="grid_11">
                    	<h3>Benchmarking Technology's Effect On Employee Engagement</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    </section>
                    <section class="grid_11">
                    	<h3>Benchmarking Technology's Effect On Employee Engagement</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    </section>
                   <div class="grid_12" id="page-num">
                    <ul class="left">
                        <li class="active-page">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">5</a>
                        </li>
                        <li>
                            <a href="#">6</a>
                        </li>
                        <li>
                            <a href="#">7</a>
                        </li>
                        <li>
                            <a href="#">8</a>
                        </li>
                        <li>
                            <a href="#">></a>
                        </li>
                         <li>
                            <a href="#">>></a>
                        </li>
                    </ul>
			</div>
                    
              </div>
        </div><!--end content-middle -->
    	</div><!--end container_12 -->
    </div><!--end content -->
<?php include("include/footer.php");?>