<?php

namespace App\Service;

use App\Repository\ThemeRepository;

class SkillService
{
    private ThemeRepository $repository;

    public function __construct(ThemeRepository $repository)
    {
        $this->repository=$repository;
    }

    public function getSkills(?string $term, string $field)
    {
        $res= [];
        $skills= $this->repository->getSkills($term, $field);
        foreach ($skills as $skill) {
            $res[] = ['id'=>$skill['name'], 'text'=>$skill['name']];
        }

        return $res;
    }
}
