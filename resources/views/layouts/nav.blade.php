            <nav
				class="flex flex-row justify-between border-b
				dark:border-gray-600 dark:text-gray-400 transition duration-500
				ease-in-out">
				<div class="flex">
					<!-- Top NavBar -->

					<a
						href="{{ route('projects.index') }}"
						class="py-2 block text-green-500 border-green-500
						dark:text-green-200 dark:border-green-200
						focus:outline-none border-b-2 font-medium capitalize
						transition duration-500 ease-in-out">
						Index
					</a>

					<a	
						href="{{ route('projects.create') }}"
						class="ml-6 py-2 block text-green-500 border-green-500
						dark:text-green-200 dark:border-green-200
						focus:outline-none border-b-2 font-medium capitalize
						transition duration-500 ease-in-out">
						Create
					</a>
				</div>
				<div class="flex">
					<!-- Top NavBar -->

					<a
						href="{{ route('tasks.index') }}"
						class="py-2 block text-green-500 border-green-500
						dark:text-green-200 dark:border-green-200
						focus:outline-none border-b-2 font-medium capitalize
						transition duration-500 ease-in-out">
						Index
					</a>

					<a	
						href="{{ route('tasks.create') }}"
						class="ml-6 py-2 block text-green-500 border-green-500
						dark:text-green-200 dark:border-green-200
						focus:outline-none border-b-2 font-medium capitalize
						transition duration-500 ease-in-out">
						Create
					</a>
				</div>

			

			</nav>