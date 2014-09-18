<?php
/**
 * Created by PhpStorm.
 * User: sergiovilar
 * Date: 04/05/14
 * Time: 09:04 PM
 */

class DestaqueModel extends AppModel{

    public $icon = "dashicons-star-empty";

    public $fields = array(

        'title'         => true,

        'subtitulo'     => array(
            'label'     => 'Subtítulo',
            'type'      => 'text',
            'required'  => true
        ),

        'link'          => array(
            'label'     => 'Link do destaque',
            'type'      => 'text',
            'required'  => true
        ),

        'video'          => array(
            'label'     => 'URL do Vídeo (Youtube)',
            'type'      => 'text',
            'required'  => true
        )

    );

} 