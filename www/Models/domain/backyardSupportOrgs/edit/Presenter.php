<?php

namespace domain\backyardSupportOrgs\edit;

use domain\backyardSupportOrgs\edit\Data\OldSupportOrg;
use myapp\config\AppConfig;

class Presenter
{

    /**
     * @param Area[] $areaList
     * @param OldSupportOrg|NULL $oldSupportOrg
     * @param string $csrfToken
     * 
     * @return array
     * [
     *      'areaList' => [
     *          (int)id => (string)name
     *      ],
     *      'oldSupportOrg' => NULL or [
     *          'id' => int,
     *          'area_id' => int,
     *          'support_content' => string,
     *          'owner' => string,
     *          'access' => string,
     *          'is_foreign_ok =< 0|1,
     *          'is_public' => 0|1,
     *          'appendix' => string
     *      ],
     *      'csrfToken' => string
     * ]
     */
    public function present(array $areaList, ?OldSupportOrg $oldSupportOrg, $csrfToken): array
    {
        $areaList = $this->formatForAreaList(($areaList));
        $oldSupportOrg = ($oldSupportOrg !== NULL) ? $oldSupportOrg->toArray() : [];

        return compact('areaList', 'oldSupportOrg', 'csrfToken');
    }


    /**
     * @param string $message
     * 
     * @return int AppConfig::INVALID_PARAMS
     */
    public function reportValidationFailure(string $message = 'Invalid url was given'): int
    {
        http_response_code(400);
        echo $message;
        return AppConfig::INVALID_PARAMS;
    }


    /**
     * @param string $message
     * 
     * @return int AppConfig::INVALID_PARAMS
     */
    public function reportNotFound(string $message = 'Requested resource was not found'): int
    {
        http_response_code(404);
        echo $message;
        return AppConfig::INVALID_PARAMS;
    }


    /**
     * @param string $message
     * 
     * @return int AppConfig::INVALID_ACCESS
     */
    public function reportInvalidAccess(string $message = 'The necessary token not found. This is probably invalid form')
    {
        http_response_code(403);
        echo $message;
        return AppConfig::INVALID_ACCESS;
    }


    private function formatForAreaList(array $datas): array
    {
        $ans = [];
        foreach ($datas as $data) {
            $data = $data->toArray();
            $id = $data['id'];
            $name = $data['name'];

            $ans[$id] = $name;
        }

        return $ans;
    }
}