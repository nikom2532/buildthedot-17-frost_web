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
	echo $tagResult;
?>
	
<script>
	$(function(){
		var sampleTags = <?=$tagResult;?>

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
					
					
					<div class="content-module-main cf">
				
						<div class="half-size-column fl">
						
							<form action="edit-pdf-proc.php" method='POST' name="editpdf" id="editpdf">
							
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
									
								</fieldset>
						
						</div> <!-- end half-size-column -->
						
						<div class="half-size-column fr">
						
							<!-- <form action="#"> -->
							
								<fieldset>
	
									<p class="form-error-input">
										<label for="group-name">Group</label>
	
										<select id="group-name">
											<option value="default">Select Gruop</option>
                                            <option value="market">Market</option>
                                            <option value="knowledge">Knowledge</option>
										</select>
									</p>
                                    <p class="form-error-input">
										<label for="cat-name">Category</label>
	
										<select id="group-name">
											<option value="default">Select Category</option>
                                            <option value="research-thailand">Research Thailand</option>
                                            <option value="global-trend">Global Trend</option>
										</select>
									</p>
                                    <p class="form-error-input">
                                    	<label for="tag">Tags</label>
	
                                        <ul id="singleFieldTags">
                                            <!-- Existing list items will be pre-added to the tags. -->
                                        </ul>
                                    </p>
                                    <p class="form-error-input">
                                        <label for="uploadfile">Upload File</label>
                                        <input type="file" />
                                	<p>

	
									<input type="submit" value="Save change" class="round blue ic-right-arrow" />
                                    
                                 
									
								</fieldset>
							
							</form>
							
						</div> <!-- end half-size-column -->
				
					</div> <!-- end content-module-main -->
					
				</div> <!-- end content-module -->
				
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

<?php include("include/footer.php");?>