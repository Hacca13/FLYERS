$(document).ready(function(){

$("#showing").hide();

});


$("#showPss").click(function(){
	
	if($("#showing").is(":visible")){
		$("#showing").hide();
		$("#showPss").text("Mostra");

	}else{

		$("#showing").show();
		$("#showPss").text("Nascondi");
	}
});
