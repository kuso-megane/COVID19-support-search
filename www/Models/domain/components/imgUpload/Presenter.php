<?php

namespace domain\components\imgUpload;

use myapp\config\AppConfig;

class Presenter
{
    /**
     * @param bool $isUploadSucceeded
     * @param string $newThumbnailName
     * 
     * @return string|FALSE
     */
    public function present(bool $isUploadSucceeded, string $newThumbnailName)
    {
        if ($isUploadSucceeded === TRUE) {
            return $newThumbnailName;
        }
        else {
            return FALSE;
        }
    }

}