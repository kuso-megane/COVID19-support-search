<?php

namespace domain\components\searchBox;

use domain\components\searchBox\Validator\Validator;
use domain\Exception\ValidationFailException;
use myapp\config\AppConfig;
use myapp\myFrameWork\SuperGlobalVars;
use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;
use domain\components\searchBox\RepositoryPort\AreaListRepositoryPort;

class Interactor
{
    private $troubleNameListRepository;
    private $areaListRepository;

    public function __construct(
        TroubleNameListRepositoryPort $troubleNameListRepository,
        AreaListRepositoryPort $areaListRepository
    )
    {
        $this->troubleNameListRepository = $troubleNameListRepository;
        $this->areaListRepository = $areaListRepository;
    }

    /**
     * 
     * @return int AppConfig::POST_SUCCESS or AppConfig::INVALID_PARAMS
     * 
     * if validation fails, this returns AppConfig::INVALID_PARAMS
     * if post succeeds, this returns AppConfig::POST_SUCCESS
     */
    public function interact()
    {
        $cookie = (new SuperGlobalVars)->getCookie();
        try {
            $input = (new Validator)->validate($cookie)->toArray();
        }
        catch (ValidationFailException $e) {
            
        }

        $troubleNameList = $this->troubleNameListRepository->getTroubleNameList();
        $areaList = $this->areaListRepository->getAreaList();

        

    }
}