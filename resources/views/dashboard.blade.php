<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex">
                    <div class="w-1/4">
                        <x-sidebar />
                    </div>
                    <div class="w-3/4">
                        <div class="content container mt-5">
                            <h2 class="mb-4">Image List</h2>
                            <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                                <select name="status" onchange="this.form.submit()" class="border border-gray-300 rounded p-2">
                                    <option value="">-- Select Status --</option>
                                    <option value="Ready for QA" {{ request('status') == 'Ready for QA' ? 'selected' : '' }}>Ready for QA</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="complete" {{ request('status') == 'complete' ? 'selected' : '' }}>Complete</option>
                                    <!-- Add more status options as needed -->
                                </select>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Image Link</th>
                                        <th>Image Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($images as $image)
                                        <tr>
                                            <td>{{ $image->id }}</td>
                                            <td>
                                                @if ($image->google_img)
                                                    <a href="/image-list/{{ $image->id }}" target="_blank">
                                                        View Image
                                                    </a>
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $image->status }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No Images Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->

</x-app-layout>
