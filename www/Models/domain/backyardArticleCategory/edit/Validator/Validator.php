<?php

namespace domain\backyardArticleCategory\edit\Validator;

use domain\backyardArticleCategory\edit\Data\InputData;
use domain\Exception\ValidationFailException;
use TypeError;

class Validator
{
    /**
     * @param array $vars
     * 
     * @return InputData
     */
    public function validate(array $vars): InputData
    {
        $c_id = $vars['c_id'];
        if ($c_id != NULL) {
            $c_id = (int) $c_id;
        }

        if (!($c_id === NULL || $c_id > 0)) {
            throw new ValidationFailException("予想外のカテゴリが指定されています。");
        }

        try {
            return new InputData($c_id);
        }
        catch (TypeError $e) {
            throw new ValidationFailException("不正なパラメータが渡されています。");
        }
    }
}