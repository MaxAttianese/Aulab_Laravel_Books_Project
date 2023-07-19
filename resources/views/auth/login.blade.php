<x-main>
    <x-slot:title>Accedi</x-slot>
        <div class="container pt-5 mt-3">
            <div class="row pt-5">
                <div class="col-0 col-md-4"></div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-center fst-italic">Accedi</h2>
                    <form action="/login" method="POST">
                        @csrf

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

                        <button type="submit" class="btn btn-warning fst-italic">Accedi</button>
                    </form>
                </div>
                <div class="col-0 col-md-4"></div>
            </div>
        </div>
</x-main>