<?php

namespace domain\search\result\Data;

class InputData
{
    private $trouble_id;
    private $region_id;
    private $area_id;
    private $is_foreign_ok;
    private $is_public_page;
    private $pub_p;
    private $pri_p;


    public function __construct(int $trouble_id, int $region_id, int $area_id, bool $is_foreign_ok,
    bool $is_public_page, int $pub_p, int $pri_p)
    {
        $this->trouble_id = $trouble_id;
        $this->region_id = $region_id;
        $this->area_id = $area_id;
        $this->is_foreign_ok = $is_foreign_ok;
        $this->is_public = $is_public_page;
        $this->pub_p = $pub_p;
        $this->pri_p = $pri_p;
   }


    public function toArray():array
    {
        return [
            'trouble_id' => $this->trouble_id,
            'region_id' => $this->region_id,
            'area_id' => $this->area_id,
            'is_foreign_ok' => $this->is_foreign_ok,
            'is_public' => $this->is_public_page,
            'pub_p' => $this->pub_p,
            'pri_p' => $this->pri_p
        ];
    }
}
