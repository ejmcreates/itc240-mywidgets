<?php include 'includes/config.php';?>
<?php 
   if(isset($_GET['day'])){//if day is passed via GET, show $day's coffee
        $today = $_GET['day'];
        
    }else{//if today, shows $today's coffee
        $today = date('l');
   }

switch($today){
        
    case 'Monday':
        $cheese = "Goat";
        $photo = 'goat.jpg';
        $alt = 'yummy goat cheese';
        
    break;   

    case 'Tuesday':
        $cheese = "Cheddar";
        $photo = 'cheddar.jpg';
        $alt = 'yummy cheddar cheese';
        
    break;         
        
    case 'Wednesday':
        $cheese = "Parmesan";
        $photo = 'parmesan.jpg';
        $alt = 'yummy parmesan';
        
    break;     
        
    case 'Thursday':
        $cheese = "Stilton";
        $photo = 'stilton.jpg';
        $alt = 'yummy stilton';
        
    break;     
        
    case 'Friday':
        $cheese = "Brie";
        $photo = 'brie.jpg';
        $alt = 'yummy brie cheese';
        
    break;    
        
    case 'Saturday':
        $cheese = "Manchego";
        $photo = 'manchego.jpg';
        $alt = 'yummy manchego';
        
    break;  
        
    case 'Sunday':
        $cheese = "Mozzarella";
        $photo = 'mozzarella.jpg';
        $alt = 'yummy mozzarella';
        
    break;
                
}

?>
<?php get_header()?>

<p><?=$today?>'s Special is <?=$cheese?></p>

<img src="img/<?=$photo?>" alt="Our <?=$cheese?> tastes great on a Fall Day!" id="cheese" />

<p><a href="daily.php?day=Sunday">Sunday</a></p>
<p><a href="daily.php?day=Monday">Monday</a></p>
<p><a href="daily.php?day=Tuesday">Tuesday</a></p>
<p><a href="daily.php?day=Wednesday">Wednesday</a></p>
<p><a href="daily.php?day=Thursday">Thursday</a></p>
<p><a href="daily.php?day=Friday">Friday</a></p>
<p><a href="daily.php?day=Saturday">Saturday</a></p>


<p><a href="daily.php">Back to Today</a></p>

        

<?php get_footer()?>