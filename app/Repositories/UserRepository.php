<?php

namespace App\Repositories;

use App\Services\RedisService;
use Illuminate\Support\Facades\Redis;

class UserRepository
{
    public function __construct(
        protected RedisService $redisService
    )
    {
    }

    public function createOrUpdateKey(array $userData): void
    {
        $userData = (object)$userData;

        $user = [
            'id'         => $userData->id ?? count($this->redisService->getAllUserIds(Redis::keys('*'))) + 1,
            'name'       => $userData->name,
            'email'      => $userData->email,
            'rank'       => (int)$userData->rank,
            'created_at' => now(),
        ];

        Redis::hset('user:' . $user['id'], 'data', json_encode($user));
    }

}
