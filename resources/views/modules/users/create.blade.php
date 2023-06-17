@extends('layouts.app')

@section('title')
    {{ __('Создать пользователя') }}
@endsection

@section('content')

    <section class="bg-white dark:bg-gray-900">
        <x-notification></x-notification>
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-36">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                {{ __('Новый пользователь') }}
            </h2>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('Имя') }}
                        </label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Введите имя') }}" required="">
                    </div>
                    <div class="w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('Почта') }}
                        </label>
                        <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Введите почту') }}" required="">
                    </div>
                    <div class="w-full">
                        <label for="rank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('Ранг') }}
                        </label>
                        <input type="number" min="0" max="100" name="rank" id="rank" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('от 0 до 100') }}" required="">
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-500 rounded-lg focus:ring-4 focus:ring-green-200 dark:focus:ring-green-900 hover:bg-green-600">
                    {{ __('Создать пользователя') }}
                </button>
                <a href="{{ route('users.index', ['page' => 1]) }}" type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg focus:ring-4 focus:ring-yellow-200 dark:focus:ring-yellow-900 hover:bg-yellow-500">
                    {{ __('Отмена') }}
                </a>
            </form>
        </div>
    </section>

@endsection
