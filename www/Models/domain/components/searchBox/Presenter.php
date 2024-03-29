<?php

namespace domain\components\searchBox;

use domain\components\searchBox\Data\TroubleName;

class Presenter
{
    /**
     * @param array $input
     * @param TroubleName[] $troubleNameList
     * 
     * @return array [
     *      'searched_trouble_id' => int,
     *      'searched_region_id' => int,
     *      'searched_area_id' => int,
     *      'searched_is_foreign_ok' => bool,
     *      'troubleNameList' => [ ['id' => int, 'name' => string], [] ]
     * ]
     */
    public function present(array $input, array $troubleNameList):array
    {
        return [
            'searched_trouble_id' => $input['searched_trouble_id'],
            'searched_region_id' => $input['searched_region_id'],
            'searched_area_id' => $input['searched_area_id'],
            'searched_is_foreign_ok' => $input['searched_is_foreign_ok'],
            'troubleNameList' => $this->format($troubleNameList)
        ];
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
