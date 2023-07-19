<x-main>
    <x-slot:title>Registrati</x-slot>
        <div class="container pt-5 mt-3">
            <div class="row pt-5">
                <div class="col-0 col-md-4"></div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-center fst-italic">Registrati</h2>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fst-italic">Nome</label>
                            <input type="text" class="form-control" name="name" id="name">
                            @error("name") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fst-italic">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                            @error("email") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fst-italic">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            @error("password") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fst-italic">Conferma Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>

                        <button type="submit" class="btn btn-warning fst-italic">Registrati</button>
                    </form>
                </div>
                <div class="col-0 col-md-4"></div>
            </div>
        </div>
</x-main>