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

        unlink($oldThumbnailName);
        $newThumbnailName = (new ImgUploadInteractor)->interact($newThumbnailFileInfo);

        $isSuccess = $this->postArticleRepository->postArticle($artcl_id, $title, $newThumbnailName, $content, $c_id);

        return (new Presenter)->present($isSuccess);
    }
}