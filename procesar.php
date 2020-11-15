<?php

	include("Connet.php");
	

	if ($_FILES['excel']['name'])
	{
		$fecha		= date("Y-m-d");
		//$carpeta 	= "tmp_excel/";
		$carpeta 	= "tmp/";
		$excel  	= $fecha."-".$_FILES['excel']['name'];

		move_uploaded_file($_FILES['excel']['tmp_name'], "$carpeta$excel");
		
		$row = 1;

		$fp = fopen ("$carpeta$excel","r");
        
        $a="$carpeta$excel";
        $restorePoint=SGBD::limpiarCadena("$a");

        
        $sql=explode(";",file_get_contents($restorePoint));
$totalErrors=0;
set_time_limit (120);
$con=mysqli_connect(SERVER, USER, PASS, BD);
$con->query("SET FOREIGN_KEY_CHECKS=1");
for($i = 0; $i < (count($sql)-1); $i++){
    if($con->query($sql[$i].";")){ 
 echo $sql[$i];

	}else{
		$totalErrors++; }
}
$con->query("SET FOREIGN_KEY_CHECKS=1");
$con->close();
if($totalErrors<=0){
	
    	$mensaje= "Restauración completada con éxito";
						print "<script>alert('$mensaje')</script>";
				 		print ("<script>window.location.replace('logout.php');</script>");
    
    
    
}else{
	$mensaje= "Restauración completada con éxito";
	echo $totalErrors;
	
						//print "<script>alert('$mensaje')</script>";
				 		//print ("<script>window.location.replace('logout.php');</script>");
    
}
        
        
        
        
    }

        ?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
   