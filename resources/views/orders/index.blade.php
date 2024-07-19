{{-- resources/views/orders/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Manage Orders
                    </div>

                    <div class="mt-6 text-gray-500">
                        <a href="{{ url('/orders/boost') }}" class="text-blue-500 hover:text-blue-700">Boost Orders</a>
                    </div>
                    <div class="mt-6 text-gray-500">
                        <a href="{{ url('/orders/coaching') }}" class="text-blue-500 hover:text-blue-700">Coaching Orders</a>
                    </div>
                    <div class="mt-6 text-gray-500">
                        <a href="{{ url('/orders/wins') }}" class="text-blue-500 hover:text-blue-700">Wins Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
