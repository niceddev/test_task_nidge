<?php

namespace App\Services;

class RedisService
{
    public function getAllUserIds(array $keys): array
    {
        $ids = [];
        foreach ($keys as $key) {
            $ids[] = intval(substr($key, strpos($key, ":") + 1));
        }

        return $ids;
    }

}
