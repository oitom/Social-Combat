// ANIMAÇÃO NO INPUT DA PESQUISA
$('.a-pesquisa').click(function(){	

	$($(this).attr('href')).animate({width:'toggle'}, 300);
	$($(this).attr('href')).focus();
	return false;
});

$("#abrir-principal").click(function(){
	$("#perfil").animate({width:'toggle'}, 300);	
	
	if($(this).attr('class') == 'fa fa-navicon active'){
		$(this).removeClass('active');
		$("#principal").animate({'margin-left':'0'}, 300);	
	}
	else{
		$(this).addClass('active');
		$("#principal").animate({'margin-left':'200px'}, 300);	
	}
});

$(window).resize(function() {
	if($(window).width() > 800){
		$("#principal").css("margin-left","200px");
		$("#perfil").show();
	}
	else{
		$("#principal").css("margin-left","0");
		$("#perfil").hide();
	}
});

// MODAL

$(".close, .modal a, .back-modal").click(function(){
	$(".nova-mensagem.modal, .back-modal").fadeOut();
	$(".novo-grupo.modal, .back-modal").fadeOut();
	return false;
});


$(".btn-nova-mensagem-modal").click(function(){
	$(".nova-mensagem.modal, .back-modal").fadeIn();
	return false;
});

$(".btn-nova-mensagem, #bloco-nova-mensagem a").click(function(){
	$("#bloco-nova-mensagem").slideToggle('slow');
	return false;
});


$(".btn-novo-grupo-modal").click(function(){
	$(".novo-grupo.modal, .back-modal").fadeIn();
	return false;
});

// Toggle botão opções (mensagem e desafiar) versão celular

$(".btn-toggle a").click(function(){
	var id = $(this).attr('href');
	$(id).slideToggle('slow');
	
	console.log($(this).attr('class'));

	if($(this).attr('class') == 'fa fa-chevron-circle-down'){
		$(this).removeClass('fa-chevron-circle-down');
		$(this).addClass('fa-chevron-circle-up');
	}
	else{
		$(this).removeClass('fa-chevron-circle-up');
		$(this).addClass('fa-chevron-circle-down');
	}

	return false;
});


// MUDA A COR DO TEMA
$("#padrao-cor").change(function(){

	var padrao = $(this).val();
	var body, header, section, perfil;

	switch(padrao){
		case "1": body ="#ecf0c7"; header ="#bd582c"; texto ="#a24b25"; titulo ="#a24b25"; section ="#E7D89F"; perfil ="#E5DAAD"; break;
		case "2": body ="#BAC9D2"; header ="#0b6294"; texto ="#094161"; titulo ="#094161"; section ="#F4F4F4"; perfil ="#EEEEEE"; break;
		case "3": body ="#cedfdf"; header ="#009d91"; texto ="#046961"; titulo ="#046961"; section ="#EAE8E1"; perfil ="#C7C7C7"; break;
		case "4": body ="#E8F6E8"; header ="#078600"; texto ="#078600"; titulo ="#078600"; section ="#C5BD84"; perfil ="#E9E1AD"; break;
		case "5": body ="#D6D6D6"; header ="#202020"; texto ="#3dbfd9"; titulo ="#202020"; section ="#9E9E9E"; perfil ="#3a3a3a"; break;
	}

	$("body").css("background-color", body);
	$("header, .button").css("background-color", header);
	$("a, #nome-perfil, #nick-perfil").css("color", texto);
	$("h2, h3, h4, h5, h6").css("color", titulo);
	$("section").css("background-color", section);
	$(".feed, input[type='text'], input[type='password']").css("border-color", header);
	$("#perfil").css("background-color", perfil);

	return false;
});
