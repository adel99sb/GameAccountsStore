{{-- resources/views/orders/boost_orders.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Boost Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Boost Orders
                    </div>

                    <div class="mt-6 text-gray-500">
                        @foreach ($boostOrders as $order)
                            <div class="mt-4">
                                <div class="flex items-center">
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        {{ $order->game_name }} ({{ $order->status }})
                                    </div>
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        {{ $order->platform }} - {{ $order->region }}
                                    </div>
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        {{ $order->start_tier }} {{ $order->start_division }} -> {{ $order->desired_tier }} {{ $order->desired_division }}
                                    </div>
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        ${{ $order->price }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
