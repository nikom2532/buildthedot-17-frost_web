<?php include("include/header.php");?>	
<?php include("include/checksession.php");?>	
<?php
	$result = mysql_query("
	SELECT t.ID AS id, t.NAME AS name
	FROM TAG t 
	");
	/*
	$numRow = mysql_num_rows($result);
	if(mysql_num_rows($result)){
		$tagResult =  '[';
		$counter = 0;
		while ($row = mysql_fetch_array($result)) {
			 if (++$counter == $numRow) {
		         $tagResult .= "'".$row['name']."'";
		    } else {
		         $tagResult .= "'".$row['name']."'".", ";	
		    	}
			
		}
		$tagResult .= ']';
	}
	echo $tagResult;
	 * 
	 */
	 
	 $rows = array();
	while($row = mysql_fetch_assoc($result)) {
	$rows[] = $row;
	}
	echo json_encode($rows);
?>


<script>
	function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getGLv2(gLv1Id) {		
		var strURL="getLv2.php?gLv1Id="+gLv1Id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('gLv2Div').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
	}
	function getGLv3(gLv2Id) {		
		var strURL="getLv3.php?gLv2Id="+gLv2Id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('gLv3Div').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
	}
	function getGLv4(gLv3Id) {		
		var strURL="getLv4.php?gLv3Id="+gLv3Id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('gLv4Div').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
	}
	function getGLv5(gLv4Id) {		
		var strURL="getLv5.php?gLv4Id="+gLv4Id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('gLv5Div').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
	}
	
	$(function(){
		var sampleTags = <?=$tagResult;?>
		//
		//-------------------------------
		// Minimal
		//-------------------------------
		$('#myTags').tagit();

		//-------------------------------
		// Single field
		//-------------------------------
		$('#singleFieldTags').tagit({
			availableTags: sampleTags,
			// This will make Tag-it submit a single form value, as a comma-delimited field.
			singleField: true,
			singleFieldNode: $('#mySingleField')
		});

		// singleFieldTags2 is an INPUT element, rather than a UL as in the other 
		// examples, so it automatically defaults to singleField.
		$('#singleFieldTags2').tagit({
			availableTags: sampleTags
		});

		//-------------------------------
		// Preloading data in markup
		//-------------------------------
		$('#myULTags').tagit({
			availableTags: sampleTags, // this param is of course optional. it's for autocomplete.
			// configure the name of the input field (will be submitted with form), default: item[tags]
			itemName: 'item',
			fieldName: 'tags'
		});

		//-------------------------------
		// Tag events
		//-------------------------------
		var eventTags = $('#eventTags');

		var addEvent = function(text) {
			$('#events_container').append(text + '<br>');
		};

		eventTags.tagit({
			availableTags: sampleTags,
			beforeTagAdded: function(evt, ui) {
				if (!ui.duringInitialization) {
					addEvent('beforeTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
				}
			},
			afterTagAdded: function(evt, ui) {
				if (!ui.duringInitialization) {
					addEvent('afterTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
				}
			},
			beforeTagRemoved: function(evt, ui) {
				addEvent('beforeTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
			},
			afterTagRemoved: function(evt, ui) {
				addEvent('afterTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
			},
			onTagClicked: function(evt, ui) {
				addEvent('onTagClicked: ' + eventTags.tagit('tagLabel', ui.tag));
			},
			onTagExists: function(evt, ui) {
				addEvent('onTagExists: ' + eventTags.tagit('tagLabel', ui.existingTag));
			}
		});

		//-------------------------------
		// Read-only
		//-------------------------------
		$('#readOnlyTags').tagit({
			readOnly: true
		});

		//-------------------------------
		// Tag-it methods
		//-------------------------------
		$('#methodTags').tagit({
			availableTags: sampleTags
		});

		//-------------------------------
		// Allow spaces without quotes.
		//-------------------------------
		$('#allowSpacesTags').tagit({
			availableTags: sampleTags,
			allowSpaces: true
		});

		//-------------------------------
		// Remove confirmation
		//-------------------------------
		$('#removeConfirmationTags').tagit({
			availableTags: sampleTags,
			removeConfirmation: true
		});

	});
</script>

<?php
$pdfId = $_POST['pdfId'];
//echo $pdfId ;
?>
<?php include("include/top-bar.php");?>	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="left">
				<li><a href="main.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="customer.php">Customer Management</a></li>
				<li><a href="pdf.php" class="active-tab">PDF Management</a></li>
                <li><a href="tag.php">Tag Management</a></li>
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
					
						<h3 class="fl">Edit PDF</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						
							<form action="edit-pdf-proc.php" method='POST' name="editpdf" id="editpdf">
								<?php 
								$result = mysql_query("
								SELECT p.ID AS id, 
								p.NAME AS name,
								p.DESCRIPTION AS description,
								p.PRICE AS price,
								p.UPDATE_DATE AS updateDate
								FROM PDF AS p 
								INNER JOIN PDF_CATEGORY AS c
								ON c.PDF_ID = p.ID
								WHERE p.ID = $pdfId AND p.IS_ASIAN_COUNTRY = '0'
								");

								while ($row = mysql_fetch_array($result)) {
								?>
								<fieldset>
								
									<p>
										<label for="title">Title</label>
										<input type="text" id="name" class="round full-width-input" value="<?=$row['name'];?>"/>
									</p>
									
									<p>
										<label for="description">Description</label>
										<textarea id="description" class="round full-width-textarea" ><?=$row['description'];?></textarea>
									</p>
	
									<p>
										<label for="price">Price</label>
										<input type="text" id="price" class="round full-width-input" value="<?=$row['price'];?>"/>
									</p>
									
								</fieldset>
							
							</form>
						
						</div> <!-- end half-size-column -->
						
						<div class="half-size-column fr">
						
							<form action="edit-pdf-proc.php" method='POST' name="editpdf" id="editpdf">
							
								<fieldset>
	
									<p class="form-error-input">
										
										<div id="gLv1Div">
											<label for="group-name">Group level 1</label>
	
											<?php
												$sqlLv1 = "SELECT * FROM GROUP_LV1";
												$resultLv1 = mysql_query($sqlLv1);
											?>
									
											<select name="group-name" onchange="getGLv2(this.value)">
												<?php
												echo "<option value=''>--Select Menu--</option>";
												while ($rowLv1 = mysql_fetch_array($resultLv1)) {
													echo "<option value='" . $rowLv1['ID'] . "'>" . $rowLv1['NAME'] . "</option>";
												}
												?>
											</select>
										</div>
										
										<div id="gLv2Div">
											<label for="group-name">Group level 2</label>
	
											<select name="gLv2Div">
												<option>--Select Menu--</option>
									        </select>
										</div>
										
										<div id="gLv3Div">
											<label for="group-name">Group level 3</label>
	
											<select name="gLv3Div">
												<option>--Select Menu--</option>
									        </select>
										</div>
										
										<div id="gLv4Div">
											<label for="group-name">Group level 4</label>
	
											<select name="gLv4Div">
												<option>--Select Menu--</option>
									        </select>
										</div>
										
										<div id="gLv5Div">
											<label for="group-name">Group level 5</label>
	
											<select name="gLv5Div">
												<option>--Select Menu--</option>
									        </select>
										</div>
									</p>
									
                                    <p class="form-error-input">
                                    	<label for="tag">Tags</label>
										
                                        <ul id="singleFieldTags">
                                            <!-- Existing list items will be pre-added to the tags. -->
                                            
                                        </ul>
                                        <input name="tag" id="mySingleField" value="" type="hidden">
                                    </p>
                                    <p class="form-error-input">
                                        <label for="uploadfile">Upload File</label>
                                        <input type="file" />
                                	<p>

	
									<input type="submit" value="Save change" class="round blue ic-right-arrow" />
                                    
									
								</fieldset>
							<?php }?>
							</form>
							
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
				
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>