<?php
/**
 * Shared config
 */

$auth = require_once 'auth.php';

return array_replace_recursive(array(

    'youTubeApiKey' => 'yourAPIKeyHere',
    'twigPath'      => __DIR__.'/../src/WebInterface/view',

),$auth);