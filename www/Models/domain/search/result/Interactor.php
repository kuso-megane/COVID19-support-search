<?php

namespace domain\search\result;

use domain\Exception\ValidationFailException;
use domain\search\result\RepositoryPort\MetaTroubleRepositoryPort;
use domain\search\result\RepositoryPort\SearchedSupportsRepositoryPort;
use domain\search\result\Validator\Validator;
use domain\components\searchBox\Interactor as SearchBoxInteractor;
use myapp\config\AppConfig;

class Interactor
{
    private $searchedSupportOrgsRepository;
    private $metaTroubleRepository;

    public function __construct(
        SearchedSupportsRepositoryPort $searchedSupportOrgsRepository,
        MetaTroubleRepositoryPort $metaTroubleReporitory
    )
    {
        $this->searchedSupportOrgsRepository = $searchedSupportOrgsRepository;
        $this->metaTroubleRepository = $metaTroubleReporitory;
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
        $region_id = $input['region_id'];
        $area_id = $input['area_id'];
        $is_only_foreign_ok = $input['is_only_foreign_ok'];
        $is_public_page = $input['is_public_page']; //　最初に表示するタブが公的か民間か
        $pub_p = $input['pub_p'];
        $pri_p = $input['pri_p'];

        $metaTrouble = $this->metaTroubleRepository->getMetaTrouble($trouble_id);

        if ($metaTrouble === NULL) {
            return (new Presenter)->reportUnexpectedSearch('想定外の「困っていること」が指定されています。');
        }

        $publicSupportsTotal = 0;
        $publicSupports = $this->searchedSupportOrgsRepository->searchSupports(
            $publicSupportsTotal, $metaTrouble, $region_id, $area_id, $is_only_foreign_ok, TRUE, $pub_p
        );

        $privateSupportsTotal = 0;
        $privateSupports = $this->searchedSupportOrgsRepository->searchSupports(
            $privateSupportsTotal, $metaTrouble, $region_id, $area_id, $is_only_foreign_ok, FALSE, $pri_p
        );

        //全国の団体を追加
        $zenkoku_publicSupportsTotal = 0;
        $publicSupports = array_merge($publicSupports,
            $this->searchedSupportOrgsRepository->searchSupports(
                $zenkoku_publicSupportsTotal, $metaTrouble, $region_id, AppConfig::ZENKOKU_ID, $is_only_foreign_ok, TRUE, $pub_p
            )
        );
        $publicSupportsTotal += $zenkoku_publicSupportsTotal;

        $zenkoku_privateSupportsTotal = 0;
        $privateSupports = array_merge($privateSupports, 
            $this->searchedSupportOrgsRepository->searchSupports(
                $zenkoku_privateSupportsTotal, $metaTrouble, $region_id, AppConfig::ZENKOKU_ID, $is_only_foreign_ok, FALSE, $pri_p
            )
        );
        $privateSupportsTotal += $zenkoku_privateSupportsTotal;
        


        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        try {
            $searchBoxData = $container->get(SearchBoxInteractor::class)->interact();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $publicPageTotal = (int) ($publicSupportsTotal / AppConfig::SUPPORTS_NUM) + 1;
        $privatePageTotal = (int) ($privateSupportsTotal / AppConfig::SUPPORTS_NUM) + 1;

        return (new Presenter)->present(
            $pub_p, $pri_p, $publicSupportsTotal, $privateSupportsTotal, $publicPageTotal,
            $privatePageTotal, $publicSupports, $privateSupports, $is_public_page, $searchBoxData
        );

    }
}
