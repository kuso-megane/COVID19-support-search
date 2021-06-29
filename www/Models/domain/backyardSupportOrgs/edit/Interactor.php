<?php

namespace domain\backyardSupportOrgs\edit;

use domain\backyardSupportOrgs\edit\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\components\adminLoginCheck\Interactor as LoginChecker;
use myapp\config\AppConfig;
use domain\backyardSupportOrgs\edit\RepositoryPort\AreaListRepositoryPort;
use domain\backyardSupportOrgs\edit\RepositoryPort\OldSupportOrgRepositoryPort;
use domain\components\csrfValidate\Interactor as CsrfValidator;

class Interactor
{
    private $areaListRepository;
    private $oldSupportOrgRepository;

    public function __construct(
        AreaListRepositoryPort $areaListRepository,
        OldSupportOrgRepositoryPort $oldSupportOrgRepository
    )
    {
        $this->areaListRepository = $areaListRepository;
        $this->oldSupportOrgRepository = $oldSupportOrgRepository;
    }

    /**
     * @param array $vars
     * 
     * @return array
     * 
     * refer to Presenter
     */
    public function interact(array $vars)
    {
        $isLogin = (new LoginChecker)->interact();
        if ($isLogin === FALSE) {
            return AppConfig::NOT_LOGIN;
        }

        try {
            $input = (new Validator)->validate($vars)->toArray();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $id = $input['id'];

        session_start();
        $csrfToken = (new CsrfValidator)->generateTokenAndSetSession();

        if ($id !== NULL) {
            $oldSupportOrg = $this->oldSupportOrgRepository->getOldSupportOrg($id);

            if ($oldSupportOrg === NULL) {
                return (new Presenter)->reportNotFound('お探しの支援団体は見つかりませんでした。');
            }
        }
        else {
            $oldSupportOrg = NULL;
        }

        $areaList = $this->areaListRepository->getAreaList();

        

        return (new Presenter)->present($areaList, $oldSupportOrg, $csrfToken);
    }
}