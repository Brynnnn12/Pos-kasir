<x-layout.auth title="POS Login" subtitle="Welcome to POS-Kasir System">

    <!-- Header -->
    <div class="text-center mb-8">
        <div class="flex justify-center mb-4">
            <div class="bg-gradient-to-r from-green-600 to-green-700 p-4 rounded-full">
                <i class="fas fa-cash-register text-white text-3xl"></i>
            </div>
        </div>
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">POS-Kasir Login</h2>
        <p class="text-gray-600">Masuk ke sistem Point of Sale</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-3 text-lg"></i>
                <p class="text-green-700 font-medium">{{ session('status') }}</p>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-6" x-data="{ showPassword: false }">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-envelope mr-2 text-green-600"></i>Email Kasir
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                autocomplete="username"
                class="w-full px-4 py-3 text-sm border-2 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 {{ $errors->has('email') ? 'border-red-300' : 'border-gray-200' }}"
                placeholder="Masukkan email kasir">
            @error('email')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                </p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-lock mr-2 text-green-600"></i>Password
            </label>
            <div class="relative">
                <input id="password" :type="showPassword ? 'text' : 'password'" name="password" required
                    autocomplete="current-password"
                    class="w-full px-4 py-3 pr-12 text-sm border-2 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 {{ $errors->has('password') ? 'border-red-300' : 'border-gray-200' }}"
                    placeholder="Masukkan password">
                <button type="button" @click="showPassword = !showPassword"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas text-sm" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                </button>
            </div>
            @error('password')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                </p>
            @enderror
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                    class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                <label for="remember_me" class="ml-3 text-sm text-gray-700 font-medium">
                    Ingat saya
                </label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" wire:navigate
                    class="text-sm text-green-600 hover:text-green-700 font-semibold transition-colors">
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3.5 px-6 rounded-xl font-semibold hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-4 focus:ring-green-500 focus:ring-opacity-50 transform hover:scale-[1.02] transition-all duration-200 shadow-lg text-sm">
            <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke POS
        </button>

        <!-- Info Section -->
        <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-xl">
            <div class="flex items-start">
                <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                <div>
                    <h4 class="text-sm font-semibold text-blue-800 mb-1">Informasi Login</h4>
                    <p class="text-xs text-blue-700">
                        Gunakan akun kasir yang telah diberikan oleh administrator untuk mengakses sistem POS.
                    </p>
                </div>
            </div>
        </div>
    </form>
</x-layout.auth>
