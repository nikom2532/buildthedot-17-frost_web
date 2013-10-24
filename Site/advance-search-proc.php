<?php 

$keyword = $_GET['keyword'];
$categoryID = $_GET['category_id'];
$year = $_GET['year'];

if(!empty($keyword)){//if keyword set goes here
	$queried = mysql_real_escape_string($keyword); // always escape	
	$keys = explode(" ",$queried);
	$strQuery = "SELECT * FROM PDF WHERE LOWER(NAME) LIKE LOWER('%$queried%') OR LOWER(DESCRIPTION) LIKE LOWER('%$queried%') ";
	foreach($keys as $k){
	    $strQuery .= " OR LOWER(NAME) LIKE LOWER('%$k%') OR LOWER(DESCRIPTION) LIKE LOWER('%$k%')";
		//$strQuery .="UNION (select * from PDF p inner join TAG_RELATIONSHIP tr on p. = t.id where B.tag = 'chair')";
	}
	//echo $strQuery;
   //$strQuery = "SELECT * FROM PDF WHERE LOWER(NAME) LIKE LOWER('%$keyword%') OR LOWER(DESCRIPTION) LIKE LOWER('%$keyword%') OR YEAR(UPDATE_DATE)= '$keyword' ";
   if(!empty($categoryID)){
     $strQuery .= "AND GROUP_LEVEL1 = '$categoryID'";
   }
   if(!empty($year)){
     $strQuery .= "OR YEAR(UPDATE_DATE)= '$year'";
   }
}

else if (!empty($categoryID)){ //if keyword not set but category set then goes here
  $strQuery = "SELECT * FROM PDF WHERE GROUP_LEVEL1 = '$categoryID' ";
  if(!empty($year)){
    $strQuery .= "AND YEAR(UPDATE_DATE)= '$year'";
  }
}else if(!empty($year)){//if only year set goes here
  $strQuery = "SELECT * FROM PDF WHERE YEAR(UPDATE_DATE)= '$year'";
}
/*---------Paging------------*/
$page=1;//Default page
$limit=10;//Records per page
$start=0;//starts displaying records from 0
if(isset($_GET['page']) && $_GET['page']!=''){
$page=$_GET['page'];
}
$start=($page-1)*$limit;
/*---------end Paging------------*/

$cmdQuerySearch =  mysql_query($strQuery);
$Num_Rows = mysql_num_rows($cmdQuerySearch);

//$strQuery .= "LIMIT $Page_Start , $Per_Page";
$strQuery .= "LIMIT $start , $limit";
$cmdQuerySearch =  mysql_query($strQuery);
//echo "$strQuery";
?>