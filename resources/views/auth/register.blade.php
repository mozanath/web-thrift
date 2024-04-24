<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Fullname -->
        <div class="mt-4">
            <x-input-label for="fullname" :value="__('Fullname')" />
            <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autocomplete="fullname" />
            <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="user_nohp" :value="__('Phone Number')" />
            <x-text-input id="user_nohp" class="block mt-1 w-full" type="text" name="user_nohp" :value="old('user_nohp')" required />
            <x-input-error :messages="$errors->get('user_nohp')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="user_alamat" :value="__('Address')" />
            <x-text-input id="user_alamat" class="block mt-1 w-full" type="text" name="user_alamat" :value="old('user_alamat')" required />
            <x-input-error :messages="$errors->get('user_alamat')" class="mt-2" />
        </div>

        <!-- Profile URL -->
        <div>
            <label for="profile_photo">{{ __('Profile Photo') }}</label>
            <input id="profile_photo" type="file" name="profile_photo">
            @error('profile_photo')
                <span role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- User Level -->
        <div class="mt-4">
            <x-input-label for="user_level" :value="__('User Level')" />
            <select id="user_level" name="user_level" class="block mt-1 w-full" required>
                <option value="admin">Admin</option>
                <option value="pengguna">Pengguna</option>
            </select>
            <x-input-error :messages="$errors->get('user_level')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
