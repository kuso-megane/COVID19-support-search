<?php

namespace domain\backyardArticleCategory\edit;

use domain\backyardArticleCategory\edit\RepositoryPort\ArticleCategoryRepositoryPort;
use domain\backyardArticleCategory\edit\Validator\Validator;

use domain\Exception\ValidationFailException;

class Interactor
{
    private $articleCategoryRepository;

    public function __construct(
        ArticleCategoryRepositoryPort $articleCategoryRepository
    )
    {
        $this->articleCategoryRepository = $articleCategoryRepository;
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

        $c_id = $input['c_id'];

        if ($c_id != NULL) {
            $articleCategory = $this->articleCategoryRepository->getArticleCategory($c_id);
            if ($articleCategory === NULL) {
                return (new Presenter)->reportNotFound("指定されたカテゴリは見つかりませんでした。");
            }
        }
        else {
            $articleCategory = NULL;
        }
        
        return (new Presenter)->present($articleCategory);
    }

}