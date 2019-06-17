<?php

function get_tests_by_type($type)
{
    return R::getAll( 'select * from tests where type = :type', array(':type' => $type) );
}