<?php

$app->SMTP('smtp.tagzag.com.br', 'envio@tagzag.com.br', 'envio123', 587, false, 'envio@tagzag.com.br', 'Auxílio NF-e');

add_filter( 'wp_mail_content_type', 'set_html_content_type' );

function sendMail($subject, $to, $fields, $att = null){

	if(!empty($fields['email'])){
		$from = $_POST['email'];
		unset($fields['email']);
	}

	if(!empty($fields['nome'])){
		$name = $_POST['nome'];
		unset($fields['nome']);
	}

	$html = '';

	foreach($fields as $field){
		$html .= "<strong>".ucfirst($field).":</strong> ".$_POST[$field]."<br />";
	}

	$sent = wp_mail( $to, $subject, $html);

	if($sent){
		echo 1;
		exit();
	}else{
		echo 0;
		exit();
	}

}

function set_html_content_type() {
	return 'text/html';
}

function sendContato(){

	$fields = array('nome', 'empresa', 'fixo', 'celular', 'email', 'assunto', 'mensagem');
	sendMail('Contato', get_option('email_contato'), $fields);

}
add_action('wp_ajax_contato', 'sendContato');
add_action('wp_ajax_nopriv_contato', 'sendContato');