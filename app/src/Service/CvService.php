<?php

namespace App\Service;

use App\Repository\CvRepository;

class CvService
{

    private CvRepository $cvRepository;

    /**
     * @param CvRepository $cvRepository
     */
    public function __construct(CvRepository $cvRepository)
    {
        $this->cvRepository = $cvRepository;
    }

    public function getData(string $field): array
    {
        $res= [];
        $datas = $this->cvRepository->getData($field);
        foreach ($datas as $data) {
            $res[] = $data[$field];
        }

        return $res;
    }

}
