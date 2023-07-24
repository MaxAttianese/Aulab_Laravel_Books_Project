<x-main>
    <x-slot:title>Fumetti per categoria</x-slot>
        <div class="container pt-3 pb-5">
            <div class="row justify-content-center">
                <h2 class="fw-bold fst-italic pt-5 mt-5 text-center pb-3">Fumetti della categoria selezionata</h2>
                <div class="py-3">
                    <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary fst-italic ps-3" href="{{route('comix.index')}}">Indietro</a>
                </div>
                @foreach($comixs as $comix)
                <div class="col-12 col-xl-4 fst-italic pt-3 d-flex justify-content-center">
                    <div class="card mb-3 bg-warning" style="width: 400px; height: 265px">
                        <div class="row g-0">
                            <div class="col-6 p-1">
                                <img src="{{$comix['images']['jpg']['image_url']}}" style="height: 255px" class="img-fluid rounded-start" alt="Copertina {{$comix['title']}}">
                            </div>
                            <div class="col-6 card-body d-flex flex-column justify-content-between">

                                <div>
                                    <h5 class="card-title fw-bold text-center fs-5">{{$comix['title']}}</h5>
                                </div>
                                <div>
                                    <p class="card-text mb-1"><small class="text-body-secondary"> .Type:</small></p>
                                    <p class="card-text text-center fs-5">{{$comix['type']}}</p>
                                    <p class="card-text mb-1"><small class="text-body-secondary"> .Durata:</small></p>
                                    <p class="card-text text-center fs-5">{{$comix['duration']}}</p>
                                </div>
                                <div class="text-end small">
                                    <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary" href="{{route('comix.show', $comix['mal_id'])}}">Dettagli</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</x-main>