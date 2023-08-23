{{-- x-layout later --}}
<div>
    <h2 class="text-2xl font-bold uppercase mb-1">
        Login
    </h2>
    <form action="/users/authenticate" method="POST">
        {{-- Don't forget csrf --}}
        @csrf

        <div class="mb-6">
            <label for="email">Email</label>
            <input type="email" name="email"
                value="{{ old('email') }}" />
            @error('email')
                <p> {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">
                Password
            </label>
            <input type="password" name="password" />
            @error('password')
                <p class=>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit">
                Log In
            </button>
        </div>

        <div>
            <p>Don't have an account?
                <a href="/register">Register</a>
            </p>
        </div>
    </form>

</div>
</div>
