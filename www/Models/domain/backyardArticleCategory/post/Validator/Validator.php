<?php

namespace domain\backyardArticleCategory\post\Validator;

use domain\backyardArticleCategory\post\Data\InputData;
use domain\Exception\ValidationFailException;
use myapp\myFrameWork\SuperGlobalVars;
use TypeError;

class Validator
{
    /**
     * @param array $vars
     * 
     * @return InputData
     * 
     * if validation fails, this returns ValidationFailException
     */
    public function validate(array $vars): InputData
    {
        $c_id = $vars['c_id'];
        if ($c_id !== NULL) {
            $c_id = (int) $c_id;
        }

        if (!($c_id === NULL || $c_id > 0)) {
            throw new ValidationFailException('予想外のカテゴリが指定されています。');
        }

        $post = SuperGlobalVars::getPost();

        $name = (string) $post['name'];
        $lenName = mb_strlen($name, 'UTF-8');
        if (!($lenName > 0 && $lenName <= 20)) {
            throw new ValidationFailException('カテゴリ名の文字数が不正です。');
        }

        $csrfToken = $post['csrfToken'];

        try {
            return new InputData($c_id, $name, $csrfToken);
        }
        catch (TypeError $e) {
            throw new ValidationFailException('不正なパラメータが渡されています。');
        }
    }
}