<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow p-0">
  <div class="container-fluid bg-warning p-2">
    <a class="navbar-brand" href="/">
      <h1 class="fs-4 fw-bold fst-italic ps-4">{{config("app.name")}}</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarNav">
      <ul class="navbar-nav pe-5">
        @if(auth()->user())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fst-italic" href="/account" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{auth()->user()->name}}
          </a>
          <ul class="dropdown-menu">
            <li class="ps-1 fst-italic"><a class="dropdown-item " href="{{route('books.account')}}">I libri aggiunti da me</a></li>
            <li class="ps-1 fst-italic"><a class="dropdown-item " href="{{route('books.create')}}">Aggiungi libro</a></li>
            <li class="ps-2"><form action="/logout" method="POST">
              @csrf
              <button type="submit" class="btn fst-italic text-danger">Esci</button>
            </form></li>
          </ul>
        </li>
        @foreach($links as $route => $link)
        <li class="nav-item">
          <a class="nav-link fst-italic" href="{{$route}}">{{$link}}</a>
        </li>
        @endforeach
        @else
        <a class="nav-link fst-italic" href="/login">Accedi</a>
        <a class="nav-link fst-italic" href="/register">Registrati</a>
        @endif
      </ul>
    </div>
  </div>
</nav>