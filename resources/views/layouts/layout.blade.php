<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: red;">
    <div class="h-screen w-full flex overflow-hidden">
	<nav class="flex flex-col bg-gray-200 dark:bg-gray-900 w-64 px-12 pt-4 pb-6">
		<!-- SideNavBar -->

		<div class="flex flex-row border-b items-center justify-between pb-2">
			<!-- Hearder -->
			<span class="text-lg font-semibold capitalize dark:text-gray-300">
				my admin
			</span>

			<span class="relative ">
				<a
					class="hover:text-green-500 dark-hover:text-green-300
					text-gray-600 dark:text-gray-300"
					href="#">
					<svg
						width="24"
						height="24"
						viewBox="0 0 24 24"
						fill="none"
						stroke="currentColor"
						stroke-width="2"
						stroke-linecap="round"
						stroke-linejoin="round">
						<path
							d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
						<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
					</svg>
				</a>
				<div
					class="absolute w-2 h-2 rounded-full bg-green-500
					dark-hover:bg-green-300 right-0 mb-5 bottom-0"></div>
			</span>

		</div>

		<div class="mt-8">
			<!-- User info -->
			
			<h2
				class="mt-4 text-xl dark:text-gray-300 font-extrabold capitalize">
				Hello
				@guest 
					Guest
				@else
					{{ Auth::user()->name }}
				@endguest
			</h2>
			<span class="text-sm dark:text-gray-300">
				<span class="font-semibold text-green-600 dark:text-green-300">
				@guest 
					Role...
				@else
					{{ Auth::user()->name }}
				@endguest
				</span>
			</span>

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
					<a href="{{ route('projects.index') }}" class="flex ">
						<span class="ml-2 capitalize font-medium text-black dark:text-gray-300">Project Admin</span>
					</a>
				</li>
				<li class="mt-8">
					<a href="{{ route('tasks.index') }}" class="flex ">
						<span class="ml-2 capitalize font-medium text-black dark:text-gray-300">Task Admin</span>
					</a>
				</li>
			@endguest

		</div>
		<div class="mt-auto flex items-center text-red-700 dark:text-red-400">
			<!-- important action -->
			<a href="{{ route('logout') }}" class="flex items-center" onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
				<svg class="fill-current h-5 w-5" viewBox="0 0 24 24">
					<path
						d="M16 17v-3H9v-4h7V7l5 5-5 5M14 2a2 2 0 012
						2v2h-2V4H5v16h9v-2h2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V4a2 2
						0 012-2h9z"></path>
				</svg>
				<span class="ml-2 capitalize font-medium">{{ __('Logout') }}</span>
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</div>
	</nav>
	<main
		class="flex-1 flex flex-col bg-gray-100 dark:bg-gray-700 transition
		duration-500 ease-in-out overflow-y-auto">
		<div class="mx-10 my-2">
			@include('layouts.nav')
			

			<div
				class="pb-2 flex items-center justify-between text-gray-600
				dark:text-gray-400 border-b dark:border-gray-600">
				<!-- Header -->

                @yield('content')

			</div>

		</div>

	</main>

</div>
</body>
</html>
