<?php

namespace domain\backyardTroubleList\edit;

use myapp\config\AppConfig;

use function PHPUnit\Framework\isEmpty;

class Presenter
{

    /**
     * @param OldTrouble[] $oldTroubles -- if this is creation of new trouble, this is empty array
     * @param ArticleCategoryName[] $articleCategoryNames
     * @param string $csrfToken
     * 
     * @return array
     * [
     *      'oldTroubles' => [
     *          'id' => int,
     *          'name' => string,
     *          'articleC_id' => int
     *      ],
     *      'articleCategoryNames' => [
     *          'id' => int,
     *          'name' => string
     *      ],
     *      'csrfToken' => string
     * ]
     */
    public function present(array $oldTroubles, array $articleCategoryNames, string $csrfToken): array
    {
        $oldTroubles = (isEmpty($oldTroubles)) ? [] : $this->format($oldTroubles);
        $articleCategoryNames = $this->formatForArticleCategoryNames($articleCategoryNames);

        return compact('oldTroubles', 'articleCategoryNames', 'csrfToken');
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




    private function format(array $objects): array
    {
        foreach ($objects as &$object) {
            $object = $object->toArray();
        }

        return $objects;
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