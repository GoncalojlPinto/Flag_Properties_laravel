<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
			rel="stylesheet"
		/>
		<title>Flag Properties</title>
	</head>
	<body
		x-data="sidebar()"
		class="bg-gray-200 text-gray-700"
		@resize.window="handleResize()"
	>
		<div class="xl:flex">
			<div
				x-show="isOpen()"
				class="fixed xl:static inset-0 flex bg-white bg-opacity-75 h-screen"
			>
				<div
					@click.away="handleAway()"
					class="w-80 text-white bg-yellow-800 shadow"
				>
					<div class="flex bg-yellow-900 content-between">
						<div class="p-3 w-full">Flag Properties</div>
						<a
							@click.prevent="handleClose()"
							class="p-3 hover:bg-yellow-500 flex-1 flex items-center"
							href="#"
						>
							<svg
								class="h-5 w-5"
								xmlns="http://www.w3.org/2000/svg"
								fill="none"
								viewBox="0 0 24 24"
								stroke="currentColor"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									stroke-width="2"
									d="M6 18L18 6M6 6l12 12"
								/>
							</svg>
						</a>
					</div>
					<a
						class="flex items-center w-full p-3 hover:bg-yellow-500"
						href="{{ url('/adminpanel')}}"
					>
						<svg
							class="h-6 w-6 mr-3"
							xmlns="http://www.w3.org/2000/svg"
							fill="none"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
							/>
						</svg>
						{{ __('Home')}}
					</a>
					<a
						class="flex items-center w-full p-3 hover:bg-yellow-500"
						href="{{ url('admin/users')}}"
						><svg
							class="h-6 w-6 mr-3"
							xmlns="http://www.w3.org/2000/svg"
							fill="none"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
							/>
						</svg>
						{{ __('Gerir Usuários')}}
					</a>
					<a
						class="flex items-center w-full p-3 hover:bg-yellow-500"
						href="#"
						><svg
							class="h-6 w-6 mr-3"
							xmlns="http://www.w3.org/2000/svg"
							fill="none"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
							/>
						</svg>
						Statistics
					</a>
					<a
						class="flex items-center w-full p-3 hover:bg-yellow-500"
						href="#"
						><svg
							class="h-6 w-6 mr-3"
							xmlns="http://www.w3.org/2000/svg"
							fill="none"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
							/>
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
							/>
						</svg>
						Settings
					</a>
				</div>
			</div>
			<div>
				<nav class="text-yellow-700 bg-white flex">
					<div x-show="!isOpen()" class="flex">
						<a
							x-show="!isOpen()"
							@click.prevent="handleOpen()"
							class="p-3 hover:bg-yellow-500 hover:text-white"
							href="#"
						>
							<svg
								class="h-6 w-6"
								xmlns="http://www.w3.org/2000/svg"
								fill="none"
								viewBox="0 0 24 24"
								stroke="currentColor"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									stroke-width="2"
									d="M4 6h16M4 12h16M4 18h16"
								/>
							</svg>
						</a>
						<a
							class="p-3 hover:bg-yellow-500 hover:text-white"
							href="#"
						>
							Project Sidebar
						</a>
					</div>
					<div class="flex ml-auto">
                        <a class="p-3 hover:bg-yellow-500 hover:text-white" href="#">
                            Account
                        </a>
                    </div>
				</nav>
                <main class='class="grid gap-4 p-4 md:grid-cols-2 lg:grid-cols-3'>

                    <a class='inline-flex hover:no-underline items-center px-4 py-2 bg-yellow-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:border-yellow-900 focus:ring ring-yellow-600 disabled:opacity-25 transition ease-in-out duration-150 no-underline p-3 m-3'
                    href="{{ route('admin.users.create') }}" title="{{ __('Inserir novo Usuário') }}">
                    {{ __('Inserir Novo Usuário') }}
                </a>

                    @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>{{ __('ID') }}</td>
                <td>{{ __('Nome') }}</td>
                <td>{{ __('Email') }}</td>
                <td>{{ __('Role') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @foreach($user->getRoleNames() as $role)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $role }}</td>
                    @endforeach
                    <td>
                        <div class="d-flex align-items-center justify-content-around">
                            <a class="btn btn-small btn-success" href="#"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-small btn-info" href="#"><i class="fa fa-edit"></i></a>
                            <form action="#" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-small btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
			</div>
		</div>
    </main>
		<script>
			function sidebar() {
				const breakpoint = 1280
				return {
					open: {
						above: true,
						below: false,
					},
					isAboveBreakpoint: window.innerWidth > breakpoint,

					handleResize() {
						this.isAboveBreakpoint = window.innerWidth > breakpoint
					},

					isOpen() {
						console.log(this.isAboveBreakpoint)
						if (this.isAboveBreakpoint) {
							return this.open.above
						}
						return this.open.below
					},
					handleOpen() {
						if (this.isAboveBreakpoint) {
							this.open.above = true
						}
						this.open.below = true
					},
					handleClose() {
						if (this.isAboveBreakpoint) {
							this.open.above = false
						}
						this.open.below = false
					},
					handleAway() {
						if (!this.isAboveBreakpoint) {
							this.open.below = false
						}
					},
				}
			}
		</script>
		<script
			src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
			defer
		></script>

	</body>
</html>
