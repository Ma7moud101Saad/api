<?php

namespace App\Exceptions;

use Exception;

class productNotBelongsToUser extends Exception
{
    public function render()
    {
        return['error'=>'product not belong to user'];
    }
}
