<?php

namespace domain\backyardArticle\post;

use domain\backyardArticle\post\RepositoryPort\PostArticleRepositoryPort;
use domain\backyardArticle\post\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\components\imgUpload\Interactor as ImgUploadInteractor;
use myapp\config\AppConfig;
use PDO;
use PDOException;

class Interactor
{
    private $postArticleRepository;

    public function __construct(
        PostArticleRepositoryPort $postArticleRepository
    )
    {
        $this->postArticleRepository = $postArticleRepository;
    }


    /**
     * @param array $vars
     * 
     * @return array|int
     * refer to Presenter
     */
    public function interact(array $vars)
    {
        try {
            $input = (new Validator)->validate($vars)->toArray();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $artcl_id = $input['artcl_id'];
        $title = $input['title'];
        $oldThumbnailName = $input['oldThumbnailName'];
        $newThumbnailFileInfo = $input['newThumbnailFileInfo'];
        $content = $input['content'];
        $c_id = $input['c_id'];
        

        if ($newThumbnailFileInfo != NULL) {
            try {
                $newThumbnailName = (new ImgUploadInteractor)->interact($newThumbnailFileInfo);
            }
            catch (ValidationFailException $e) {
                return (new Presenter)->reportValidationFailure($e->getMessage());
            }
        }
        else {
            $newThumbnailName = AppConfig::DEFAULT_IMG;
        }


        if (is_string($newThumbnailName) === FALSE) {
            return (new Presenter)->present(FALSE, '画像アップロードに失敗しました');
        }

        try {
            $this->postArticleRepository->postArticle($artcl_id, $title, $newThumbnailName, $content, $c_id);
        }
        catch (PDOException $e) {
            return (new Presenter)->present(FALSE, $e->getMessage());
        }

        //変更前サムネの消去
        if ($oldThumbnailName != NULL && $oldThumbnailName != AppConfig::DEFAULT_IMG) {
            unlink(AppConfig::UPLOAD_IMG_PATH. $oldThumbnailName);
        }

        return (new Presenter)->present(TRUE, '作成・更新に成功しました。');
    }
}
