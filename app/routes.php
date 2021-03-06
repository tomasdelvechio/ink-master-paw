<?php

$router->get('', 'GeneralController@index');

$router->get('new_appointment', 'ApController@newAp');
$router->post('save_appointment', 'ApController@saveAp');

$router->get('login', 'UserController@logIn');
$router->post('save_login', 'UserController@find');
$router->get('new_user', 'UserController@register');
$router->post('save_user', 'UserController@saveUser');
$router->get('logout', 'UserController@logOut');

$router->get('not_found', 'ErrorController@not_found');
$router->get('internal_error', 'ErrorController@internal_error');

$router->get('faq', 'GeneralController@listFaq');
$router->get('faq.view/{id_faq}', 'GeneralController@viewFaq'); //la idea es pasar el id hacia el controler

$router->get('term&cond', 'GeneralController@listTerms');