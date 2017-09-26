<?php

/*$env = $app->detectEnvironment(array(

	'local' => array('Nicks-MacBook-Pro.local')

));
*/

$env = $app->detectEnvironment(function()
{
    return getenv('APP_ENV') ?: 'production';
});