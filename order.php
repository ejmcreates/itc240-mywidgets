<?php include 'includes/config.php';?>
<?php get_header()?>

<?php
    
  if(isset($_POST['Name'])){//show data
          
     $to      = 'elizabeth.jones2@seattlecentral.edu';
      $subject = 'Contact Form';
       $message = process_post();
      $replyTo = 'eljones.millson@gmail.com';
      $headers = 'From: noreply@elizajcreates.com' . PHP_EOL .
    'Reply-To: ' . $replyTo . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
  
      echo '<p>Thanks for contacting us!</p>
          <p><a href="">BACK</a></p>';
      
      
  }else{//show form
    echo '
     <form action="" method="post" name="sentMessage" id="contactForm">
     <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label><b>Name</b></label>
                <p class="help-block text-danger"></p>
                <input type="text" class="form-control" placeholder="Name" name="Name" id="name" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            
         <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label><b>Email</b></label>
                <p class="help-block text-danger"></p>
                <input type="email" class="form-control" placeholder="Email Address" name="Email" id="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label><b>Number of People</b></label>
                <p class="help-block text-danger"></p>
                <input type="radio" class="form-control" name="Coffee Amount" value="8-12 people" id="coffee" checked>8-12 people
                <p class="help-block text-danger"></p>
                <input type="radio" class="form-control" name="Coffee Amount" value="12-16 people" id="coffee">12-16 people
                <p class="help-block text-danger"></p>
                <input type="radio" class="form-control" name="Coffee Amount" value="16-20 people" id="coffee">16-20 people
                <p class="help-block text-danger"></p>
                <input type="radio" class="form-control" name="Coffee Amount" value="20-24 people" id="coffee">20-24 people
                <p class="help-block text-danger"></p>
              </div>
            </div>
            
             <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label><b>Pastries</b></label>
                <p class="help-block text-danger"></p>
                <input type="checkbox" class="form-control" name="Pastry" value="fruit danish" id="pastry">Fruit Danish
                <p class="help-block text-danger"></p>
                <input type="checkbox" class="form-control"   name="Pastry" value="croissant" id="pastry">Croissant
                <p class="help-block text-danger"></p>
                <input type="checkbox" class="form-control"   name="Pastry" value="coffee cake" id="pastry">Coffee Cake
                <p class="help-block text-danger"></p>
                <input type="checkbox" class="form-control"   name="Pastry" value="bagel" id="pastry">Bagel
                <p class="help-block text-danger"></p>
                <input type="checkbox" class="form-control"   name="Pastry" value="chocolate croissant" id="pastry">Chocolate Croissant
                <p class="help-block text-danger"></p>
                <input type="checkbox" class="form-control"   name="Pastry" value="assorted muffin" id="pastry">Assorted Muffin
                <p class="help-block text-danger"></p>
              </div>
            </div>
            
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label><b>Special Instructions</b></label>
                <p class="help-block text-danger"></p>
                <textarea rows="8" class="form-control" placeholder="Message" name="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
          </form>
    ';
   }
   
?>           

<?php get_footer();

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}

?>