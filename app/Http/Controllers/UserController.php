<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Services\RedisService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function index(RedisService $redisService)
    {
        $userIds = $redisService->getAllUserIds(Redis::keys('*'));
        $sortedUsersData = collect(
            array_map(fn($id) => (object)json_decode(Redis::hgetall('user:' . $id)['data'] ?? null, true), $userIds)
        )->sortByDesc('created_at')->values()->all();

        $page = request()->input('page', 0);
        $perPage = 25;

        $users = new LengthAwarePaginator(
            array_slice($sortedUsersData, ($page * $perPage) - $perPage, $perPage, true),
            count($sortedUsersData),
            $perPage,
            $page,
            ['path' => request()->url()]
        );

        return view('modules.users.index', compact('users'));
    }

    public function create()
    {
        return view('modules.users.create');
    }

    public function store(UserRepository $userRepository, UserRequest $userRequest)
    {
        $userRepository->createOrUpdateKey($userRequest->validated());
        return redirect()->route('users.index', ['page' => 1])->with('success', __('Успешно создан!'));
    }

    public function edit(int $userId)
    {
        $user = (object)json_decode(Redis::hgetall('user:' . $userId)['data'], true);
        return view('modules.users.edit', compact('user'));
    }

    public function update(UserRepository $userRepository, UserRequest $userRequest)
    {
        $userRepository->createOrUpdateKey($userRequest->validated());
        return redirect()->route('users.index', ['page' => 1])->with('success', 'Данные пользователя сохранены');
    }

    public function destroy(int $userId)
    {
        Redis::del('user:' . $userId);
        return redirect()->route('users.index', ['page' => 1])->with('success', __('Успешно удалено!'));
    }
}
