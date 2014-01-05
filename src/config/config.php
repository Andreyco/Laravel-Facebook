<?php

return array(

    'init' =>  array(
        'appId' =>  1,
        'secret' => '',
        'fileUpload' => false, // optional
    ),

    'canvas-url'  => 'https://apps.facebook.com/application-name/',

    'login' =>  array(
        'scope' =>  'email',
        'redirect_uri'  => 'https://application.com/facebook-login',
        'display'   => 'page',
        'response_type' => 'code',
    ),

    'pageId'    => 1,

);