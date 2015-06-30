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
    

    
    
    

<table width="70%" align="center" border="1">
  <tr>
    <td><strong>Sl</strong></td>
    <td><strong>Shelf</strong></td>		
    <td><strong>Distance</strong></td>
    <td><strong>Status</strong></td>
  </tr>
  <tbody>
 <?php
 $strSQL = mysqli_query($connection, " select * from nrf order by date desc" );
 $x=1;
 while($Result = mysqli_fetch_array($strSQL) or die (mysqli_error($connection))){ ?>
  <tr>

	<td><?php echo $x; ?></td>
	<td><?php echo $Result['sl']; ?></td>
	<td><?php echo $Result['data']; ?></td>
  	<td><?php echo $Result['date']; ?></td>

    
  </tr>
  <?php $x++;} ?>
  </tbody>
</table>



    
    
    
</body>
</html>
<?php
mysqli_close($connection);
?>
