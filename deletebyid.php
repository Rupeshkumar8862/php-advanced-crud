<?php 
// DELETE BY id  )
$conn=mysqli_connect("localhost","root","","test") or die(mysqli_errno($conn));
?>
<form class="post-form" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
      <div class="form-group">
           <label for="">DELETE BY ID</label>
           <input type="text" name="delbyid">

      </div>
    <input type="submit" name="showbtn" value="DELETE" />
</form>
<?php 
if(isset($_POST['showbtn'])){
    $fetid=$_POST['delbyid'];
    $sql="DELETE FROM youtubecrud WHERE contact_id={$fetid}"; 
    $result=mysqli_query($conn,$sql) or die("connection unsuccessful");

    // $sql2="SELECT *FROM youtubecrud WHERE contact_id={$fetid}";
    // $result2=mysqli_query($conn,$sql2) or die("connection unsuccessful");
    // $data=mysqli_fetch_assoc($result2) or die("falied query");

    // if($result){
    //     echo "delete your id data".$data['contact_id'];
    // }
    mysqli_close($conn);
   
    }


?>

