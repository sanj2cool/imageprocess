<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload CSV Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

<form action="{{ route('imageprocess.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="csv_file">Choose CSV File:</label>
        <input type="file" name="csv_file" id="csv_file" required>
    </div>
    <div class=" py-6">
    <x-primary-button name="update_csv" class="ms-4 my-12">
        Import CSV
    </x-primary-button>
    </div>
</form>
<a href="{{ route('export.csv') }}" class="btn btn-primary">Download CSV</a>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if (session('error'))
    <p>{{ session('error') }}</p>
@endif


</div>
</div>
</div>
</div>

</x-app-layout>