
<?php
   $ngrok = 'https://4b17f259a257.ngrok.io/infinID'; 
   if(isset($_FILES['uploads'])){
      $errors= array();
      $file_name = $_FILES['uploads']['name'];
      $file_size =$_FILES['uploads']['size'];
      $file_tmp =$_FILES['uploads']['tmp_name'];
      $file_type=$_FILES['uploads']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploads']['name'])));

      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="File type not allowed; please choose a JPEG, JPG, or PNG file.";
      }

      if($file_size > 5000000){
         $errors[]='File size must not exceed 5MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         $link = "<script>window.open($ngrok,'_self')</script>";
         echo $link;
      }else{
         print_r($errors);
      }
   }
?>
