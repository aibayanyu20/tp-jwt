<?php
/**
 * @time 9:42 2020/7/22
 * @author loster
 */

namespace aibayanyu\JWT\exception;


use Throwable;

class JWTListException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}