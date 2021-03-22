<?php

namespace domain\search\result;

use domain\search\result\Data\SearchedSupportOrg;
use myapp\config\AppConfig;

class Presenter
{

    /**
     * @param SeachedSupportOrg[] $publicSupports
     * @param SeachedSupportOrg[] $privateSupports
     * @param bool $is_public_page
     * @param array $searchBoxData
     * 
     * @return array [
     *      'publicSupports' => [
     *          [
     *              'support_content' => string,
     *              'owner' => string,
     *              'access' => string,
     *              'is_public' => $this->is_public,
     *              'appendix' => $this->appendix
     *          ],
     *          []
     *      ]
     * 
     *      'privateSupports' => [ the same as publicSupports ],
     *      'is_public_page' => bool
     * ]
     *  +$searchedBox
     * 
     * Note that return['searchedSupportOrgs']['access'] is raw html
     */
    public function present(array $publicSupports, array $privateSupports, bool $is_public_page, array $searchBoxData): array
    {
        return [
            'publicSupports' => $this->format($publicSupports),
            'privateSupports' => $this->format($privateSupports),
            'is_public_page' => $is_public_page,
            'searchedBoxData' => $searchBoxData
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


    private function format(array $searchedSupportOrgs): array
    {
        foreach ($searchedSupportOrgs as &$searchedSupportOrg) {
            $searchedSupportOrg = $searchedSupportOrg->toArray();
        }

        return $searchedSupportOrgs;
    }
}
