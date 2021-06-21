<?php

namespace domain\backyardSupportOrgs\index;

use myapp\config\AppConfig;

class Presenter
{
    /**
     * @param array|NULL $searchedSupports
     * @param array $areaList
     * 
     * @return array
     * [
     *      'searchedSupports' => [
     *          [
     *              'id' => int,
     *              'area_id' => int,
     *              'owner' => string,
     *              'support_content' => string,
     *              'appendix' => string
     *          ],
     *          []
     *      ] or empty array,
     *      'areaList' => [
     *          (int)id => (string)name, ...
     *      ]
     * ]
     */
    public function present(?array $searchedSupports, array $areaList):array
    {
        $areaList = $this->formatForAreaList($areaList);

        if ($searchedSupports !== NULL) {
            $searchedSupports = $this->format($searchedSupports);
        }
        else {
            $searchedSupports = [];
        }

        return compact('areaList', 'searchedSupports');
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


    private function format(array $datas):array
    {
        foreach($datas as &$data) {
            $data = $data->toArray();
        }

        return $datas;
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