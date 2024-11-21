<!--accounts-->
<x-layout>
    <x-nav-bar />
    @if (session('status'))
        <div class="alert alert-success" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
            {{ __(session('status')) }}
        </div>
    @endif



    <!-- your secrets-->

    <div class="container mx-auto p-4">
        @if ($secrets->isEmpty())
            <p class="user-secret text-center text-2xl font-bold bg-white p-4 rounded shadow-md">
                Don't keep your secrets, share them anonymously!
            </p>
            <div class="logout-back flex justify-evenly mt-4">
                <a class="btn btn-dark logout bg-black text-white px-4 py-2 rounded" href="{{ url('/') }}"
                    role="button">
                    Share a secret
                </a>
            </div>
        @else
            <p class="user-secret text-center text-2xl font-bold bg-white p-4 rounded shadow-md">
                Secrets You Have Shared
            </p>

            <div class="container mx-auto mt-6">
                <div class="centered text-center">
                    @foreach ($secrets as $secret)
                        <p class="secret-text text-center text-white bg-black p-3 rounded break-words"
                            id="p{{ $secret->id }}">
                            {{ $secret->secret }}
                        </p>
                        <form action="{{ route('dashboard.update', ['id' => $secret->id]) }}" method="POST"
                            class="edit mt-2" id="input{{ $secret->id }}" hidden>
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2">
                                <input type="text" class="form-control text-center" name="secret"
                                    placeholder="What's your secret?" value="{{ $secret->secret }}" />
                                <input type="hidden" name="del" value="{{ $secret->id }}" />
                            </div>
                            <button type="submit"
                                class="btn btn-dark bg-black text-white px-4 py-2 rounded">Submit</button>
                            <button onclick="handler2('{{ $secret->id }}')" type="button"
                                class="btn btn-dark bg-black text-white px-4 py-2 rounded ml-2">Cancel</button>
                        </form>

                        <div class="edit-delete flex justify-start items-center gap-4 mt-2"
                            id="edit-delete{{ $secret->id }}">

                            <button type="button" class="btn btn-dark bg-black text-white px-4 py-2 rounded"
                                onclick="handler('{{ $secret->id }}')">
                                Edit
                            </button>


                            <form action="{{ route('dashboard.destroy', ['id' => $secret->id]) }}" method="POST"
                                class="delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-dark bg-black text-white px-4 py-2 rounded">Delete</button>
                                <input type="hidden" name="del" value="{{ $secret->id }}" />
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="logout-back flex justify-evenly mt-4">
                <a class="btn btn-dark logout bg-grey text-white px-4 py-2 rounded" href="{{ url('/') }}"
                    role="button">
                    Add another Secret
                </a>
            </div>
    </div>
    @endif


</x-layout>


<script>
    function handler(id) {
        document.getElementById("p" + id).setAttribute("hidden", true);
        document.getElementById("input" + id).removeAttribute("hidden");
        document.getElementById("edit-delete" + id).setAttribute("hidden", true);
    }

    function handler2(id) {
        document.getElementById("edit-delete" + id).removeAttribute("hidden");
        document.getElementById("p" + id).removeAttribute("hidden");
        document.getElementById("input" + id).setAttribute("hidden", true);
    }
</script>
