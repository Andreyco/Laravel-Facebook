<?php

return array(

    'init' =>  array(
        'appId' =>  1,
        'secret' => '',
        'fileUpload' => false, // optional
    ),

    'canvas-url'  => 'https://apps.facebook.com/applicaiton-name/',

    'login' =>  array(
        'scope' =>  'email',
        'redirect_uri'  => 'https://application.com/facebook-login',
        'display'   => 'page',
        'state' => '',
        'response_type' => 'code',
    ),

    'pageId'    => 1,

);