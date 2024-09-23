@extends('layouts.app')

@section('title', 'Admin')

@section('content')
<div class="py-2">
    <div class="w-full mx-auto">
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700 border-1 p-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2 pl-6">
                    Tambahkan Data User
                </h2>
                <div class="p-6 text-gray-100 grid gap-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="nama" class="block text-sm font-medium">Nama User</label>
                                <div class="relative">
                                    <input id="nama"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="name" required autofocus />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fa-solid fa-clipboard-list h-5 w-5 text-yellow-400"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium">Email User</label>
                                <div class="relative">
                                    <input id="email"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="email" required />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fa-solid fa-file-signature h-5 w-5 text-red-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="password" class="block text-sm font-medium">Password</label>
                                <div class="relative">
                                    <input id="password"
                                        class="block mt-1 w-full pl-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="password" required />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fa-solid fa-hashtag h-5 w-5 text-green-400"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="confirm_password" class="block text-sm font-medium">Confirm Password</label>
                                <div class="relative">
                                    <input id="status"
                                        class="block mt-1 w-full pl-10 pr-10 bg-gray-700 border-gray-600 rounded-md"
                                        type="text" name="password_confirmation" required />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="fa-solid fa-scale-balanced w-5 h-5 text-blue-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end my-4">
                    <button type="submit"
                    class="bg-gray-800 hover:bg-gray-700 text-white text-sm font-bold py-2 px-4 rounded-lg inline-flex items-center">
                    <i class="fa-solid fa-plus w-4 h-4 mr-1"></i>
                    Add User
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
