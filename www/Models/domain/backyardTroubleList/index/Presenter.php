<?php

namespace domain\backyardTroubleList\index;

class Presenter
{
    /**
     * @param array $troubleList
     * @param array $articleCategoryNames
     * 
     * 
     * @return array 
     * [
     *      'troubleList' => [
     *          [
     *              'id' => int,
     *              'name' => string,
     *              'meta_word' => string,
     *              'articleC_id' => int
     *          ],
     *          []  
     *      ],
     *      articleCategoryNames => [
     *          (int) id => (string) name,
     *          (int) id => (string) name, ...
     *      ]
     * ]
     */
    public function present(array $troubleList, array $articleCategoryNames):array
    {
        $troubleList = $this->format($troubleList);
        $articleCategoryNames = $this->formatForArticleCategoryNames($articleCategoryNames);

        return compact('troubleList', 'articleCategoryNames');
    }


    private function format(array $objects):array
    {
        foreach ($objects as &$object) {
            $object = $object->toArray();
        }

        return $objects;
    }


    private function formatForArticleCategoryNames(array $objects):array
    {
        $formatted = [];

        foreach ($objects as $object) {
            $data = $object->toArray();
            $id = $data['id'];
            $name = $data['name'];

            $formatted[$id] = $name;
        }

        return $formatted;
    }
}
