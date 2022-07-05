<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Send Email</title>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center  py-12 px-4 sm:px-6 lg:px-8 ">
        <div class="max-w-md w-full space-y-8 ">
          <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">{{ __('Reset Password') }}</h2>
            
          </div>
          <div class='shadow-xl py-12 px-7 shadow-slate-100'>
             @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
          <form class="mt-8 space-y-6  " action="{{ route('password.email') }}" method="POST">
            @csrf
            <input type="hidden" name="remember" defaultValue="true" />
            <div class="rounded-md shadow-sm -space-y-px">
              <div>
                <label htmlFor="email-address" class="sr-only">
                  {{ __('Email Address') }}
                </label>
                <input
                  id="email-address"
                  name="email"
                  type="email"
                  autoComplete="email"
                  placeholder="Email"
                  required
                  class="appearance-none rounded-none relative block w-full px-3 py-2 border mb-6 border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                />
                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
            </div>
  
            <div>
            <Link to="/">
              <button
                type="submit"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                  <LockClosedIcon class="h-5 w-5 text-white group-hover:text-gray-400" aria-hidden="true" />
                </span>
                {{ __('Send Password Reset Link') }}
              </button>
              
              </Link>
            </div>
            
            <div class="text-sm text-center ">
                <a href="/Signup" class="font-medium text-black">
                <div class="relative flex pt-1 pb-5 items-center">
      <div class="flex-grow border-t border-gray-400"></div>
      <span class="flex-shrink mx-4 text-gray-400">or</span>
      <div class="flex-grow border-t border-gray-400"></div>
  </div>
              <Link to="/Signup">
                @if (Route::has('login'))
                <div class="">
                    @auth
                        <!-- <a href="{{ url('/notes') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> -->
                    @else
                        <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <!-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Create Account</a> -->
                        @endif
                    @endauth
                </div>
            @endif
                </Link>
                </a>
              </div>
          </form>
          </div>
        </div>
      </div>
</body>
</html>