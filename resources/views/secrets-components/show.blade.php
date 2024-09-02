<x-layout>
    <x-nav-bar />

    <div class="text-center">
        <div class="container">

            <h1 class="">User's Secrets!</h1>

            <p class="secret-text rounded-sm">{{ $secret->secret }}</p>


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
