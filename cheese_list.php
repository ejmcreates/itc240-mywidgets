<?php
//customer_list.php - shows a list of customer data
require 'includes/config.php';
require 'includes/Pager.php'; #allows pagination
?>

<?php
$config->loadhead .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

get_header();

$sql = "select * from CheeseInventory";

$prev = '<i class="fa fa-chevron-circle-left"></i>';
$next = '<i class="fa fa-chevron-circle-right"></i>';

//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

# Create instance of new 'pager' class
$myPager = new Pager(10,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset

if(mysqli_num_rows($result) > 0)
{//show records
    echo $myPager->showNAV();//show pager if enough records 
	if($myPager->showTotal()==1){$itemz = "customer";}else{$itemz = "customers";}  //deal with plural
    echo '<p align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</p>';
    
    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo 'Cheese: <b>' . $row['Name'] . '</b> ';
        echo 'Price: <b>$' . $row['Price'] . '</b> ';
        echo 'Style: <b>' . $row['Style'] . '</b> ';
        
        echo '<a href="cheese_view.php?id=' . $row['CheeseID'] . '">' . $row['Name'] . '</a>';
        
        echo '</p>';
    } 
    
    echo $myPager->showNAV();//show pager if enough records

}else{//inform there are no records
    echo '<p>There are currently no customers</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>