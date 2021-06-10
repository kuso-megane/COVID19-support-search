<?php

namespace domain\backyardTroubleList\edit\Validator;

use domain\backyardTroubleList\edit\Data\InputData;
use domain\Exception\ValidationFailException;
use myapp\myFrameWork\SuperGlobalVars;
use TypeError;

class Validator
{
    /**
     * @param array $vars
     * 
     * @return InputData
     */
    public function validate(array $vars):InputData
    {
        $trouble_id = $vars['trouble_id'];
        $trouble_id = ($trouble_id !== NULL) ? (int) $trouble_id : NULL;


        if (! ($trouble_id !== NULL && $trouble_id > 0)) {
            throw new ValidationFailException('予想外の「お困りごと」が指定されています。');
        }

        try {
            return new InputData($trouble_id);
        }
        catch (TypeError $e) {
            throw new ValidationFailException('予想外のパラメータが渡されています。');
        }

    }
}