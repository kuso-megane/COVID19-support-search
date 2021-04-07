<?php

namespace domain\backyardArticle\index;

use domain\backyardArticle\index\RepositoryPort\ArticleTitlesRepositoryPort;

class Interactor
{

    private $articleTitlesRepository;
    
    public function __construct(
        ArticleTitlesRepositoryPort $articleTitlesRepository
    )
    {
        $this->articleTitlesRepository = $articleTitlesRepository;
    }


    /**
     * @return array
     * 
     * refer to Presenter
     */
    public function interact()
    {
        $articleTitles = $this->articleTitlesRepository->getArticleTitles();

        return (new Presenter)->present($articleTitles);
    }
}
