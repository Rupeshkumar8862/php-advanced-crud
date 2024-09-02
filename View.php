

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    
<?php 

$conn=mysqli_connect("localhost","root","","test") or die(mysqli_errno($conn));

if($_GET['Vid']!='')
{
    $sqlfetchbyid="SELECT *FROM youtubecrud where contact_id ='".$_GET['Vid']."'";
    $runfetchbyid=mysqli_query($conn,$sqlfetchbyid) or die(mysqli_errno($conn));
    $Viewdata=mysqli_fetch_assoc($runfetchbyid);
    // echo '<pre>'; print_r($Viewdata);    echo '</pre>';
}

?>

<div class="container m-5">
    <div class="col-5">
        <div class="row">
            <div class="card-header">
                <h1>Single DATA</h1>
            </div>
            <div class="card-body">
                <p> <b>NAME:</b> <?php echo $Viewdata['contact_name']?> </p>
                <p> <b>Adress:</b><?php echo $Viewdata['contact_address']?> </p>
             
            </div>
        </div>
    </div>
</div>
</body>
</html>