<?php

namespace domain\backyardSupportOrgs\index\Validator;

use domain\backyardSupportOrgs\index\Data\InputData;
use domain\Exception\ValidationFailException;
use myapp\myFrameWork\SuperGlobalVars;
use TypeError;

class Validator
{

    /**
     * @return InputData
     */
    public function validate(): InputData
    {
        $get = SuperGlobalVars::getGet();

        $owner = $get['owner_word'];
        if (strlen($owner) === 0) {
            $owner = NULL;
        }

        if (mb_strlen($owner, 'UTF-8') > 20) {
            throw new ValidationFailException('検索したownerの文字数が長すぎます。');
        }

        try {
            return new InputData($owner);
        }
        catch (TypeError $e) {
            throw new ValidationFailException('想定外のパラメータが与えられています。');
        }
    }
}