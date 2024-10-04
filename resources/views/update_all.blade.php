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

                                <div class="container">
                                    <h1>Image Processes</h1>

                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    <form action="{{ route('imageprocess.removeAll') }}" method="POST">
                                        @csrf
                                       

                                        <button type="submit" class="btn btn-danger">Delete Selected</button>
                                    

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>ID</th>
                                                    <th>Input</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($images as $image)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="ids[]" value="{{ $image->id }}">
                                                        </td>
                                                        <td>{{ $image->id }}</td>
                                                        <td>{{ $image->input }}</td>
                                                        <td>{{ $image->status }}</td>
                                                        <td>
                                                            <!-- Individual delete button -->
                                                           <!-- <form action="{{ route('imageprocess.destroy', $image->id) }}" method="POST" style="display:inline;">
                                                                //@//csrf
                                                                @//method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>-->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
