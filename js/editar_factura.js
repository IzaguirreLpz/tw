
		$(document).ready(function(){
			load(1);
			$( "#resultados" ).load( "ajax/editar_receta.php" );
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
        url: "./ajax/editar_receta.php",
        data: "id="+id+"&cantidad="+cantidad, // data: "id="+id+"&cantidad="+cantidad+"&atencion="+atencion,
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
        url: "./ajax/editar_receta.php",
        data: "id="+id,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});

		}
		
		$("#datos_factura").submit(function(event){
		  var id_cliente = $("#id_cliente").val();
	  
		  if (id_cliente==""){
			  alert("Debes seleccionar un cliente");
			  $("#nombre_cliente").focus();
			  return false;
		  }
			var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "ajax/editar_receta_enc.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".editar_factura").html("Mensaje: Cargando...");
					  },
					success: function(datos){
						$(".editar_factura").html(datos);
					}
			});
			
			 event.preventDefault();
	 	});


		function imprimir_factura(id_factura){
			VentanaCentrada('./pdf/documentos/ver_factura.php?id_factura='+id_factura,'Factura','','1024','768','true');
		}