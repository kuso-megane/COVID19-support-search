<?php

namespace domain\backyardSupportOrgs\post\Validator;

use domain\backyardSupportOrgs\post\Data\InputData;
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
    public function validate(array $vars): InputData
    {
        $post = SuperGlobalVars::getPost();


        $id = ($vars['support_id'] !== NULL) ? (int) $vars['support_id'] : NULL;
        if (! ($id === NULL || $id > 0)) {
            throw new ValidationFailException('想定外の支援団体が指定されています。');
        }

        $area_id = (int) $post['area_id'];
        if (! ($area_id > 0 && $area_id <= 48)) {
            throw new ValidationFailException(('想定外の都道府県が指定されています。'));
        }

        $support_content = $post['support_content'];
        $len_support_content = mb_strlen($support_content, 'UTF-8');
        if (! ($len_support_content>= 0 && $len_support_content <= 500)) {
            throw new ValidationFailException('支援内容の文字数が不正です。');
        }

        $owner = $post['owner'];
        $len_owner = mb_strlen($owner, 'UTF-8');
        if (! ($len_owner >= 0 && $len_owner <= 100)) {
            throw new ValidationFailException('団体名の文字数が不正です。');
        }

        $access = $post['access'];
        $len_access = mb_strlen($access, 'UTF-8');
        if (! ($len_access >= 0 && $len_access <= 1000)) {
            throw new ValidationFailException('アクセスの文字数が不正です。');
        }

        $is_foreign_ok = (int) $post['is_foreign_ok'];
        if (! ($is_foreign_ok === 0 || $is_foreign_ok === 1)) {
            throw new ValidationFailException('is_foreign_okフラグが不正です。');
        }

        $is_public = (int) $post['is_public'];
        if (! ($is_public === 0 || $is_public === 1)) {
            throw new ValidationFailException('is_publicフラグが不正です。');
        }

        $appendix = (string) $post['appendix'];
        $len_appendix = mb_strlen($appendix, 'UTF-8');
        if (! ($len_appendix <= 1000)) {
            throw new ValidationFailException('備考の文字数が不正です。');
        }

        try {
            return new InputData(
                $id, $area_id, $support_content, $owner, $access,
                $is_foreign_ok, $is_public, $appendix
            );
        }
        catch (TypeError $e) {
            throw new ValidationFailException('不正なパラメータが渡されています。');
        }
    }
}
