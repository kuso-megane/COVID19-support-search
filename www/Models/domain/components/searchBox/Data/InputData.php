<?php

namespace domain\components\searchBox\Data;

class InputData
{
    private $trouble_id;
    private $region_id;
    private $area_id;
    private $is_foreign_ok;

    public function __construct(?int $trouble_id, ?int $region_id, ?int $area_id, ?bool $is_foreign_ok)
    {
        $this->trouble_id = $trouble_id;
        $this->region_id = $region_id;
        $this->area_id = $area_id;
        $this->is_foreign_ok = $is_foreign_ok;
    }


    public function toArray():array
    {
        return [
            'searched_trouble_id' => $this->trouble_id,
            'searched_region_id' => $this->region_id,
            'searched_area_id' => $this->area_id,
            'searched_is_foreign_ok' => $this->is_foreign_ok
        ];
    }
}
