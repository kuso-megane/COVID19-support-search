<?php

namespace domain\backyardArticle\index;

use domain\backyardArticle\index\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\index\RepositoryPort\ArticleTitlesRepositoryPort;

class Interactor
{

    private $articleTitlesRepository;
    private $articleCategoryNamesRepository;
    
    public function __construct(
        ArticleTitlesRepositoryPort $articleTitlesRepository,
        ArticleCategoryNamesRepositoryPort $articleCategoryNamesRepository
    )
    {
        $this->articleTitlesRepository = $articleTitlesRepository;
        $this->articleCategoryNamesRepository = $articleCategoryNamesRepository;
    }


    /**
     * @return array
     * 
     * refer to Presenter
     */
    public function interact()
    {
        $articleTitles = $this->articleTitlesRepository->getArticleTitles();
        $articleCategoryNames = $this->articleCategoryNamesRepository->getArticleCategoryNames();

        return (new Presenter)->present($articleTitles, $articleCategoryNames);
    }
}
