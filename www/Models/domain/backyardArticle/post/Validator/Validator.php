<?php

namespace domain\backyardArticle\post\Validator;

use domain\backyardArticle\post\Data\InputData;
use domain\Exception\ValidationFailException;
use myapp\myFrameWork\SuperGlobalVars;
use TypeError;

class Validator
{
    /**
     * @param array $vars
     * @return InputData
     * 
     * if validation fails, this throws ValidationFailException
     */
    public function validate(array $vars): InputData
    {
        $artcl_id = $vars['artcl_id'];
        if ($artcl_id != NULL) {
            $artcl_id = (int) $artcl_id;
        }
        else {
            $artcl_id = NULL;
        }

        if (!($artcl_id === NULL || $artcl_id > 0)) {
            throw new ValidationFailException('予想外の記事が指定されています。');
        }

        $post = SuperGlobalVars::getPost();

        $title = $post['title'];
        $lenTitle = strlen($title);
        if (!($lenTitle > 0 && $lenTitle <= 50)) {
            throw new ValidationFailException("タイトルの文字数が不正です。");
        }

        $oldthumbnailName = $post['oldThumbnailName'];

        $is_thumbnail_uploaded = $post['is_thumbnail_uploaded'];
        if ($is_thumbnail_uploaded === TRUE) {
            $file = SuperGlobalVars::getFiles();
            $newThumbnailFileInfo = $file['thumbnail'];
        }
        else {
            $newThumbnailFileInfo = NULL;
        }
        

        $content = $post['content'];
        if ($content === NULL) {
            $content = '';
        }
        if (strlen($content) > 65535) {
            throw new ValidationFailException("本文が長すぎます。");
        }

        $c_id = $post['c_id'];
        $c_id = (int) $c_id;
        if ($c_id <= 0) {
            throw new ValidationFailException("予想外のカテゴリが指定されています。");
        }
        
        try {
            return new InputData($artcl_id, $title, $oldthumbnailName, $newThumbnailFileInfo, $content, $c_id);
        }
        catch(TypeError $e) {
            throw new ValidationFailException('不正なパラメータが渡されています。');
        }
    }
}
