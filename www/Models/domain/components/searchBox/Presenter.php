<?php

namespace domain\components\searchBox;

use domain\components\searchBox\Data\TroubleName;
use domain\components\searchBox\Data\Area;
use myapp\config\AppConfig;

class Presenter
{
    /**
     * @param array $input
     * @param TroubleName[] $troubleNameList
     * 
     * @return array [
     *      'searched_trouble_id' => int,
     *      'searched_area_id' => int,
     *      'searched_is_foreign_ok' => bool,
     *      'troubleList' => [ ['id' => int, 'name' => string], [] ]
     * ]
     */
    public function present(array $input, array $troubleNameList):array
    {
        return [
            'searched_trouble_id' => $input['searched_trouble_id'],
            'searched_area_id' => $input['searched_area_id'],
            'searched_is_foreign_ok' => $input['searched_is_foreign_ok'],
            'troubleList' => $this->format($troubleNameList)
        ];
    }


    /**
     * @param string $message
     * 
     * @return int AppConfig::INVALID_PARAMS
     */
    public function reportValidationFailure(string $message = 'Invalid url was given')
    {
        http_response_code(400);
        echo $message;
        return AppConfig::INVALID_PARAMS;
    }


    /**
     * @param TroubleName[] $data
     * 
     * @return array [
     *      ['id' => int, 'name' => string],
     *      []
     * ]
     */
    private function format(array $datas)
    {
        foreach ($datas as &$data) {
            $data = $data->toArray();
        }

        return $datas;
    }
}
