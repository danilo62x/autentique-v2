<?php

namespace danilo62x\Autentique\exceptions;

use danilo62x\Autentique\Enums\ErrorMessagesEnum;

class EmptyAutentiqueResponseException extends BaseException
{
    public function __construct()
    {
        parent::__construct(ErrorMessagesEnum::ERR_AUTENTIQUE_RESPONSE, 200);
    }
}
