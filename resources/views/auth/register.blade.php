<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Create a new account
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Or
                    <a href="#" class="font-medium text-black">
                        start your 14-day free trial
                    </a>
                </p>
            </div>
            <div class="shadow-xl py-12 px-7 shadow-slate-100">
                <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}" onSubmit={registerSubmit}>
                  @csrf
                    <input type="hidden" name="remember" defaultValue="true" />
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div class="mb-6">
                            <label htmlFor="full_name" class="sr-only">
                                {{ __('Name') }}
                            </label>
                            <input id="full_name" name="name" type="text" autoComplete="Name" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none  focus:z-10 sm:text-sm @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Full Name" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div>
                            <label htmlFor="email-address" class="sr-only">
                                {{ __('Email Address') }}
                            </label>
                            <input id="email-address" name="email" type="email" autoComplete="email" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border mb-6 border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none  focus:z-10 sm:text-sm
                                @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Email address" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div>
                            <label htmlFor="password" class="sr-only">
                                {{ __('Password') }}
                            </label>
                            <input id="password" name="password" type="password" autoComplete="current-password"
                                required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none  focus:z-10 sm:text-sm @error('password') is-invalid @enderror"
                                required autocomplete="new-password"
                                placeholder="Password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="pt-5">
                            <label htmlFor="password" class="sr-only">
                                {{ __('Confirm Password') }}
                            </label>
                            <input id="password" name="password_confirmation" type="password" autoComplete="current-password"
                                required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none  focus:z-10 sm:text-sm @error('password') is-invalid @enderror"
                                required autocomplete="new-password"
                                placeholder="Confirm Password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                    </div>

                    <div>
                        <button type="submit" n
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <!-- <LockClosedIcon class="h-5 w-5 text-white group-hover:text-gray-400"
                                    aria-hidden="true" /> -->
                                <!-- <svg class="h-5 w-5 text-white"  fill="none" viewBox="0 0 24 24"  stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                      </svg> -->
                            </span>
                            {{ __('Register') }}
                        </button>
                    </div>
                    <div class="text-sm text-center ">
                        <a href="/Signup" class="font-medium text-black">
                            <div class="relative flex pt-1 pb-5 items-center">
                                <div class="flex-grow border-t border-gray-400"></div>
                                <span class="flex-shrink mx-4 text-gray-400">or</span>
                                <div class="flex-grow border-t border-gray-400"></div>
                            </div>
                            <a href="{{url('/')}}">Already have an account? Login</a>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>