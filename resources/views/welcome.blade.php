@extends("layouts.master")

<style>
    .welcome {
        text-align: center;

        div a {
            margin: 0 auto;
        }
    }
</style>
@section('contenuto')

    <div class="welcome">
        <h1>Benvenuto nella sezione riservata</h1>
        <h3>Premi il bottone per accedere al gestionale</h3>

        <div class="d-flex align-items-start py-3 gap-4">
            <a class="btn btn-outline-primary aggiungi" href="{{ route("cats.index") }}">Vai al gestionale</a>
        </div>
    </div>

@endsection