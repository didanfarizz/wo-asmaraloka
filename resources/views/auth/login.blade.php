{{-- Menggunakan layout yang minimalis, karena ini adalah halaman otentikasi --}}
<x-layouts.app title="Login - LUVIRA">
    {{-- Background dan Centering --}}
    <div class="flex justify-center items-center bg-[#F9F6F3] px-4 sm:px-6 lg:px-8">

        <div class="max-w-md w-full space-y-8">
            {{-- Formulir Login Card --}}
            <div class="bg-white p-8 rounded-xl shadow-2xl border-t-4 border-amber-600">
            <h2 class="text-center font-bold text-2xl">Login</h2>
                <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf

                    {{-- Pesan Kesalahan Global (jika ada) --}}
                    @error('username')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror

                    {{-- Input Username --}}
                    <div>
                        <label for="username" class="block text-sm font-medium text-stone-700 mb-1">
                            Username
                        </label>
                        <input id="username" name="username" type="text" required value="{{ old('usernmae') }}"
                            class="appearance-none rounded-md relative block w-full px-4 py-3 border border-stone-300 placeholder-stone-400 
                                      text-stone-900 focus:outline-none focus:ring-amber-500 focus:border-amber-500 transition duration-300"
                            placeholder="Masukan Username">
                    </div>

                    {{-- Input Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-stone-700 mb-1">
                            Password
                        </label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="appearance-none rounded-md relative block w-full px-4 py-3 border border-stone-300 placeholder-stone-400 
                                      text-stone-900 focus:outline-none focus:ring-amber-500 focus:border-amber-500 transition duration-300"
                            placeholder="Masukan Password">
                    </div>

                    {{-- Tombol Sign In --}}
                    <div>
                        <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md 
                                       text-white bg-amber-700 hover:bg-amber-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition duration-300 shadow-lg">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
