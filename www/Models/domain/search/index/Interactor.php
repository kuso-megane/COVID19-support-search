<?php

namespace domain\search\index;

use domain\components\searchBox\Interactor as SearchBoxInteractor;
use domain\Exception\ValidationFailException;
use myapp\config\AppConfig;
use domain\search\index\RepositoryPort\RecommendedArticleInfosRepositoryPort;

class Interactor
{

    private $recommendedArticleInfosRepository;

    public function __construct(
        RecommendedArticleInfosRepositoryPort $recommendedArticleInfosRepository
    )
    {
        $this->recommendedArticleInfosRepository = $recommendedArticleInfosRepository;
    }

    /**
     * @return array
     * please refer to Presenter
     */
    public function interact()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        try {
            $searchBoxData = $container->get(SearchBoxInteractor::class)->interact();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $articles = $this->recommendedArticleInfosRepository
                    ->getRecommendedArticleInfos(AppConfig::GENERAL_C_ID, AppConfig::MAXNUM_RECOMMENDED_ARTICLES);
        
        

        return (new Presenter)->present($searchBoxData, $articles);
        
    }
}
