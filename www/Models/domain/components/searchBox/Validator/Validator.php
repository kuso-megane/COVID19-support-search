<?php

namespace domain\components\searchBox\Validator;

use domain\components\searchBox\Data\InputData;
use domain\Exception\ValidationFailException;
use myapp\myFrameWork\SuperGlobalVars;
use TypeError;

class Validator
{
    /**
     * @param array $cookie
     * 
     * @return InputData
     */
    public function validate(array $cookie):InputData
    {   
        $searched_trouble_id = $cookie['searched_trouble_id'];
        if ($searched_trouble_id <= 0) {
            throw new ValidationFailException('想定外のCookieが設定されています。Cookieをクリアしてください。');
        }

        $searched_area_id = $cookie['searched_area_id'];
        if (!($searched_area_id > 0 || $searched_area_id <= 48)) {
            throw new ValidationFailException('想定外のCookieが設定されています。Cookieをクリアしてください。');
        }

        $searched_is_foreign_ok = $cookie['searched_is_foreign_ok'];
        if (is_bool($searched_is_foreign_ok) === FALSE) {
            throw new ValidationFailException('想定外のCookieが設定されています。Cookieをクリアしてください。');
        }

        try {
            return new InputData($searched_trouble_id, $searched_area_id, $searched_is_foreign_ok);
        }
        catch (TypeError $e) {
            throw new ValidationFailException('想定外のCookieが設定されています。Cookieをクリアしてください。');
        }
    }
}
