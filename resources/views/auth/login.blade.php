<x-layout>
    <div class="flex justify-center items-center mx-auto max-w-xl mt-16 mb-2">
        <h1 class="font-bold text-indigo-300 text-3xl">Login</h1>
    </div>
    <div class="mx-auto max-w-xl p-6 mb-16 border-4 border-indigo-100 rounded">
        <form method="POST" action="{{ route('login') }}" >
            <x-forms.wrapper>
                <x-forms.input
                    name="email"
                    type="text"
                    label="Email"
                    :value="old('email')"
                />

                <x-forms.input
                    name="password"
                    type="password"
                    label="Password"
                    :value="old('password')"
                />

                <x-forms.button>Submit</x-forms.button>
            </x-forms.wrapper>
        </form>
    </div>
</x-layout>
