$(function() {


	$('#pass2').keyup(function(){
		var pass1=$('#pass1').val();
		var pass2=$('#pass2').val();

		if (pass1==pass2) 
		{
			$("#btnfinalizar").removeAttr("disabled");
			$('#Error1').text("Coinciden").css("color","green");
		}else{
			$("#btnfinalizar").attr("disabled","disabled");
			$('#Error1').text("No coinciden las contraseñas").css("color","red");
		}

	});

	})
