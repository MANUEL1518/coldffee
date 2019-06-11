//Detectar si "file" se encuentra con elemento
$(document).ready(function(){
	$("#input_foto").change(function(){ //Si "foto_perfil" ya esta lleno entonces...
		
	$("#lightbox_change_fperfil").css("transition","0.5s");
	$("#lightbox_change_fperfil").css("height","0%");
	$("#lightbox_change_fperfil").css("opacity","0");
	setTimeout(function(){
		$("#lightbox_change_fperfil").css("display","none");
	}, 1500);

	document.getElementById("foto_perfil").submit();
});

	
	//Para uploaded
    $("#input_files").change(function(){ //Si "input_files" ya esta lleno entonces...
	
	$("#lightbox_uploaded_file").css("transition","0.5s");
	$("#lightbox_uploaded_file").css("height","0%");
	$("#lightbox_uploaded_file").css("opacity","0");
	setTimeout(function(){
		$("#lightbox_uploaded_file").css("display","none");
	}, 1500);

	    document.getElementById("uploaded").submit();
	});
});
		function check_avery_files(){
			if ($('#every_files').is(':checked')){
				$('input[name="files[]"]').prop("checked", true);
			}else{
				$('input[name="files[]"]').prop("checked", false);
			}
		}

		//Borrar archivos dentro de los checkbox
		function delete_files(){
			if ($('input[name="files[]"]').is(':checked')) {
				document.getElementById("checkboxs_files").submit();
			}
		}

        // Abrir change_foto
        function change_foto(){
        	$("#lightbox_change_fperfil").css("transition","0.5s");
        	$("#lightbox_change_fperfil").css("height","100%");
			$("#lightbox_change_fperfil").css("opacity","1");
			$("#lightbox_change_fperfil").css("display","flex");
        }
        function close_change_foto(){
        	$("#lightbox_change_fperfil").css("transition","0.5s");
			$("#lightbox_change_fperfil").css("height","0%");
			$("#lightbox_change_fperfil").css("opacity","0");
			setTimeout(function(){
				$("#lightbox_change_fperfil").css("display","none");
			}, 1500);
        }
        // Abrir uploaded file
        function uploaded_file(){
        	$("#lightbox_uploaded_file").css("transition","0.5s");
        	$("#lightbox_uploaded_file").css("height","100%");
			$("#lightbox_uploaded_file").css("opacity","1");
			$("#lightbox_uploaded_file").css("display","flex");
        }
        function close_uploaded_file(){
        	$("#lightbox_uploaded_file").css("transition","0.5s");
			$("#lightbox_uploaded_file").css("height","0%");
			$("#lightbox_uploaded_file").css("opacity","0");
			setTimeout(function(){
				$("#lightbox_uploaded_file").css("display","none");
			}, 1500);
        }

        //Abrir setings
		function setings() {
			var setings = document.getElementById('setings');
			setings.style.transition = "0.5s";
			setings.style.padding = "20px";
			setings.style.opacity = "1";
			setings.style.width = "350px";
		}
		function close_settings(){
			var setings = document.getElementById('setings');
			setings.style.transition = "0.5s";
			setings.style.padding = "0";
			setings.style.opacity = "0";
			setings.style.width = "0px";
		}