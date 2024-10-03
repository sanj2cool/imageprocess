<div class="sidebar w-64 bg-white-800 text-black h-full">
    <ul class="list-none p-0">
        <li class="py-2">
            <a href="{{ route('dashboard') }}" class="block px-4 hover:bg-gray-700">All Images</a>
        </li>
        <li class="py-2">
            <a href="{{ route('image.list') }}" class="block px-4 hover:bg-gray-700">Pending</a>
        </li>
        <li class="py-2">
            <a href="{{ route('ready.qa') }}" class="block px-4 hover:bg-gray-700">Ready for QA</a>
        </li>
        <li class="py-2">
            <a href="{{ route('complete') }}" class="block px-4 hover:bg-gray-700">Completed</a>
        </li>
        
        <!-- Add more sidebar links as needed -->
        <li class="py-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger w-50 mt-3">Logout</button>
            </form>
        </li>
    </ul>
</div>
