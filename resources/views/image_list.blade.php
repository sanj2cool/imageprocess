<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pending Image List') }}
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
                            <h2 class="mb-4">All Pending Image List </h2>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Image Link</th>
                                        <th>User Input</th>
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
                                            <td>{{ $image->input }}</td>
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
