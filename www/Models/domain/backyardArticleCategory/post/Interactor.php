<?php

namespace domain\backyardArticleCategory\post;

use domain\backyardArticleCategory\post\RepositoryPort\PostArticleCategoryRepositoryPort;
use domain\backyardArticleCategory\post\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\components\csrfValidate\Interactor as CsrfValidator;

class Interactor
{
    private $postArticleCategoryRepository;

    public function __construct(
        PostArticleCategoryRepositoryPort $postArticleCategoryRepository
    )
    {
        $this->postArticleCategoryRepository = $postArticleCategoryRepository;
    }


    /**
     * @param array $vars
     * @return int
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

        $c_id = $input['c_id'];
        $name = $input['name'];
        $csrfToken = $input['csrfToken'];

        session_start();
        $isCsrfTokenValid = (new CsrfValidator)->validateAndUnsetSession($csrfToken);
        if (!$isCsrfTokenValid) {
            return (new Presenter)->reportInvalidAccess('不正なフォームからの送信です。');
        }

        $isSucceeded = $this->postArticleCategoryRepository->postArticleCategory($c_id, $name);

        return (new Presenter)->present($isSucceeded);
    }
}