<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="text-gray-800">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required
                autofocus autocomplete="nama" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')"
                required autofocus autocomplete="alamat" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="no_telepon" :value="__('No Telepon')" />
            <x-text-input id="no_telepon" class="block mt-1 w-full" type="number" name="no_telepon" :value="old('no_telepon')"
                required autofocus autocomplete="no_telepon" />
            <x-input-error :messages="$errors->get('no_telepon')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="no_sim" :value="__('No SIM')" />
            <x-text-input id="no_sim" class="block mt-1 w-full" type="text" name="no_sim" :value="old('no_sim')"
                required autofocus autocomplete="no_sim" />
            <x-input-error :messages="$errors->get('no_sim')" class="mt-2" />
        </div>

        <div class="my-6">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                Role</label>
            <select id="role" name="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="user" selected>Penyewa</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        {{-- <input type="hidden" name="role" value="user"> --}}

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
