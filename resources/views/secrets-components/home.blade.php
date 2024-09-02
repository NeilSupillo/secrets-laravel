<x-layout>
    <x-nav-bar />
    @auth
        <div class="container">
            <div class="centered">
                <p class="submit-title">Submit A Secret!</p>
                <form id="secret-form" action="/submit" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea id="secret" class="form-control text-center" name="secret" placeholder="What's your secret?" rows="1"></textarea>
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
                <form action="{{ url('/secret/' . $secret->id) }}" method="GET" class="secret-form">
                    @csrf
                    <p class="secret-text rounded-sm pointer" onclick="this.parentNode.submit();">{{ $secret->secret }}
                    </p>
                </form>
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
