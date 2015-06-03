<?php

namespace CodeCommerce\Helper;

class Core 
{
    /**
     * Performs a function a number of times
     * 
     * @param \callable $callable Function to perform
     * @param int $times Number of times to perform function
     */
    public static function do_times(callable $callable, $times = 1)
    {
        for($i = 0; $i < (int)$times; $i++) {
            call_user_func($callable);
        }
    }
}
