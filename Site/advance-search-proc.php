<?php 

$keyword = $_GET['keyword'];
$categoryID = $_GET['category_id'];
$year = $_GET['year'];
// echo $keyword. "<br/>";
// echo $categoryID. "<br/>";
// echo $year. "<br/>";

$strQuery = "";

if(!empty($keyword)){//if keyword set goes here
   $strQuery = "SELECT * FROM PDF WHERE NAME LIKE '%$keyword%' OR YEAR(UPDATE_DATE)= '$keyword' ";
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
$limit=2;//Records per page
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
echo "$strQuery";
?>