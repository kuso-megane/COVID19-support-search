<?php

namespace domain\search\result\Validator;

use myapp\myFrameWork\SuperGlobalVars;
use domain\Exception\ValidationFailException;
use TypeError;
use domain\search\result\Data\InputData;

class Validator
{
    public function validate(array $vars)
    {
        $get = (new SuperGlobalVars)->getGet();

        $trouble_id = (int) $get['trouble_id'];
        if ($trouble_id <= 0) {
            throw new ValidationFailException('想定外の「困っていること」が選択されています。');
        }

        $region_id = (int) $get['region_id'];
        if (!($region_id >= 1 && $region_id <= 6)) {
            throw new ValidationFailException('想定外の「地方」が指定されています。');
        }

        $area_id = (int) $get['area_id'];
        if (!($area_id >= 1 && $area_id <= 48)) {
            throw new ValidationFailException('想定外の「地域」が指定されています。');
        }

        $is_foreign_ok = $get['is_foreign_ok'];
        if ($is_foreign_ok === NULL) {
            $is_foreign_ok = FALSE;
        }
        elseif ($is_foreign_ok == 'on') {
            $is_foreign_ok = TRUE;
        }
        else {
            throw new ValidationFailException('想定外の「国籍不問チェックボックス」の値が指定されています。');
        }

        $pub_p = ($vars['pub_p'] != NULL) ? (int) $vars['pub_p'] : 1;
        if ($pub_p <= 0) {
            throw new ValidationFailException('想定外の「ページ」が指定されています。');
        }

        $pri_p = ($vars['pri_p'] != NULL) ? (int) $vars['pri_p'] : 1;
        if ($pri_p <= 0) {
            throw new ValidationFailException('想定外の「ページ」が指定されています。');
        }

        $is_public = (int) $vars['is_public'];
        if ($is_public === 1) {
            $is_public = TRUE;
        }
        elseif ($is_public === 0) {
            $is_public = FALSE;
        }
        else {
            throw new ValidationFailException('想定外の「is_public」が指定されています。');
        }

        try {
            return new InputData($trouble_id, $region_id, $area_id, $is_foreign_ok, $is_public, $pub_p, $pri_p);
        }
        catch (TypeError $e){
            throw new ValidationFailException('不正なurlです。');
        }
    }
}
