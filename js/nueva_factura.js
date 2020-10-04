
		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/productos_factura.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	function agregar (id)
		{
	       var atencion=document.getElementById('id_atencion').value;
			var cantidad=document.getElementById('cantidad_'+id).value;
			//Inicia validacion
			if (isNaN(cantidad))
			{
			alert('Esto no es un numero');
			document.getElementById('cantidad_'+id).focus();
			return false;
			}
			
			//Fin validacion
			
			$.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion.php",
        data: "id="+id+"&cantidad="+cantidad+"&atencion="+atencion,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});
		}
		
			function eliminar (id)
		{
			
			$.ajax({
        type: "GET",
        url: "./ajax/agregar_facturacion.php",
        data: "id="+id,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});

		}
		
$("#datos_factura").submit(function(){
    
    
    	var tratamiento = $('#tratamiento').val();
        

    var id_atencion =$('#id_atencion').val();
    
    
    
    	  if (tratamiento==""){
			  alert("Describe tu tratamiento");
			  $("#tratamiento").focus();
			  return false;
		  }
    
    	  if (id_atencion==""){
			  alert("ocupas una atencion");
			  $("#id_atencion").focus();
			  return false;
		  }
    
	
		 VentanaCentrada('reporte/re_entregados.php?tratamiento='+tratamiento+'&id_atencion='+id_atencion,'Factura','','1024','768','true');
	 	});
