
$(document).ready(function(e){
    		$(".img-check").click(function(){
				$(this).toggleClass("check");
			});

			$("#tags").select2({
  				placeholder : 'Choisissez trois tags maximum',
  				

			})

			 //  $("button").click(function(){
    //     $("#test").hide();
    // });
	});


