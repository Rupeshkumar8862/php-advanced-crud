<?php if(isset($_POST['searchbtn'])) {
    $search=$_POST['search'];
    echo $sqlsearh="SELECT *FROM youtubecrud WHERE 
    contact_id LIKE '%$search%' or contact_name LIKE '%$search%'
                                or contact_gender LIKE '%$search%'
                                or contact_address LIKE '%$search%'";
    $runsearch= mysqli_query($conn,$sqlsearh)or die(mysqli_errno($conn));}