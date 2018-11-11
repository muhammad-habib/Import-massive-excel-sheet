<?php

namespace App\Listeners;

use App\Events\ImportFile;
use App\Service\PatientService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class SendReportEmail
{

    private $patientService;


    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    public function handle(ImportFile $event) : void
    {
        $valid = $this->patientService->getValidRecordsCount();
        $notValid = $this->patientService->getInvalidRecordsCount();
        Mail::send(
            'email', [
            'valid' => $valid,
            'notValid' => $notValid
            ],
            function ($message) {
                $message->to(config('mail.username'))->subject('Sheet Report!');
            }
        );
    }
}