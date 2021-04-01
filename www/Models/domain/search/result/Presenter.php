<?php

namespace domain\search\result;

use domain\search\result\Data\RecommendedArticleInfo;
use myapp\config\AppConfig;

class Presenter
{

    /**
     * @param int $publicCurrentPage
     * @param int $privateCurrentPage
     * @param int $publicSupportsTotal
     * @param int $privateSupportsTotal
     * @param int $publicPageTotal
     * @param int $privatePageTotal
     * @param SeachedSupports[] $publicSupports
     * @param SeachedSupports[] $privateSupports
     * @param bool $is_public_page
     * @param RecommendedArticleInfo[] $recommendedArticleInfos
     * @param array $searchBoxData
     * @param array $query
     * 
     * @return array [
     *      'publicCurrentPage' => int,
     *      'privateCurrentPage' => int,
     *      'publicSupportsTotal' => int,
     *      'privateSupportsTotal' => int,
     *      'publicPageTotal' => int,
     *      'privatePageTotal' => int,
     *      'publicSupports' => [
     *          [
     *              'support_content' => string,
     *              'owner' => string,
     *              'access' => string,
     *              'is_public' => bool,
     *              'appendix' => string|NULL
     *          ],
     *          []
     *      ],
     *      'privateSupports' => [ the same as publicSupports ],
     *      'is_public_page' => bool,
     *      'query' => string,
     *      'recommendedArticleInfos' => [
     *          'id' => int,
     *          'title' => string,
     *          'thumbnailName' => string
     *      ]
     * ]
     *  +$searchedBox
     * 
     * Note that return['searchedSupportOrgs']['access'] is raw html
     */
    public function present(
        int $publicCurrentPage, int $privateCurrentPage, int $publicSupportsTotal, int $privateSupportsTotal,
        int $publicPageTotal, int $privatePageTotal, array $publicSupports, array $privateSupports,
        bool $is_public_page, array $recommendedArticleInfos, array $searchBoxData, string $query,
        string $searchedAreaName
    ): array
    {

        $vm =  [
            'publicCurrentPage' => $publicCurrentPage,
            'privateCurrentPage' => $privateCurrentPage,
            'publicSupportsTotal' => $publicSupportsTotal,
            'privateSupportsTotal' => $privateSupportsTotal,
            'publicPageTotal' => $publicPageTotal,
            'privatePageTotal' => $privatePageTotal,
            'publicSupports' => $this->format($publicSupports),
            'privateSupports' => $this->format($privateSupports),
            'is_public_page' => $is_public_page,
            'recommendedArticleInfos' => $this->format($recommendedArticleInfos),
            'query' => $query,
            'searchedAreaName' => $searchedAreaName
        ];

        return $vm += $searchBoxData;
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
    public function reportUnexpectedSearch(string $message = 'Unexpected Search was executed'): int
    {
        return $this->reportValidationFailure($message);
    }


    private function format(array $datas): array
    {
        foreach ($datas as &$data) {
            if ($data != NULL) {
                $data = $data->toArray();
            }
        }

        return $datas;
    }
}
