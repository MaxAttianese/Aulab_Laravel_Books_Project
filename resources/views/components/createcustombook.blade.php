        <div class="container py-5 mt-3">
            <div class="row pt-5">
                <div class="col-0 col-md-4"></div>
                <div class="col-12 col-md-4 pb-2">
                    @if($detailsBook)
                    <h2 class="fw-bold text-center fst-italic">Modifica Libro</h2>
                    @else
                    <h2 class="fw-bold text-center fst-italic">Aggiungi Libro</h2>
                    @endif
                    <form @if($detailsBook) action="{{route('books.update', $detailsBook)}}" @else action="{{route('books.store')}}" @endif method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($detailsBook)
                        @method("PUT")
                        @endif
                        <div class="mb-3">
                            <label for="title" class="form-label fst-italic">Titolo</label>
                            <input type="text" class="form-control" name="title" id="title" @if($detailsBook) value="{{old('title', $detailsBook->title)}}" @else value="{{old('title')}}" @endif>
                            @error("title") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label fst-italic">Autore:</label>
                            <input type="text" class="form-control" name="author" id="author" @if($detailsBook) value="{{old('author', $detailsBook->author)}}" @else value="{{old('author')}}" @endif>
                            @error("author") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="publicated" class="form-label fst-italic">Pubblicato il:</label>
                            <input type="text" class="form-control" name="publicated" id="publicated" @if($detailsBook) value="{{old('publicated', $detailsBook->publicated)}}" @else value="{{old('publicated')}}" @endif>
                            @error("publicated") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label fst-italic">Genere:</label>
                            <input type="text" class="form-control" name="gender" id="gender" @if($detailsBook) value="{{old('gender', $detailsBook->gender)}}" @else value="{{old('gender')}}" @endif>
                            @error("gender") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label fst-italic">Copertina:</label>
                            <input type="file" class="form-control" name="image" id="image" @if($detailsBook) value="{{old('image', $detailsBook->image)}}" @else value="{{old('image')}}" @endif>
                        </div>
                        <div class="mb-3">
                            <label for="theme" class="form-label fst-italic">Tema del libro:</label>
                            <textarea class="form-control" name="theme" id="theme" cols="30" rows="5">@if($detailsBook) {{old('theme', $detailsBook->theme)}} @else {{old('theme')}} @endif</textarea>
                            @error("theme") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        @if($detailsBook)
                        <button type="submit" class="btn btn-warning fst-italic">Modifica</button>
                        @else
                        <button type="submit" class="btn btn-warning fst-italic">Aggiungi</button>
                        @endif
                    </form>
                </div>
                <div class="col-0 col-md-4"></div>
            </div>
        </div>