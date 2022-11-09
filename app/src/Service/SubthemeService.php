<?php

namespace App\Service;

use App\Repository\SubThemeRepository;
use App\Repository\ThemeRepository;

class SubthemeService
{
    private SubThemeRepository $repository;

    public function __construct(SubThemeRepository $repository)
    {
        $this->repository=$repository;
    }

    public function getDatas(?string $term, string $field)
    {
        $res= [];
        $datas= $this->repository->getDatas($term, $field);
        foreach ($datas as $data) {
            $res[] = ['id'=>$data[$field], 'text'=>$data[$field]];
        }

        return $res;
    }
}
