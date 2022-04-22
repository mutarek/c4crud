<?php
function getError($allerror,$field)
{
    if(isset($allerror))
    {
        if($allerror->hasError($field))
        {
            return $allerror->getError($field);
        }
        else
        {
            return false;
        }
    }
}