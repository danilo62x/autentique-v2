<?php

namespace danilo62x\Autentique\exceptions;

use danilo62x\Autentique\Enums\ErrorMessagesEnum;

class EmptyTokenException extends BaseException
{
    public function __construct()
    {
        parent::__construct(ErrorMessagesEnum::ERR_TOKEN_EMPTY, 400);
    }
}
