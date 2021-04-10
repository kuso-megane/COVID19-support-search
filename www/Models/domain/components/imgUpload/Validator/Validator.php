<?php

namespace domain\components\imgUpload\Validator;

use domain\components\imgUpload\Data\InputData;
use domain\Exception\ValidationFailException;
use myapp\config\ViewsConfig;
use TypeError;

class Validator
{
    /**
     * @param array $imgFileInfo
     * 
     * @return InputData
     * 
     * if validation fails, this returns domain\Exception\ValidationFailException
     */
    public function validate(array $imgFileInfo):InputData
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        list($mime, $ext) = str_split($finfo::file($imgFileInfo['tmpname']));
        if ($mime != 'img') {
            finfo_close($finfo);
            throw new ValidationFailException('送信されたファイルが画像ではありません。');
        }

        try {
            return new InputData($imgFileInfo['tmpname'], $ext);
        }
        catch (TypeError $e) {
            throw new ValidationFailException("不正なパラメータが渡されています。");
        }
    }
}
