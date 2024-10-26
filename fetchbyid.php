<?php 
// notes search by id and fetch all data (ek button me click krke id fetch kie uske bad id se all data show kie )
$conn=mysqli_connect("localhost","root","","test") or die(mysqli_errno($conn));
?>
<form class="post-form" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
      <div class="form-group">
           <label for="">ID</label>
           <input type="text" name="fetid">

      </div>
    <input type="submit" name="showbtn" value="show" />
</form>
<?php 
if(isset($_POST['showbtn'])){
    $fetid=$_POST['fetid'];

    $sql="SELECT *FROM youtubecrud WHERE contact_id={$fetid}";
    $result=mysqli_query($conn,$sql) or die("connection unsuccessful");
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            echo '<table border="1" width="100%">
            <tr>
            <th>NAME</th>
            <th>GENDER</th>
            <th>ADDRESS</th>
            </tr>
            <tr>
       <td> '.$row['contact_name'].'</td>
       <td> '.$row['contact_gender'].'</td>
       <td> '.$row['contact_address'].'</td>
            </tr>
            </table>';
        }
    }
}

?>

