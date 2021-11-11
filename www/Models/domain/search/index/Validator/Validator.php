<?php

namespace domain\search\index\Validator;

use domain\Exception\ValidationFailException;
use domain\search\index\Data\InputData;
use TypeError;

class Validator
{
    public function validate(array $vars): InputData
    {
        $lang = $vars['lang'];
        if ($lang == NULL) {
            $lang = 'jp';
        }

        try {
            return new InputData($lang);
        }
        catch (TypeError $e) {
            throw new ValidationFailException('渡されたパラメータが不正です。');
        }
    }
}