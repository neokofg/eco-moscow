<?php

namespace App\Services\V1;

use App\Contracts\ServiceInterfaces\OauthServiceInterface;
use App\Exceptions\Custom\Oauth\FailedToGetTokenException;
use App\Repositories\V1\UserRepository;
use App\Traits\TokenTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

final readonly class OauthService implements OauthServiceInterface
{
    use TokenTrait;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    /**
     * @param int $code
     * @return string
     * @throws FailedToGetTokenException
     */
    public function oauthYandex(int $code): string
    {
        try {
            $accessToken = $this->getToken($code);

            $data = $this->getUser($accessToken);
        } catch (\Throwable $exception) {
            throw new FailedToGetTokenException();
        }

        return DB::transaction(function () use ($data) {
            $user = $this->userRepository->createUser(
                name: $data['first_name'] ?? '-',
                surname: $data['last_name'] ?? '-',
                email: $data['default_email'],
                is_oauth: true
            );

            return $this->createUserToken($user);
        });
    }

    /**
     * @param string $accessToken
     * @return array
     * @throws ConnectionException
     */
    private function getUser(string $accessToken): array
    {
        $response = Http::withHeader('Authorization', 'OAuth ' . $accessToken)
            ->get('https://login.yandex.ru/info?format=json');
        return json_decode($response->getBody(), true);
    }

    /**
     * @param int $code
     * @return string
     * @throws GuzzleException
     */
    private function getToken(int $code): string
    {
        $clientId = config('services.yandex.client_id');
        $clientSecret = config('services.yandex.client_secret');
        $request = new Client();
        $response = $request->post('https://oauth.yandex.ru/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        return $data['access_token'];
    }
}
