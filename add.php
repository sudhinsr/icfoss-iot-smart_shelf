<?php
session_start();
require 'dbconfig.php';



 
if(isset($_POST['action']))
{          
    if($_POST['action']=="insert")
    {
        
        $shelf_id = mysqli_real_escape_string($connection,$_POST['shelf_id']);
        $shelf_size = mysqli_real_escape_string($connection,$_POST['shelf_size']);
        $item = mysqli_real_escape_string($connection,$_POST['item']);
        
        
   if(!(mysqli_query($connection,"insert into shelf values ('".$shelf_id."','".$item."','".$shelf_size."')"))) 
   {
            $sqlchk=mysqli_query($connection,"update shelf set shelf_size='".$shelf_size."',item='".$item."' where  shelf_id='".$shelf_id."'") ;
    }
        
    }
}
















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
    </br>
          

	<form action="" method="post" >
</br>
		
			<div width="50%"  border="1" align="center">
                Shelf Id   : 
   			<input type="text" size="100" name="shelf_id" placeholder="Shelf Id" />
                </br>
        Shelf Item   : 
   			<input type="text" size="100" name="item" placeholder="Shelf Item" />
                </br>
			Shelf Size:
   			<input type="text" size="100" name="shelf_size" placeholder="Shelf Size" />
			
    
       

<div align="center">
            <input type="submit" name="action" class="btn" value="insert">
             </div>
         
        </div> 
        
    </form>
    
    
    
    
    


   
    

<table width="50%" align="center" border="1">
  <tr>
    <td><strong>Sl</strong></td>
    <td><strong>Shelf Id</strong></td>
    <td><strong>Item</strong></td>
    <td><strong>Shelf Size</strong></td>		
  </tr>
  <tbody>
 <?php
 $strSQL = mysqli_query($connection, " select * from shelf" );
 $x=1;
 while($Result = mysqli_fetch_array($strSQL) or die (mysqli_error($connection))){ ?>
  <tr>

	<td><?php echo $x; ?></td>
	<td><?php echo $Result['shelf_id']; ?></td>
	<td><?php echo $Result['item']; ?></td>
    <td><?php echo $Result['shelf_size']; ?></td>

    
  </tr>
  <?php $x++;} ?>
  </tbody>
</table>





    
    
    
    
    
    
</body>
</html>
<?php
mysqli_close($connection);
?>
