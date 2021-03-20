<?php

namespace domain\components\searchBox\Validator;

use domain\components\searchBox\Data\InputData;
use domain\Exception\ValidationFailException;
use myapp\myFrameWork\SuperGlobalVars;
use TypeError;

class Validator
{
    /**
     * @param array|NULL $vars
     * 
     * @return InputData
     */
    public function validate(?array $vars = NULL):InputData
    {   
        $searched_trouble_id = ($vars['trouble_id'] != NULL) ? (int) $vars['trouble_id'] : NULL;
        if (!($searched_trouble_id === NULL || $searched_trouble_id > 0)) {
            throw new ValidationFailException('想定外の「困っていること」が選択されています。');
        }

        $searched_region_id = ($vars['region_id'] != NULL) ? (int) $vars['region_id'] : NULL;
        if (!($searched_region_id === NULL || ($searched_region_id > 0 && $searched_region_id <= 6))) {
            throw new ValidationFailException('想定外の「地方」が指定されています。');
        }

        $searched_area_id = ($vars['area_id'] != NULL) ? (int) $vars['area_id'] : NULL;
        if (!($searched_area_id === NULL || ($searched_area_id > 0 && $searched_area_id <= 48))) {
            throw new ValidationFailException('想定外の「地域」が指定されています。');
        }

        $searched_is_foreign_ok = ($vars['is_foreign_ok'] != NULL) ? (bool) $vars['is_foreign_ok'] : NULL;
        if (!($searched_is_foreign_ok === NULL || is_bool($searched_is_foreign_ok) === TRUE)) {
            throw new ValidationFailException('想定外の「国籍不問チェックボックス」の値が指定されています。');
        }

        try {
            return new InputData($searched_trouble_id, $searched_region_id, $searched_area_id, $searched_is_foreign_ok);
        }
        catch (TypeError $e) {
            throw new ValidationFailException('不正なurlです。');
        }
    }
}
