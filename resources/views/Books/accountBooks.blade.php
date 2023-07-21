<x-main>
    <x-slot:title>Libri</x-slot>
        <div class="container pt-3 pb-5">
            <div class="row justify-content-center">
                <h2 class="fw-bold fst-italic pt-5 mt-5 text-center pb-3">Libreria</h2>
                <div class="text-end pe-4"><a href="{{route('books.create')}}" class="text-end link-offset-2 link-underline link-underline-opacity-0 text-primary fst-italic bg-light border-bottom border-warning rounded-top px-2">Aggiungi libro alla lista</a></div>
                <x-flashmessage />
                @foreach($books as $book)
                <div class="col-12 col-xl-4 fst-italic pt-4 d-flex justify-content-center">
                    <div class="card mb-3 bg-warning" style="width: 400px; height: 265px">
                        <div class="row g-0">
                            <div class="col-6 p-1">
                                @if($book->image)
                                <img src="{{Storage::url($book->image)}}" style="height: 255px" class="img-fluid rounded-start" alt="Copertina {{$book->title}}">
                                @else
                                <img src="https://www.tornalibro.it/wp-content/uploads/2020/07/10458.gif" style="height: 255px" class="img-fluid rounded-start" alt="Copertina non disponibile">
                                @endif
                            </div>
                            <div class="col-6 card-body d-flex flex-column justify-content-between">

                                    <div><h5 class="card-title fw-bold text-center fs-3">{{$book->title}}</h5></div>
                                    <div>
                                    <p class="card-text mb-1"><small class="text-body-secondary"> .Genere:</small></p>
                                    <p class="card-text text-center fs-5">{{$book->gender}}</p>
                                    <p class="card-text mb-1"><small class="text-body-secondary"> .Autore:</small></p>
                                    <p class="card-text text-center fs-5">{{$book->author}}</p>
                                    </div>
                                    <div class="text-end small">
                                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary" href="{{route('books.show', $book)}}">Dettagli</a>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</x-main>