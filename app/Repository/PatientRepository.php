<?php

namespace App\Repository;


use App\Patient;

class PatientRepository extends Repository
{
    public function model(): string
    {
        return Patient::class;
    }

    public function getValidRecordsCount(): int
    {
        return $this->model->where('valid', 1)->count();
    }

    public function getInvalidRecordsCount(): int
    {
        return $this->model->where('valid', 0)->count();
    }
}