<?php
function getIdFromName($name)
{
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function getCurrentUserId()
{
    echo 'TODO: write handling of query current user id (handle it via sessions)<br>';
    return 1; /* temporary, just to test if things work */
}
