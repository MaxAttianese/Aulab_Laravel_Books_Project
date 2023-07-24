<x-main>
    <x-slot:title>Categorie Fumetti</x-slot>
    
    <div class="text-center pt-5 mt-5">
        @if(auth()->user())
        <p class="text-end pe-5 fst-italic" ><span class="small pe-2">Benvenuto:</span> {{auth()->user()->name}} - {{auth()->user()->email}}</p>
        @endif
        <h2 class="fw-bold fst-italic display-2 pt-2 mt-2">
            {{config("app.name")}}
        </h2>
    </div>
        <div class="container py-5">
            <div class="row">
                <h2 class="fw-bold pb-3">Categorie Fumetti</h2>

            @foreach($genders as $gender)
            <div class="col-6 col-md-3">

                <div class="p-1"><a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary fst-italic" href="{{route('comix.show', $gender['mal_id'])}}">.{{$gender["name"]}}</a></div>

            </div>
            @endforeach
            </div>
        </div>
</x-main>