Mushi.common = {
	init: function() {
		console.log('Mushi started');
		Mushi.common.mobileMenuClick();
		Mushi.common.overlayClick();
		Mushi.common.loadingIcon();
		Mushi.common.videoPopupClick();
		Mushi.common.verifyForm();
		Mushi.common.setMenuPadding();
		Mushi.common.onWindowResize();
		Mushi.common.menuButtonClick();
		Mushi.common.questionClick();
	},

	setMenuPadding: function(){
		var theHeight = $('header.main').innerHeight();
		$('body').css('padding-top', theHeight);
		$('header.main').css('position', 'fixed');
	},

	onWindowResize: function(){
		$(window).bind('resize', function(){
			Mushi.common.setMenuPadding();
		});
	},

	menuButtonClick: function(){
		$('header.main nav.main-menu a.scroll').bind('click', function(){
			var target = $(this).attr('href');
			var theHeight = $('header.main').innerHeight();

			$('body, html').stop(false, false).animate({ scrollTop : $(target).position().top - theHeight });
			$('header.main nav.main-menu a').removeClass('selected');
			$(this).addClass('selected');

			Mushi.common.closeAll();
			return false;
		});
	},

	videoPopupClick: function(){
		$('.lower-top .solucoes a, .solucoes .details a.video').bind('click', function(){
			Mushi.common.overlayOpen();
			Mushi.common.videoPopupOpen($('.popup', this.parentNode));
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
				Mushi.common.stopWaiting($(form));
				Mushi.common.loadingHide();
			},
			error: function(jqXHR, textStatus, errorThrown){
				$('input[type="submit"]', $(form)).removeAttr('disabled');
				$('input[type="submit"]', $(form)).val('Enviar');
				alert('Ops... Ocorreu um erro no envio, por favor tente novamente.');
				Mushi.common.stopWaiting($(form));
				Mushi.common.loadingHide();
			}
		});
	},

	verifyForm: function() {

		$('#contato form').validate({
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
				Mushi.common.sendContatoForm(form);
				return false;
			}
		});
	},

	mobileMenuClick: function(){
		$('button.mobile-button').bind('click', function(){
			Mushi.common.mobileMenuOpen();
			Mushi.common.overlayOpen();
		});
	},

	mobileMenuOpen: function(){
		$('nav.main-menu').addClass('selected');
	},

	mobileMenuClose: function(){
		$('nav.main-menu').removeClass('selected');
	},

	overlayOpen: function(){
		$('.big-overlay').fadeIn();
		$('.mobile-close').fadeIn();
	},

	overlayClose: function(){
		$('.big-overlay').fadeOut();
		$('.mobile-close').fadeOut();
	},

	overlayClick: function(){
		$('.big-overlay, .mobile-close').bind('click', function(){
			Mushi.common.closeAll();
		});
	},

	closeAll: function(){
		Mushi.common.overlayClose();
		Mushi.common.mobileMenuClose();

		Mushi.common.videoPopupClose();
	},

	loadingIcon: function(){
		$('.loading').each(function(){
			var id = $(this).prop('id');
			var cl = new CanvasLoader(id);
			cl.setDiameter(44); // default is 40
			cl.setDensity(96); // default is 40
			cl.setRange(0.9); // default is 1.3
			cl.setFPS(30); // default is 24
			cl.show(); // Hidden by default
		});
	},

	loadingShow: function(){
		$('.loading', $('.waiting').parentNode).fadeIn();
	},

	loadingHide: function(){
		$('.loading').fadeOut();
	},

	startWaiting: function(target){
		target.addClass('waiting');
	},

	stopWaiting: function(target){
		target.removeClass('waiting');
	},

	questionClick: function(){
		$('#faq .questions a').bind('click', function(){
			var index = $(this).data('question-num');
			var theHeight = $('header.main').innerHeight();

			$('#faq .questions a').removeClass('selected');
			$(this).addClass('selected');

			$('#faq .answers li').addClass('hidden');
			$('#faq .answers li:eq(' + index + ')').removeClass('hidden');
			$('body, html').stop(false, false).animate({ scrollTop : $('#faq .answers').position().top - theHeight });

			return false;
		});
	}
};