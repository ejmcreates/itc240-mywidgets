<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:customer_list.php');
}


$sql = "select * from CheeseInventory where CheeseID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $Cheese = stripslashes($row['Name']);
        $Price = stripslashes($row['Price']);
        $Style = stripslashes($row['Style']);
        $Desc = stripslashes($row['Description']);
        $title = "Detail Page for " . $Cheese;
        $pageHeader = $Cheese;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This customer does not exist</p>';
}

?>
<?php get_header()?>
<?php
    
    
if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo 'Cheese: <b>' . $Cheese . '</b> ';
    echo 'Price: <b>$' . $Price . '</b> ';
    echo 'Style: <b>' . $Style . '</b> ';
    echo '<p>Description: <b>' . $Desc . '</b> </p>';
    
    echo '<img src="uploads/cheese' . $id . '.jpg" />';
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="cheese_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>