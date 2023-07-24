<x-main>
    <x-slot:title>Homepage</x-slot>
    
    <div class="text-center pt-5 mt-5">
        @if(auth()->user())
        <p class="text-end pe-5 fst-italic" ><span class="small pe-2">Benvenuto:</span> {{auth()->user()->name}} - {{auth()->user()->email}}</p>
        @endif
        <h2 class="fw-bold fst-italic display-2 pt-5 mt-5">
            {{config("app.name")}}
        </h2>
        <a class=" btn btn-warning fst-italic mt-5" href="{{route('books.index')}}">Visulizza la nostra libreria</a>
        <a class=" btn btn-warning fst-italic ms-4 mt-5" href="{{route('comix.index')}}">Visulizza la nostra fumetteria</a>
    </div>
</x-main>