<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> {{ __('Reset Password') }}</title>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">

            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900"> {{ __('Reset Password') }}</h2>
                
            </div>
            <div class='shadow-xl py-12 px-7 shadow-slate-100'>
                @if(session()->has('message'))
                    <div class="alert alert-success text-white-200 bg-green-300 py-2 border border-blue-gray-300 text-center">
               {{ session()->get('message') }}
                </div>
                @endif
                <form class="mt-8 space-y-6" method="POST" action="{{ url('profile_update') }}">
                    @csrf
                    <input type="hidden" name="token" value="">
                    <div class="rounded-md shadow-sm -space-y-px">

                        <div>
                            <p class='mb-2 font-semibold'>{{ __('Email Address') }}</p>
                            <label htmlFor="password" class="sr-only">
                                {{ __('Email Address') }}
                            </label>
                            <input id="email" type="email"
                                required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border mb-6 border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none  focus:z-10 sm:text-sm @error('email') is-invalid @enderror"
                                placeholder="Enter Email" 
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div>
                            <p class='mb-2 font-semibold'>{{ __('Password') }}</p>
                            <label htmlFor="password" class="sr-only">
                                {{ __('Password') }}
                            </label>
                            <input id="password" type="password" name="old_password" required autocomplete="new-password"
                                required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border mb-6 border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none  focus:z-10 sm:text-sm @error('password') is-invalid @enderror"
                                placeholder="New Password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div>
                            <p class='mb-2 font-semibold'>{{ __('Confirm Password') }}</p>
                            <label htmlFor="password" class="sr-only">
                                Password
                            </label>
                            <input id="password-confirm" type="password" name="password" required autocomplete="new-password"
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none  focus:z-10 sm:text-sm"
                                placeholder="Confirm New Password" />
                        </div>
                    </div>


                    <div>
                        <Link to="/Signin">
                        <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <!-- <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                  {/* <LockClosedIcon class="h-5 w-5 text-white group-hover:text-gray-400" aria-hidden="true" /> */}
                </span> -->
                             {{ __('Reset Password') }}
                        </button>
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>