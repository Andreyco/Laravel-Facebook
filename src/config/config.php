<?php

return [

    'init' =>  [
        'appId' =>  1,
        'secret' => '',
        'fileUpload' => false, // optional
    ],

    'login' =>  [
        'scope' =>  'email',
        'redirect_uri'  => 'https://application.com/facebook-login',
        'display'   => 'page',
        'state' => '',
        'response_type' => 'code',
    ],

    'pageId'    => 1,

];