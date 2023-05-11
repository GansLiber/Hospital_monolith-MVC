<?php

namespace Validators;

use Validator\AbstractValidator;

class LettersAndDash extends AbstractValidator
{
    protected string $message = 'Field :Использовать буквы русского или латинского алфавита и тире';

    public function rule(): bool
    {
        return preg_match('/^[a-zA-Zа-яА-Я\-]+$/u', $this->value);
    }
}