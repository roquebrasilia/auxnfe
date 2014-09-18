<?php

class Opcoes extends OptionPage{

	public $title = 'Opções';
	public $capability = 'switch_themes';

	public $fields = array(

		'email_contato' => array(
			'label' => 'Email para contato',
			'type' => 'text'
		),

		'telefone' => array(
			'label' => 'Telefone para contato',
			'type' => 'text'
		),

		'facebook' => array(
			'label' => 'Facebook',
			'type' => 'text'
		),

		'twitter' => array(
			'label' => 'Twitter',
			'type' => 'text'
		),

		'linkedin' => array(
			'label' => 'Linkedin',
			'type' => 'text'
		),

		'gplus' => array(
			'label' => 'Google Plus',
			'type' => 'text'
		),

	);

}