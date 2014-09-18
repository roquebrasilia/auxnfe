Mushi.home = {
	init: function() {
		console.log('Home started');
		//Mushi.home.videoPopupClick();
		//Mushi.home.verifyForm();
		//Mushi.home.setMenuPadding();
		//Mushi.home.onWindowResize();
		//Mushi.home.menuButtonClick();
	},

	setMenuPadding: function(){
		var theHeight = $('header.top').innerHeight();
		$('body').css('padding-top', theHeight);
		$('header.top').css('position', 'fixed');
	},

	onWindowResize: function(){
		$(window).bind('resize', function(){
			Mushi.home.setMenuPadding();
		});
	},

	menuButtonClick: function(){
		$('header.top nav.menu a.scroll, footer.feet nav.menu a.scroll').bind('click', function(){
			var target = $(this).data('target');
			var theHeight = $('header.top').innerHeight();

			$('body, html').stop(false, false).animate({ scrollTop : $(target).position().top - theHeight });
			$('header.top nav.menu a').removeClass('selected');
			$(this).addClass('selected');

			Mushi.common.closeAll();
			return false;
		});
	},

	videoPopupClick: function(){
		$('.lower-top .solucoes a, .solucoes .details a.video').bind('click', function(){
			Mushi.common.overlayOpen();
			Mushi.home.videoPopupOpen($('.popup', this.parentNode));
			return false;
		});
	},

	videoPopupOpen: function(target){
		target.fadeIn();
	},

	videoPopupClose: function(){
		$('.popup').fadeOut();
	},

	sendContatoForm: function(form){
		var formInput = $(form).serialize();
		Mushi.common.loadingShow();
		Mushi.common.startWaiting($(form));
		$('input[type="submit"]', $(form)).attr('disabled', 'disabled');
		$('input[type="submit"]', $(form)).val('Enviando...');
		$.ajax({
			url: $(form).attr('action'),
			type: "post",
			data: formInput,
			success: function(response, textStatus, jqXHR){
				if(response === true || parseFloat(response) === 1){
					$('input[type="submit"]', $(form)).removeAttr('disabled');
					$('input[type="submit"]', $(form)).val('Enviar');
					$('input[type="text"], form input[type="email"], form input[type="tel"], form textarea').val('');
					alert('Sua mensagem foi enviada. Obrigado!');
				}else{
					$('input[type="submit"]', $(form)).removeAttr('disabled');
					$('input[type="submit"]', $(form)).val('Enviar');
					alert('Desculpe-nos, algum problema ocorreu com o nosso servidor. Por favor, tente novamente.');
				}
				console.log('1: ' + response);
				Mushi.common.stopWaiting($(form));
				Mushi.common.loadingHide();
			},
			error: function(jqXHR, textStatus, errorThrown){
				$('input[type="submit"]', $(form)).removeAttr('disabled');
				$('input[type="submit"]', $(form)).val('Enviar');
				alert('Ops... Ocorreu um erro no envio, por favor tente novamente.');
				console.log('2: ' + errorThrown);
				Mushi.common.stopWaiting($(form));
				Mushi.common.loadingHide();
			}
		});
	},

	verifyForm: function() {

		$('.contato form').validate({
			rules: {
				nome: {
					required: true,
					minlength: 2
				},
				celular:{
					required: true
				},
				email: {
					required: true,
					email: true
				},
				assunto: {
					required: true
				},
				mensagem:{
					required: true,
					minlength: 2
				}
			},
			messages: {
				nome: "Preencha seu nome",
				celular: "Preencha seu telefone",
				email: "Preencha seu e-mail",
				assunto: "Preencha o assunto",
				mensagem: "Preencha sua mensagem"
			},
			errorElement: 'em',
			submitHandler: function(form){
				Mushi.home.sendContatoForm(form);
				return false;
			}
		});
	}
};