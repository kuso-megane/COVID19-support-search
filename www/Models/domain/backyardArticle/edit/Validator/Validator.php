<?php

namespace domain\backyardArticle\edit\Validator;

use domain\backyardArticle\edit\Data\InputData;
use domain\Exception\ValidationFailException;
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
        $artcl_id = ($vars['artcl_id'] != NULL) ? (int)$vars['artcl_id'] : NULL;
        if (!($artcl_id === NULL || $artcl_id > 0)) {
            throw new ValidationFailException('予想外の記事が指定されています。');
        }

        try {
            return new InputData($artcl_id);
        }
        catch(TypeError $e) {
            throw new ValidationFailException('不正なパラメータが渡されています。');
        }
    }
}
