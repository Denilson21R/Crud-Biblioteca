$( document ).ready(function() {
	var nomes = "";
	var arrayNomes = $("#nomeFuncionarios").val().split(",");
	$("#nomeParticipantes").autocomplete({
		source: arrayNomes
	});
	$("#nomeParticipantes").focusout(function(){
		var nome = $(this).val();
		nomes+=nome+" "
		if (nome != "") {
			$("#selecionados").text(nomes);
			$("#selecionadosPOST").val(nomes);
			$(this).val("");
		}
	});
	$("div[role]").hide();
});