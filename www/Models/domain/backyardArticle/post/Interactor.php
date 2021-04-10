<?php

namespace domain\backyardArticle\post;

use domain\backyardArticle\post\RepositoryPort\PostArticleRepositoryPort;
use domain\backyardArticle\post\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\components\imgUpload\Interactor as ImgUploadInteractor;
use myapp\config\AppConfig;

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
     * @return array
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

        if ($oldThumbnailName != NULL && $oldThumbnailName != AppConfig::DEFAULT_IMG) {
            unlink($oldThumbnailName);
        }
        

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

        $isUploadSucceeded = (is_string($newThumbnailName) === TRUE)? TRUE : FALSE;

        $isPostSucceeded = $this->postArticleRepository->postArticle($artcl_id, $title, $newThumbnailName, $content, $c_id);
        $isSuccess = $isUploadSucceeded && $isPostSucceeded;

        return (new Presenter)->present($isSuccess);
    }
}
