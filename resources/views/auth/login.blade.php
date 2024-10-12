<x-guest-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-md mt-8">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Entrar
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="sr-only" />
                <x-text-input id="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Endereço de email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="relative">
                <x-input-label for="password" :value="__('Password')" class="sr-only" />
                <x-text-input id="password" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="password"
                              name="password"
                              required autocomplete="current-password"
                              placeholder="Senha" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePasswordVisibility()">
                    <svg class="h-5 w-5 text-gray-400" fill="none" id="eye-icon" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" name="remember">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        {{ __('Remember me') }}
                    </label>
                </div>

                <div class="text-sm">
                    @if (Route::has('password.request'))
                        <a class="font-medium text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>

            <div>
                <x-primary-button class="w-full justify-center">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Não tem uma conta?
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Registre-se
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var eyeIcon = document.getElementById('eye-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
        }
    }
</script>