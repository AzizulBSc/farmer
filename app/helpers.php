<?php

use App\Models\Participant;

function isActive($path, $active = 'active menu-open')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}
