<?php
$ds = DIRECTORY_SEPARATOR;  
    
$storeFolder = 'files';  
  
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];              
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 

    $targetFile =  $targetPath."profilePicture.png";    
    
    move_uploaded_file($tempFile,$targetFile);      #<?php echo $_SESSION["first_name"]
}
?>