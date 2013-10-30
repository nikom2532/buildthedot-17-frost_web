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
	
	$(document).ready(function() {

  //The demo tag array
  var availableTags = <?=$tagResult?>;
   $("#submitTags").click(function(){
        $("#tagName").html('The value is :: '+$("input#text").val());
    }); 
  //The text input
  var input = $("input#text");
    
  //The tagit list
  var instance = $("<ul class=\"tags\"></ul>");
    
  //Store the current tags
  //Note: the tags here can be split by any of the trigger keys
  //      as tagit will split on the trigger keys anything passed  
  var currentTags = input.val();
    
  //Hide the input and append tagit to the dom
  input.hide().after(instance);
    
  //Initialize tagit
  instance.tagit({
    tagSource:availableTags,
    tagsChanged:function () {
                                        
        //Get the tags            
      var tags = instance.tagit('tags');
      var tagString = [];
                            
      //Pull out only value
      for (var i in tags){
        tagString.push(tags[i].value);
      }
        
      //Put the tags into the input, joint by a ','
      input.val(tagString.join(','));
    }
  });
    
  //Add pre-loaded tags to tagit
  instance.tagit('add', currentTags);
});
</script>