{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Welcome {{ Auth::user()->name }}!
                    </div>

                    <div class="mt-6 text-gray-500">
                        <a href="{{ url('/orders') }}" class="text-blue-500 hover:text-blue-700">Manage Orders</a>
                    </div>
                    @if (Auth::user()->role == 'manager')
                        <div class="mt-6 text-gray-500">
                            <a href="{{ route('admin.approve') }}" class="text-blue-500 hover:text-blue-700">Approve Admins</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
