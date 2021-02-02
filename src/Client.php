<?php

namespace CTSoft\Laravel\LetterXpress;

use CTSoft\Laravel\LetterXpress\Exceptions\LxpException;
use CTSoft\Laravel\LetterXpress\Models\Letter;
use CTSoft\Laravel\LetterXpress\Requests\SetJob;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Client
{
    /**
     * The API url.
     *
     * @var string
     */
    protected $apiUrl;

    /**
     * The API user.
     *
     * @var string
     */
    protected $apiUser;

    /**
     * The API key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Client constructor.
     *
     * @param string $apiUrl
     * @param string $apiUser
     * @param string $apiKey
     */
    public function __construct(string $apiUrl, string $apiUser, string $apiKey)
    {
        $this->apiUrl = $apiUrl;
        $this->apiUser = $apiUser;
        $this->apiKey = $apiKey;
    }

    /**
     * Set a new job.
     *
     * @param Letter $letter
     * @return Letter
     * @throws LxpException
     */
    public function setJob(Letter $letter): Letter
    {
        return SetJob::getLetter(
            $this->request('setJob',
                SetJob::getPayload($letter)
            )
        );
    }

    /**
     * Perform a request to the LetterXpress API.
     *
     * @param string $function
     * @param array  $payload
     * @return array
     * @throws LxpException
     */
    protected function request(string $function, array $payload): array
    {
        $url = Str::finish($this->apiUrl, '/') . $function;

        $payload = array_merge([
            'auth' => [
                'username' => $this->apiUser,
                'apikey'   => $this->apiKey,
            ],
        ], $payload);

        try {
            $response = Http::post($url, $payload)->throw()->json();
        } catch (HttpClientException $exception) {
            throw new LxpException('HTTP request failed.', 0, $exception);
        }

        if (is_null($response)) {
            throw new LxpException('Invalid JSON response.');
        }

        if ($response['status'] !== 200) {
            throw new LxpException($response['message'], $response['status']);
        }

        return $response;
    }
}
