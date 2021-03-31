<?php

namespace domain\search\result;

use domain\Exception\ValidationFailException;
use domain\search\result\RepositoryPort\SearchItemsRepositoryPort;
use domain\search\result\RepositoryPort\SearchedSupportsRepositoryPort;
use domain\search\result\Validator\Validator;
use domain\components\searchBox\Interactor as SearchBoxInteractor;
use domain\search\result\RepositoryPort\RecommendedArticlesRepositoryPort;
use myapp\config\AppConfig;
use myapp\myFrameWork\SuperGlobalVars;

class Interactor
{
    private $searchedSupportOrgsRepository;
    private $searchItemsRepository;
    private $recommendedArticleInfosRepository;

    public function __construct(
        SearchedSupportsRepositoryPort $searchedSupportOrgsRepository,
        SearchItemsRepositoryPort $searchItemsReporitory,
        RecommendedArticlesRepositoryPort $recommendedArticleInfosRepository
    )
    {
        $this->searchedSupportOrgsRepository = $searchedSupportOrgsRepository;
        $this->searchItemsRepository = $searchItemsReporitory;
        $this->recommendedArticleInfosRepository = $recommendedArticleInfosRepository;
    }

    /**
     * @param array $vars
     * 
     * @return array|int refer to Presenter 
     */
    public function interact(array $vars)
    {
        try {
            $input = (new Validator)->validate($vars)->toArray();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $trouble_id = $input['trouble_id'];
        $area_id = $input['area_id'];
        $is_only_foreign_ok = $input['is_only_foreign_ok'];
        $is_public_page = $input['is_public_page']; //　最初に表示するタブが公的か民間か
        $pub_p = $input['pub_p'];
        $pri_p = $input['pri_p'];


        $searchItems = $this->searchItemsRepository->getSearchItems($trouble_id)->toArray();
        $meta_word = $searchItems['meta_word'];
        $articleC_id = $searchItems['articleC_id'];
 
        if ($meta_word === NULL || $articleC_id === NULL) {
            return (new Presenter)->reportUnexpectedSearch('想定外の「困っていること」が指定されています。');
        }


        $publicSupportsTotal = 0;
        $publicSupports = $this->searchedSupportOrgsRepository->searchSupports(
            $publicSupportsTotal, $meta_word, $area_id, $is_only_foreign_ok, TRUE, $pub_p
        );

        $privateSupportsTotal = 0;
        $privateSupports = $this->searchedSupportOrgsRepository->searchSupports(
            $privateSupportsTotal, $meta_word, $area_id, $is_only_foreign_ok, FALSE, $pri_p
        );

        $recommendedArticleInfos = $this->recommendedArticleInfosRepository
        ->getRecommendedArticleInfos($articleC_id, AppConfig::MAXNUM_RECOMMENDED_ARTICLES);


        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        try {
            $searchBoxData = $container->get(SearchBoxInteractor::class)->interact();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $publicPageTotal = (int) ($publicSupportsTotal / AppConfig::MAXNUM_PER_PAGE);
        if ($publicSupportsTotal % AppConfig::MAXNUM_PER_PAGE != 0) {
            $publicPageTotal += 1;
        }
        $privatePageTotal = (int) ($privateSupportsTotal / AppConfig::MAXNUM_PER_PAGE);
        if ($privateSupportsTotal % AppConfig::MAXNUM_PER_PAGE != 0) {
            $privatePageTotal += 1;
        }

        $uri = (new SuperGlobalVars)->getServer()['REQUEST_URI'];
        if (false !== $pos = strpos($uri, '?')) {
            $query = substr($uri, $pos);
        }

        return (new Presenter)->present(
            $pub_p, $pri_p, $publicSupportsTotal, $privateSupportsTotal, $publicPageTotal,
            $privatePageTotal, $publicSupports, $privateSupports, $is_public_page, $recommendedArticleInfos,
            $searchBoxData, $query
        );

    }
}
