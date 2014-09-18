<?php
/**
 * Created by PhpStorm.
 * User: sergiovilar
 * Date: 04/05/14
 * Time: 09:04 PM
 */

class PassoModel extends AppModel{

    public $icon = "dashicons-universal-access";
    public $plural = "Passo-a-passo";
    public $singular = "Passo";

    public $fields = array(

        'title'         => true,
        'thumbnail'     => true,
        'editor'     => true,

    );

} 