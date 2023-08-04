<x-main>
    <x-slot:title>Libro: {{$detailsBook->title}}</x-slot>
        <div class="container pt-5 mt-5">
            <div class="row">
                <div class="col-0 col-md-3"></div>
                <div class="col-12 col-md-6 text-center fst-italic">
                    <div class="d-flex justify-content-between align-items-center my-3 px-1 bg-light border-bottom border-warning rounded-top">
                        <a class="btn text-secondary link-offset-2 link-underline link-underline-opacity-0" href="{{route('books.index')}}">Indietro</a>
                        @if(auth()->user() && $detailsBook->user_id == auth()->user()->id)
                        <div class="d-flex align-items-center">
                            <a class="btn text-warning link-offset-2 link-underline link-underline-opacity-0" href="{{route('books.edit', $detailsBook)}}">Modifica</a>
                            <form action="{{route('books.destroy', $detailsBook)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn text-danger fst-italic" type="submit" onclick="return confirm('Sicuro di volerlo eliminare?')">Cancella</button>
                            </form>
                        </div>
                        @endif
                    </div>
                    @if($detailsBook)
                    <x-flashmessage />
                    @endif
                    <h2 class="fw-bold">{{$detailsBook->title}}</h2>
                    <div class="py-4">
                        @if($detailsBook->image)
                        <img style="height: 400px; width: 300px" src="{{Storage::url($detailsBook->image)}}" class="img-fluid" alt="Copertina {{$detailsBook->title}}">
                        @else
                        <img style="height: 400px; width: 300px" src="https://www.tornalibro.it/wp-content/uploads/2020/07/10458.gif" class="img-fluid" alt="Copertina non disponibile">
                        @endif
                    </div>
                    <p><span class="small">Pubblicato il: </span><span class="fw-bold">{{$detailsBook->publicated}}</span> - <span class="small">Genere: </span><span class="fw-bold">{{$detailsBook->gender}}</span></p>
                    <p><span class="small">Autore: </span><span class="fw-bold">{{$detailsBook->author}}</span></p>
                    <p class="fs-2">Temi del libro</p>
                    <p class="pb-4">{{$detailsBook->theme}}</p>
                    <p class="pb-4 fw-bold"><span class="small pe-2">Libro aggiunto da: </span>{{$detailsBook->user->name}}</p>
                </div>
                <div class="col-0 col-md-3"></div>
            </div>
        </div>
</x-main>