<?php include("include/header.php");?>	
<?php include("include/checksession.php");?>
<?php
	$result = mysql_query("
	SELECT t.ID AS id, t.NAME AS name
	FROM TAG t 
	");
	
	
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
	 
	$rows = array();
	while($row = mysql_fetch_assoc($result)) {
	$rows[] = $row;
	}
	echo json_encode($rows);
?>
	
<script>

	var oldSelected2=-1;
	var oldSelected3=-1;
	var oldSelected4=-1;
	var oldSelected5=-1;
	
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
		
		if (oldSelected2 == -1) {
			oldSelected2 = gLv1Id;
		}
		
		if (gLv1Id == 0) {
			document.getElementById('gLv2Div').style.visibility = 'hidden';
			document.getElementById('gLv3Div').style.visibility = 'hidden';
			document.getElementById('gLv4Div').style.visibility = 'hidden';
			document.getElementById('gLv5Div').style.visibility = 'hidden';
		} else{
			
			var strURL="getLv2.php?gLv1Id="+gLv1Id;
			var req = getXMLHTTP();
		
			if (oldSelected2 != gLv1Id) {
				document.getElementById('gLv3Div').style.visibility = 'hidden';
				document.getElementById('gLv4Div').style.visibility = 'hidden';
				document.getElementById('gLv5Div').style.visibility = 'hidden';
			} else {
				document.getElementById('gLv2Div').style.visibility = 'visible';	
			}
			
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
			
			oldSelected2 = gLv1Id;	
		};	
	}
	
	function getGLv3(gLv2Id) {		
		
		if (oldSelected3 == -1) {
			oldSelected3 = gLv2Id;
		}
		
		if (gLv2Id == 0) {
			document.getElementById('gLv3Div').style.visibility = 'hidden';
			document.getElementById('gLv4Div').style.visibility = 'hidden';
			document.getElementById('gLv5Div').style.visibility = 'hidden';
			
		} else{
			
			var strURL="getLv3.php?gLv2Id="+gLv2Id;
			var req = getXMLHTTP();
		
			if (oldSelected3 != gLv2Id) {
				document.getElementById('gLv4Div').style.visibility = 'hidden';
				document.getElementById('gLv5Div').style.visibility = 'hidden';
			} else {
				document.getElementById('gLv2Div').style.visibility = 'visible';
				document.getElementById('gLv3Div').style.visibility = 'visible';
			}
			
			
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
			
			oldSelected3 = gLv2Id;
		}
	}
	function getGLv4(gLv3Id) {		
		
		if (oldSelected4 == -1) {
			oldSelected4 = gLv3Id;
		}
		
		if (gLv3Id == 0) {
			document.getElementById('gLv4Div').style.visibility = 'hidden';
			document.getElementById('gLv5Div').style.visibility = 'hidden';
		} else{
			
			var strURL="getLv4.php?gLv3Id="+gLv3Id;
			var req = getXMLHTTP();
			
			if (oldSelected4 != gLv3Id) {
				document.getElementById('gLv5Div').style.visibility = 'hidden';
			} else {
				document.getElementById('gLv2Div').style.visibility = 'visible';
				document.getElementById('gLv3Div').style.visibility = 'visible';
				document.getElementById('gLv4Div').style.visibility = 'visible';
			}
			
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
			oldSelected4 = gLv3Id;
		}
	}
	function getGLv5(gLv4Id) {	
		
		if (oldSelected5 == -1) {
			oldSelected5 = gLv4Id;
		}
		
		if (gLv1Id == 0) {
			document.getElementById('gLv5Div').style.visibility = 'hidden';
		} else{
				
			var strURL="getLv5.php?gLv4Id="+gLv4Id;
			var req = getXMLHTTP();
		
			if (oldSelected5 != gLv4Id) {
				
				
			} else {
				
				document.getElementById('gLv2Div').style.visibility = 'visible';
				document.getElementById('gLv3Div').style.visibility = 'visible';
				document.getElementById('gLv4Div').style.visibility = 'visible';
				document.getElementById('gLv5Div').style.visibility = 'visible';
				
			}
			
			
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
			oldSelected5 = gLv4Id;
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
					
						<h3 class="fl">Upload PDF</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					<form action="upload-pdf-proc.php" method='POST' name="editpdf" id="editpdf">
						
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						
								<fieldset>
								
									<p>
										<label for="title">Title</label>
										<input type="text" id="name" class="round full-width-input" />
									</p>
									
									<p>
										<label for="description">Description</label>
										<textarea id="description" class="round full-width-textarea"></textarea>
									</p>
	
									<p>
										<label for="price">Price</label>
										<input type="text" id="price" class="round full-width-input" />
                                        <em>Price in Thai Baht</em>								
									</p>
									
									<p>
										<label for="asian">Asian country</label>
										<input type="radio" name="asian" id="asian" value="0" checked> No<br>
										<input type="radio" name="asian" id="asian" value="1"> Yes<br>							
									</p>
									
									
									
								</fieldset>
							<input type="submit" value="Save" class="round blue ic-right-arrow" />
						</div> <!-- end half-size-column -->
						
						<div class="half-size-column fr">
							
								<fieldset>
	
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

									<p class="form-error-input">
										
										<div id="gLv1Div">
											<label for="group-name">Group level 1</label>
	
											<?php
												$sqlLv1 = "SELECT * FROM GROUP_LV1";
												$resultLv1 = mysql_query($sqlLv1);
											?>
									
											<select name="gLv1" onchange="getGLv2(this.value)">
												<?php
												echo "<option value='0'>--Select Menu--</option>";
												while ($rowLv1 = mysql_fetch_array($resultLv1)) {
													echo "<option value='" . $rowLv1['ID'] . "'>" . $rowLv1['NAME'] . "</option>";
												}
												?>
											</select>
										</div>
										
										<div id="gLv2Div">
											
										</div>
										
										<div id="gLv3Div">
											
										</div>
										
										<div id="gLv4Div">
											
										</div>
										
										<div id="gLv5Div">
											
										</div>
									</p>
									
								</fieldset>
							
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->
					</form>
				</div> <!-- end content-module -->
				
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>