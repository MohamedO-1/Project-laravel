@extends ('layouts.layout')

@section('topmenu_items')
    <!-- Top Navnar -->

@endsection

@section('content')

     <div class="container mx-1">
        <div class="ml-2 flex flex-col">
            <h2 class="my-4 text-4xl font-semibold text-gray-600 dark:text-grey-400">
              Error
            </h2>
            <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8"
                 style="...">
                 {{ $exception->getMessage() }}
            </div>
        </div>
    </div>  



    <ul class="mt-2 text-gray-600">   
    @guest
        <li class="mt-8">
            <a href="{{ route('login') }}">
                <span class="ml-2 capitalize font-medium text-black dark:text-gray-300">{{ __('Login') }}</span>
            </a>
        </li>
        @if (Route::has('register'))
            <li class="mt-8">
                <a href="{{ route('register') }}">
                    <span class="ml-2 capitalize font-medium text-black dark:text-gray-300">{{ __('Register') }}</span>
                </a>
            </li>
        @endif

    @else
        <li class="mt-8">
            <a href="{{ route('projects.index') }}" class="flex">
                <span class="ml-2 capitalize font-medium text-black dark:text-gray-300">Project Admin</span>
            </a>
        </li>
    @endguest
    </ul>

      
@endsection     