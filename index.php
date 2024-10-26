<style>
    *{
        background-color: aquamarine;
    }
</style>
<?php
error_reporting(0);
$conn=mysqli_connect("localhost","root","","test") or die(mysqli_errno($conn));
// delete
if($_GET['del']){
 $sqldelete="DELETE FROM youtubecrud where contact_id = '".$_GET['del']."'";
 $runsqldelete=mysqli_query($conn,$sqldelete) or die(mysqli_error($conn));
if($runsqldelete){
    echo '<script> alert("data deleted successfully")</script>';
    ?>
    <meta http-equiv="refresh" content="4; url=index.php">
  <?php }}
// insert
if(isset($_POST['save'])){
if($_POST['contact_id']==''){
    // if(!empty($name)  && !empty($gender) && !empty($address)){
 // echo '<pre>';  print_r($_POST);echo '</pre>';
$sqlinsert="INSERT INTO youtubecrud (contact_name,contact_gender,contact_address) VALUES('".$_POST["name"]."','".$_POST["gender"]."','".$_POST['address']."')";
$runsql=mysqli_query($conn,$sqlinsert) or die("query failedd");
if($runsql){
    echo '<script> alert("data inserted successfully")</script>';
    ?>
    <meta http-equiv="refresh" content="4; url=index.php">
  <?php }}
else{
    // echo '<script> alert("All field are required")</script>';
} }
// fetch by id
if($_GET['uid']!='')
{
    $sqlfetchbyid="SELECT *FROM youtubecrud where contact_id ='".$_GET['uid']."'";
    $runfetchbyid=mysqli_query($conn,$sqlfetchbyid) or die(mysqli_errno($conn));
    $editdata=mysqli_fetch_assoc($runfetchbyid);  // assoc
    //$editdata=mysqli_fetch_all($runfetchbyid);// multi demi assoc
    //  echo '<pre>';  print_r($editdata);echo '</pre>';
    // single data access // echo $editdata['contact_name']."<br>"; // echo $editdata['contact_gender']."<br>";// echo $editdata['contact_address']."<br>";
}
//update
// if(isset($_POST['save'])){
    if($_POST['contact_id']!=''){
         $sqlupdate="UPDATE youtubecrud SET contact_name='".$_POST['name']."',contact_gender='".$_POST['gender']."',contact_address='".$_POST['address']."' WHERE contact_id= '".$_POST['contact_id']."'";

         $runupdate=mysqli_query($conn,$sqlupdate) or die(mysqli_error($conn));
         if($runupdate){
            echo '<script> alert("data updated successfully")</script>';
            ?><meta http-equiv="refresh" content="4; url=index.php"><?php   } }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact From</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST"> 
   <div class="contatiner m-5">
    <div class="row ">
        <div class="col-5">
            <div class="header-title">
                <h1 style="text-decoration:underline;text-transform:uppercase;color:blue">Complete Php project</h1>
            </div>
            <div class="card-body">
            <div class="form-group">
        <label for="name">Name</label>
        <input type="hidden" name="contact_id" value="<?php echo $_GET['uid']?>">
        <input type="text" class="form-control"  value="<?php  echo $editdata['contact_name']?>"  name="name" placeholder="Enter your name">
    </div><br>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" name="gender">
            <option value="Male" <?php  if("male"==$editdata['contact_gender']) echo 'selected="selected"';?>>Male</option>
            <option value="Female"  <?php if("Female"==@$editdata['contact_gender']) echo 'selected="selected"';?> >Female</option>
            <option value="other" <?php  if("Other"==@$editdata['contact_gender'])    echo 'selected="selected"'; ?> >  Other</option>
        </select>
    </div><br>
    <div class="form-group">
        <label for="address">Address</label>
        <textarea class="form-control" name="address" rows="3" placeholder="Enter your address"><?php  echo $editdata['contact_name']?></textarea>
    </div><br>
    <button type="submit" name="save" class="btn btn-primary">Submit</button>
</form></div></div></div> </div>
   <?php 
if(@$_GET['search']!='')
$search=$_GET['search'];
$sqlsearh="";
$sqlsearh="WHERE contact_name LIKE '%$search%' or contact_gender LIKE '%$search%' or contact_address LIKE '%$search%'"; ?>
   <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <form class="d-flex" role="search" method="GET">
      <input class="form-control me-2" type="search" name="search" placeholder="search" aria-label="Search" value="<?php echo @$_GET['search'] ?>">
      <button class="btn btn-outline-dark" type="submit" name="searchbtn">Search</button>
    </form></div></nav>

     <table class="table table-bordered-bg-secondary">
        <tr>
            <th>#</th> <th>ID</th> <th>NAME</th><th>Gender</th><th>Address</th> <th>Operation</th>
        </tr> 
   <?php 
   $limit=2;
   if(isset($_GET['page'])){$_GET['page'];}else{$_GET['page']=1;}
   $offset=($_GET['page']-1)*$limit;
   $sqlselectalldata= "SELECT *FROM youtubecrud {$sqlsearh} ORDER BY contact_id DESC LIMIT {$offset},{$limit}";
   $runsqlselectdata=mysqli_query($conn,$sqlselectalldata) or die(mysqli_connect_error());  
   if(mysqli_num_rows($runsqlselectdata)>0){
    // $editdata=mysqli_fetch_assoc($runsqlselectdata); echo '<pre>'; print_r($editdata);    echo '</pre>';
    // $editdata=mysqli_fetch_all($runsqlselectdata);  echo '<pre>'; print_r($editdata);    echo '</pre>';die();
    $abc=1;
    // echo 'Row Found';
    foreach($runsqlselectdata as $value){
       // echo '<pre>'; print_r($value);    echo '</pre>';
       echo '<tr>
          <td> '.$abc++.'</td>
          <td> '.$value["contact_id"].'</td>
          <td> '.$value["contact_name"].'</td>
          <td> '.$value["contact_gender"].'</td>
          <td> '.$value["contact_address"].'</td>
          <td> <a href="index.php?uid='.$value["contact_id"].'" class="btn btn-primary" >Edit</a>
          <a href="index.php?del='.$value["contact_id"].'" class="btn btn-danger">DELETE</a>
          <a href="View.php?Vid='.$value["contact_id"].'" class="btn btn-success">View</a></td> </tr>'; ?><?php } }
          else{echo '<tr><td colspan="10">NO ROW FOUND</td> </tr>';}
?> </table>   
<?php 
echo '<nav aria-label="Page navigation example">
      <ul class="pagination">';
      if($_GET['page']>1){
      echo ' <li class="page-item"><a class="page-link" href="index.php?page='.($_GET['page']-1).'">Previous</a></li>';}
$pagination="SELECT *FROM youtubecrud"; $runpagination=mysqli_query($conn,$pagination) or die(mysqli_errno($conn));
$total_record=mysqli_num_rows($runpagination);
$total_page=ceil($total_record/$limit);
$page=$_GET['page'];
for($i=1; $i<=$total_page; $i++){ 
if($i==$page) { $active="active";} else{$active="";}
echo '<li class="'.$active.'"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';}
 if($total_page>$page)
 echo '<li class="page-item"><a class="page-link" href="index.php?page='.($_GET['page']+1).'">Next</a></li>
</ul>
</nav>';
?>
</body>
</html>