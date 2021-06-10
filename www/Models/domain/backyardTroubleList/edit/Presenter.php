<?php

namespace domain\backyardTroubleList\edit;

use domain\backyardTroubleList\edit\Data\OldTrouble;
use myapp\config\AppConfig;


class Presenter
{

    /**
     * @param OldTrouble|NULL $oldTrouble -- if this is creation of new trouble, this is empty array
     * @param ArticleCategoryName[] $articleCategoryNames
     * @param string $csrfToken
     * 
     * @return array
     * [
     *      'oldTrouble' => [
     *          'id' => int,
     *          'name' => string,
     *          'articleC_id' => int
     *      ],
     *      'articleCategoryNames' => [
     *          (int)id => (string)name, ...
     *      ],
     *      'csrfToken' => string
     * ]
     */
    public function present(?OldTrouble $oldTrouble, array $articleCategoryNames, string $csrfToken): array
    {
        $oldTrouble = ($oldTrouble === NULL) ? [] : $oldTrouble->toArray();
        $articleCategoryNames = $this->formatForArticleCategoryNames($articleCategoryNames);

        return compact('oldTrouble', 'articleCategoryNames', 'csrfToken');
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
     * @return array
     * [
     *      (int)id => (string)name, ...
     * ]
     * 
     */
    private function formatForArticleCategoryNames(array $objects): array
    {
        $ans = [];

        foreach ($objects as &$object) {
            $data = $object->toArray();
            $id = $data['id'];
            $name = $data['name'];

            $ans[$id] = $name;
        }

        return $ans;
    }
}