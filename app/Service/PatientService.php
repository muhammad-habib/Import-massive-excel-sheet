<?php

namespace App\Service;

use App\Repository\PatientRepository;

class PatientService
{
    /**
     * @var  PatientRepository
     */
    protected $patientRepository;

    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function getValidRecordsCount (): int
    {
        return $this->patientRepository->getValidRecordsCount();
    }

    public function getInvalidRecordsCount (): int
    {
        return $this->patientRepository->getInvalidRecordsCount();
    }
}