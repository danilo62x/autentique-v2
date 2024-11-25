<?php

namespace danilo62x\Autentique\exceptions;

use danilo62x\Autentique\Enums\ErrorMessagesEnum;

class EmptyQueryException extends BaseException
{
    public function __construct()
    {
        parent::__construct(ErrorMessagesEnum::ERR_EMPTY_QUERY, 400);
    }
}
