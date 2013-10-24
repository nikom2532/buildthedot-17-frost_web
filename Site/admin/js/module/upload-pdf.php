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