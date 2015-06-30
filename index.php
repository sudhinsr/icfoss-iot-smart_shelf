<?php
session_start();
require 'dbconfig.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Smart Shelf</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>
    <div align="center">
        <h1>Smart Shelf</h1>
    </div>
</br>
</br>

<table width="70%" align="center" border="1">
  <tr>
    <td><strong>Sl</strong></td>
    <td><strong>Shelf Id</strong></td>
    <td><strong>Item</strong></td>      
    <td><strong>Distance</strong></td>
    <td><strong>Status</strong></td>
  </tr>

    <?php

 $strSQL = mysqli_query($connection, " select * from shelf order by shelf_id" );
 $x=1;
 while($Result = mysqli_fetch_array($strSQL) or die (mysqli_error($connection))){ 
     
    $id=$Result['shelf_id'];
    $strSQL1 = mysqli_query($connection, " select * from nrf where sl='".$id."' order by date desc" );
    $y=0;$sum=0;  
     while($y<20){
      $Result1 = mysqli_fetch_array($strSQL1) or die (mysqli_error($connection));
         $sum=$sum+$Result1['data'];
         $y++;
     }
     
     $sum=$sum/20;
  /*   $status="Stock Available";*/


	if($sum >= ($Result['shelf_size']*.75)){
         $status ="Out of Stock";
         $color="#c9302c";
         }

	else if($sum >= ($Result['shelf_size']*.5)){
         $status ="Running out of items";
         $color="#f0ad4e";
    	 }

	else
	{
	$status="Stock Available";
	$color="#204d74";
	}
     
      ?>
    
    

    
    

 
  <tr style="color:<?php echo $color; ?>;">

	<td><?php echo $x; ?></td>
	<td><?php echo $Result['shelf_id']; ?></td>
	<td><?php echo $Result['item']; ?></td>
    <td><?php echo $sum; ?></td>
  	<td><?php echo $status; ?></td>

    
  </tr>
  <?php $x++;} ?>
  </tbody>
</table>



    
    
    
</body>
</html>
<?php
mysqli_close($connection);
?>
