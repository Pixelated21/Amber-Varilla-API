<div class="bg-white dark:bg-dark-mode w-full  lg:max-w-full md:mx-auto md:mx-0 md:w-full xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">

    <div class="w-full h-auto">


        <h1 class="text-xl md:text-4xl font-bold dark:text-gray-200 leading-tight mb-10">Log in to your account</h1>

        <form class="mt-6 space-y-4" action="#" method="POST">


            <div class="flex flex-col">
{{--                <x-form.inputs.normal-with-label-error wire:model="email" placeholder="Email" :label="true" title="Email"/>--}}
            </div>

            <div class="flex flex-col">
{{--                <x-form.inputs.normal-with-label-error wire:model="password" placeholder="Password" :label="true" title="Password"/>--}}
            </div>


            <div class="flex items-center justify-between mt-3">
{{--                <x-form.inputs.checkbox id="remember-me" title="Remember Me"/>--}}

                <div class="text-sm">
                    <a href="#" class="font-medium dark:text-gray-200 dark:hover:text-white duration-300">
                        Forgot your password?
                    </a>
                </div>
            </div>

{{--            <x-form.buttons.button-with-spinner title="Login">--}}

{{--                <x-slot name="spinner">--}}
{{--                    <i class="gg-spinner-two-alt"></i>--}}
{{--                </x-slot>--}}

{{--            </x-form.buttons.button-with-spinner>--}}
        </form>

        <hr class="my-6 border-gray-300 w-full">

        <div class="mt-1 grid grid-cols-2 gap-3">

            <div>
                <button
                    class="w-full border border-gray-400  inline-flex justify-center py-2.5 px-4 rounded-md shadow-sm hover:border-gray-200 dark:bg-dark-mode bg-gray-300 text-sm font-medium text-gray-500 hover:text-white duration-300 hover:bg-white">
                    <span class="sr-only">Sign in with Google</span>

                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         class="w-6 h-6" viewBox="0 0 48 48">
                        <defs>
                            <path id="a"
                                  d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/>
                        </defs>
                        <clipPath id="b">
                            <use xlink:href="#a" overflow="visible"/>
                        </clipPath>
                        <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"/>
                        <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/>
                        <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/>
                        <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/>
                    </svg>

                </button>
            </div>

            <div>
                <button href="#"
                        class="w-full border border-gray-400 hover:border-transparent inline-flex justify-center py-2.5 px-4 rounded-md shadow-sm dark:bg-dark-mode bg-gray-300 text-sm font-medium text-gray-500 hover:text-white duration-300 hover:bg-black">
                    <span class="sr-only">Sign in with GitHub</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        </div>


        <p class="text-center mt-8 dark:text-gray-200">Dont Have an account?<br>
            <a href="{{route('register')}}"
               class="text-purple-500 dark:text-gray-200  duration-300 dark:hover:text-purple-500 hover:text-purple-700  font-semibold">
                Create An Account
            </a>
        </p>


    </div>
</div>


