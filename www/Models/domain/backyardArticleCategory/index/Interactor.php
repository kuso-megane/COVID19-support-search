<?php

namespace domain\backyardArticleCategory\index;

use domain\components\articleCategoryNames\RepositoryPort\ArticleCategoryNamesRepositoryPort;

class Interactor
{
    private $articleCategoryNamesRepository;

    public function __construct(
        ArticleCategoryNamesRepositoryPort $articleCategoryNamesRepository
    )
    {
        $this->articleCategoryNamesRepository = $articleCategoryNamesRepository;
    }


    /**
     * @return array
     * refer to Presenter
     */
    public function interact()
    {
        $articleCategoryNames = $this->articleCategoryNamesRepository->getArticleCategoryNames();

        return (new Presenter)->present($articleCategoryNames);
    }
}
