<x-main>
    <x-slot:title>Modifica Libro</x-slot>

    <div class="container py-5 mt-3">
            <div class="row pt-5">
                <div class="col-0 col-md-4"></div>
                <div class="col-12 col-md-4 pb-2">
                    <h2 class="fw-bold text-center fst-italic">{{$titleForm}}</h2>

                    <form action="{{$action}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($detailsBook)
                        @method("PUT")
                        @endif
                        <div class="mb-3">
                            <label for="title" class="form-label fst-italic">Titolo</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{old('title', $detailsBook->title)}}">
                            @error("title") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label fst-italic">Autore:</label>
                            <input type="text" class="form-control" name="author" id="author" value="{{old('author', $detailsBook->author)}}">
                            @error("author") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="publicated" class="form-label fst-italic">Pubblicato il:</label>
                            <input type="text" class="form-control" name="publicated" id="publicated" value="{{old('publicated', $detailsBook->publicated)}}">
                            @error("publicated") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label fst-italic">Genere:</label>
                            <input type="text" class="form-control" name="gender" id="gender" value="{{old('gender', $detailsBook->gender)}}">
                            @error("gender") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label fst-italic">Copertina:</label>
                            <input type="file" class="form-control" name="image" id="image" value="{{old('image', $detailsBook->image)}}">
                        </div>
                        <div class="mb-3">
                            <label for="theme" class="form-label fst-italic">Tema del libro:</label>
                            <textarea class="form-control" name="theme" id="theme" cols="30" rows="5">{{old('theme', $detailsBook->theme)}}</textarea>
                            @error("theme") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <button type="submit" class="btn btn-warning fst-italic">{{$buttoName}}</button>
                    </form>
                </div>
                <div class="col-0 col-md-4"></div>
            </div>
        </div>
   
</x-main>