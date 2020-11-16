
<?php
include 'Connet.php';

session_start();


if (isset ($_POST['btn_guardar'])) {

    
$day=date("d");
$mont=date("m");
$year=date("Y");
$hora=date("H-i-s");
$fecha=$day.'-'.$mont.'-'.$year;
$DataBASE=$fecha."_(".$hora."_hrs).sql";
$tables=array();
$result=SGBD::sql('SHOW TABLES');
if($result){
    while($row=mysqli_fetch_row($result)){
       $tables[] = $row[0];
    }
    $sql='SET FOREIGN_KEY_CHECKS=0;'."\n\n";
    $sql.='CREATE DATABASE IF NOT EXISTS '.BD.";\n\n";
    $sql.='USE '.BD.";\n\n";;
    foreach($tables as $table){
        $result=SGBD::sql('SELECT * FROM '.$table);
        if($result){
            $numFields=mysqli_num_fields($result);
            $sql.='DROP TABLE IF EXISTS '.$table.';';
            $row2=mysqli_fetch_row(SGBD::sql('SHOW CREATE TABLE '.$table));
            $sql.="\n\n".$row2[1].";\n\n";
            for ($i=0; $i < $numFields; $i++){
                while($row=mysqli_fetch_row($result)){
                    $sql.='INSERT INTO '.$table.' VALUES(';
                    for($j=0; $j<$numFields; $j++){
                        $row[$j]=addslashes($row[$j]);
                        $row[$j]=str_replace("\n","\\n",$row[$j]);
                        if (isset($row[$j])){
                            $sql .= '"'.$row[$j].'"' ;
                        }
                        else{
                            $sql.= '""';
                        }
                        if ($j < ($numFields-1)){
                            $sql .= ',';
                        }
                    }
                    $sql.= ");\n";
                }
            }
            $sql.="\n\n\n";
        }else{
            $error=1;
        }
    }
    if($error==1){
        echo 'Ocurrio un error inesperado al crear la copia de seguridad 1';
    }else{
        chmod(BACKUP_PATH, 0777);
        $sql.='SET FOREIGN_KEY_CHECKS=1;';
        $handle=fopen(BACKUP_PATH.$DataBASE,'w+');
       $B="backup/";
   
        if(fwrite($handle, $sql)){
            fclose($handle);
            
            
             $text="<a  href=$B$DataBASE download>Descargar Archivo </a>";

        

            
        }else{
            echo 'Ocurrio un error inesperado al crear la copia de seguridad 2';
        }
    }
}else{
    echo 'Ocurrio un error inesperado 2';
}
mysqli_free_result($result);





}

   
//$text="<textarea class='js-encrypted' value='$c'></textarea>";
    


?>




<!DOCTYPE html>
<head>
<title>HOME</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<link rel="stylesheet" href="css/toastr.min.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>

<!--// css -->
     <link rel="stylesheet" href="css/style3.css" 	type="text/css" media="all">
<!-- <link rel="stylesheet  prefetch" href="css/bootstrap2.min" > -->
<!--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>-->
	
<link rel="stylesheet  prefetch" href="css/bootstrap.min.css" >
<link rel="stylesheet  prefetch" href="css/bootstrap-theme32.min.css" >
<link rel="stylesheet  prefetch" href="css/bootstrapValidator32.min.css" >
  <!--   <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
	<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'> -->

    <script type="text/javascript">
	function cargarHojaExcel()
	{
		if(document.frmcargararchivo.excel.value=="")
		{
			alert("Suba un archivo");
			document.frmcargararchivo.excel.focus();
			return false;
		}		

		document.frmcargararchivo.action = "procesar.php";
		document.frmcargararchivo.submit();
	}

</script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="home.php" class="logo">
       BACKUP
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username"><?php echo $_SESSION['usuario'] ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                
                <li><a href="logout.php"><i class="fa fa-key"></i> Salir</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
<?php

    include("menu2.php");
?>
    
     </ul>
           </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		
</section>
<div class="form-w3layouts">
            <!-- page start-->
            
            
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            BACKUP
                            <span class="tools pull-right">
                               
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                            <div class="container">
		<div class="panel panel-success">
			<div class="panel-body">
			
    <div class="containerw3layouts-agileits">

		<div class="w3imageaits">
            
            
            
            
            
            	
            
            			<form action="#" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <br>
                        <br>
               <h2>Copia Seguridad</h2>
							<div class="icon1">
                                  <img class="" src="images/database.png" width="20%" alt="Custom Signup Form">
				 
							</div>
                            
						
<div class="icon1">
                            <br>
							</div>
<div class="icon1">
                           
    
    
    
    <?php
  echo $text;
 ?>
   
    
    
    
    
							</div>
<div class="icon1">
                            <br>
							</div>
							<div class="bottom">
								
 <input type="submit"   id="btn_guardar" name="btn_guardar" value="CREAR" />

							</div>
                            
<div class="icon1">
                            <br>
							</div>
                            
<div class="icon1">
                            <br>
							</div>
                            
<div class="icon1">
                            <br>
							</div>
                            
<div class="icon1">
                            <br>
							</div>
<div class="icon1">
                            <br>
							</div>
					</form>
           
		
     
						
		</div>




		<div class="aitsloginwthree w3layouts agileits">
        <form name="frmcargararchivo" method="post" enctype="multipart/form-data">
     <h2>Subir Archivo</h2>

     <div class="icon1">
                                  <img class="" src="images/database.png" width="20%" alt="Custom Signup Form">
				 
							</div>
	
		   
		  <input type="file" name="excel" id="excel" accept="text/sql" /> <br>
            <div>
		<input   type="submit"   value="SUBIR"   onclick="cargarHojaExcel();" />
                </div>
		</form>


           

            
            
            
			
		</div>
    
		<div class="clear"></div>

	</div>	
			</div>
		</div>

	</div>
                            
                                
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>












</section>
<!--main content end-->
</section>
   
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script src="js/toastr.min.js"></script>
<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<script>

$(document).on('submit', '#loginform', function(event) {
		event.preventDefault();
		$.ajax({
			url: 'save_par.php',
			type: 'POST',
			dataType: 'JSON',
			data: $(this).serialize(),
			success:function(data){
	
				toastr.options.timeOut = 2000;
				// toastr.options.showMethod = 'fadeIn';
				// toastr.options.hideMethod = 'fadeOut';
				// toastr.options.positionClass = 'toast-top-center';
				
				if(data=="ok"){
					toastr.success("Guardado con exito.");
					setTimeout(function(){
						location.href="home.php";
					},2000);
				}
			
				else{
					toastr.error(data);
				}
			}
		})
	});

	</script>
	<!-- //calendar -->
</body>
</html>
