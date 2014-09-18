<?php
/**
 * Created by PhpStorm.
 * User: sergiovilar
 * Date: 04/05/14
 * Time: 09:04 PM
 */

class FaqModel extends AppModel{

    public $icon = "dashicons-format-aside";
    public $plural = "FAQ";
    public $singular = "Pergunta";

    public $fields = array(

        'title'         => true,
        'editor'         => true,

        'resposta'       => array(
            'label'     => 'Resposta',
            'type'      => 'long_text',
            'required'  => true
        )

    );

} 