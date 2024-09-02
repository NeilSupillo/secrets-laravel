<x-layout>
    <div class="container mt-5">
        <h1>Register</h1>
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/register" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input value="{{ old('name') }}" id="name" type="text" class="form-control"
                                    name="name" required autofocus />
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required autocomplete="username" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="new-password" />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                            <button type="submit" class="btn btn-dark">Register</button>
                        </form>
                        <p class="dont-have log-in">
                            Have an account already? <a href="{{ route('login') }}">Log in</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
