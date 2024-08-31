<x-layout>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-white">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="/">
                <i class="fas fa-key fa-1x"></i> Secrets
            </a>

            @guest
                <div class="nav-con">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-dark btn-md" href="{{ route('register') }}" role="button">Register</a>
                            <a class="btn btn-dark btn-md" href="{{ route('login') }}" role="button">Login</a>
                        </li>
                    </ul>
                </div>
            @else
                <div class="nav-con">
                    <ul class="navbar-nav mb-2 mr-2">
                        <li class="nav-item">
                            <a class="account" href="{{ route('dashboard') }}">Account</a>

                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </nav>
    @auth
        <div class="container">
            <div class="centered">
                <p class="submit-title">Submit A Secret!</p>
                <form id="secret-form" action="/submit" method="POST">
                    <div class="form-group">
                        <textarea id="secret" class="form-control text-center" name="secret" placeholder="What's your secret?"
                            rows="1"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    @endauth




    <div class="text-center">
        <div class="container">

            <h1 class="">Read Some of User's Secrets!</h1>

            @foreach ($secrets as $secret)
                <p class="secret-text rounded-sm">{{ $secret->secret }}</p>
            @endforeach

            <hr />


        </div>
    </div>
    @guest
        <div class="text-center pb-3">
            <h3 class="display-5">Share your secret!</h3>
            <a class="btn btn-dark btn-md" href="{{ route('register') }}" role="button">Register</a>
            <a class="btn btn-dark btn-md" href="{{ route('login') }}" role="button">Login</a>
        </div>
    @endguest

</x-layout>
