<?php

namespace domain\article\show\Validator;

use domain\article\show\Data\InputData;
use domain\Exception\ValidationFailException;
use TypeError;

class Validator
{

    public function validate(array $vars) :InputData
    {
        $article_id = (int) $vars['artcl_id'];
        if ($article_id <= 0) {
            throw new ValidationFailException('予想外のコラムが指定されています。');
        }

        try {
            return new InputData($article_id);
        }
        catch (TypeError $e) {
            throw new ValidationFailException('パラメータの型が違います。');
        }
    }
}
