<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Change Password</title>
</head>

<body>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Enter Token</h2>

            </div>
            <div class='shadow-xl py-12 px-7 shadow-slate-100'>
                <form class="mt-8 space-y-6" action="{{url('submitResetPassword')}}" method="POST">
                    {{ $token }}
                    <input type="hidden" name="token" value="{{ $token }}">
                  <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                          <label htmlFor="email-address" class="sr-only">
                            Email address
                          </label>
                          <input id="email-address" name="email" type="email" autoComplete="email" required autofocus
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border mb-6 border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none  focus:z-10 sm:text-sm"
                            placeholder="Email address" />
                        </div>
                        
                        <div>
                          <label htmlFor="password" class="sr-only">
                            Password
                          </label>
                          <input id="password" name="password" type="password" autoComplete="current-password" required
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none  focus:z-10 sm:text-sm"
                            placeholder="Password"  autofocus/>
                            
                        </div>
                        <div>
                          <label htmlFor="email-address" class="sr-only">
                            Password Confirmation
                          </label>
                          <input id="text" name="password_confirmation" type="text" autoComplete="Token" 
                            class="appearance-none rounded-lg relative block w-full px-3 py-2 border mb-6 border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none  focus:z-10 sm:text-sm"
                            placeholder="password confirmation" required autofocus/>
                           
                        </div>
                      </div>



                    <div>
                        <a href="/Newpassword">
                            <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black focus:outline-none ">

                                Reset Password
                            </button>
                        </a>
                    </div>

                    <div class="text-sm text-center ">
                        <a href="{{url('/')}}" class="font-medium text-black">
                            <div class="relative flex pt-1 pb-5 items-center">
                                <div class="flex-grow border-t border-gray-400"></div>
                                <span class="flex-shrink mx-4 text-gray-400">or</span>
                                <div class="flex-grow border-t border-gray-400"></div>
                            </div>

                            Enter password to login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>