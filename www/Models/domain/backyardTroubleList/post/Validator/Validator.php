<?php

namespace domain\backyardTroubleList\post\Validator;

use domain\backyardTroubleList\post\Data\InputData;
use domain\Exception\ValidationFailException;
use myapp\myFrameWork\SuperGlobalVars;
use TypeError;

class Validator
{
    /**
     * @param array $vars
     * 
     * 
     *
     */
    public function validate(array $vars):InputData
    {
        $id = ($vars['trouble_id'] !== NULL) ? (int) $vars['trouble_id'] : NULL;
        if (! ($id === NULL || $id > 0)) {
            throw new ValidationFailException('想定外の「お困りごと」が指定されています。');
        }

        $post = (new SuperGlobalVars)::getPost();

        $name = $post['name'];
        $len_name = mb_strlen($name, 'UTF-8');
        if (! ($len_name > 0 && $len_name <= 50)) {
            throw new ValidationFailException('「お困りごと」の内容の文字数が不正です。');
        }

        $meta_word = $post['meta_word'];
        $len_meta_word = mb_strlen($meta_word, 'UTF-8');
        if (! ($len_meta_word > 0 && $len_meta_word <= 50)) {
            throw new ValidationFailException('meta_wordの文字数が不正です。');
        }

        $articleC_id = $post['articleC_id'];
        if (! ($articleC_id > 0)) {
            throw new ValidationFailException('想定外のコラムカテゴリが指定されています。');
        }

        $csrfToken = $post['csrfToken'];

        try {
            return new InputData($id, $name, $meta_word, $articleC_id, $csrfToken);
        }
        catch (TypeError $e) {
            throw new ValidationFailException('想定外のパラメータが渡されています。');
        }

    }
}