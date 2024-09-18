<?php

namespace App\Traits;

trait FilterDataTrait
{
    /**
     * @param array $data
     * @return array
     */
    public function filterData(array $data): array
    {
        foreach($data as $key => $value) {
            if(is_null($value)) {
                unset($data[$key]);
            }
        }
        return $data;
    }
}
