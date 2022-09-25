<?php

namespace App\Interfaces;

interface ApiBaseServiceInterface
{
    /**
     * @param $result
     * @param $message
     * @param array $pagination
     * @param int $http_status
     * @param int $status_code
     * @return mixed
     */
    public function sendSuccessResponse($result, $message, array $pagination, int $http_status, int $status_code);

    /**
     * @param $message
     * @param array $errorMessages
     * @param string $status_code
     * @return mixed
     */
    public function sendErrorResponse($message, array $errorMessages, int $status_code);
}
