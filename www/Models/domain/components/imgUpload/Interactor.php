<?php

namespace domain\components\imgUpload;

use domain\components\imgUpload\Validator\Validator;
use domain\Exception\ValidationFailException;
use myapp\config\AppConfig;


class Interactor
{
    /**
     * @param array $imgFileInfo $_FILES
     * 
     * @return string|FALSE
     * upload given img file and return the new name.
     * if something go wrong, this returns false, especially when validation fails, throw ValidationFailException
     */
    public function interact(array $imgFileInfo)
    {
        try {
            $input = (new Validator)->validate($imgFileInfo)->toArray();
        }
        catch (ValidationFailException $e) {
            throw $e;
            return FALSE;
        }

        $tmpImgFileName = $input['tmpImgFileName'];
        $ext = $input['ext'];

        $now = date("YmdHis");
        $newThumbnailFileName = $now . '_thumbnail.' . $ext;
        $isUploadSucceeded = move_uploaded_file($tmpImgFileName, AppConfig::UPLOAD_IMG_PATH . $newThumbnailFileName);

        return (new Presenter)->present($isUploadSucceeded, $newThumbnailFileName);
    }
}