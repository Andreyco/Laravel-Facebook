<?php

return array(

    'init' =>  array(
        'appId' =>  1,
        'secret' => '',
        'fileUpload' => false, // optional
    ),

    'canvas-url'  => 'https://apps.facebook.com/application-name/',

    'pageId'    => null,

    'login' =>  array(
        'scope' =>  'email',
        'redirect_uri'  => 'https://application.com/facebook-login',
        'display'   => 'page',
        'response_type' => 'code',
    ),

    'registration' => array(
        'fields'    => array(
            array('name' => 'name'),
            array('name' => 'location'),
            array('name' => 'password'),
        ),
        'redirect_uri'  => 'https://application.com/facebook-registration',
    ),
);