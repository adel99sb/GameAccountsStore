{{-- resources/views/admin/approve.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Approval') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Pending Admin Approvals
                    </div>

                    <div class="mt-6 text-gray-500">
                        @foreach ($pendingAdmins as $admin)
                            <div class="mt-4">
                                <div class="flex items-center">
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        {{ $admin->name }}
                                    </div>
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        {{ $admin->email }}
                                    </div>
                                    <div class="ml-4 text-lg leading-7 font-semibold">
                                        <form method="POST" action="{{ route('admin.postApprove', $admin->id) }}">
                                            @csrf
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Approve
                                            </button>
                                        </form>
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
