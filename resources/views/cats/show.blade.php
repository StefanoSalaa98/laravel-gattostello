@extends("layouts.master")

@section("titolo")
    {{ $cat->title }}
@endsection

<style>
    .gatto {
        display: flex;
        gap: 50px;
        width: 80%;
        margin: 50px auto;
        font-size: 1.2em;
    }

    .immagine {
        width: 350px;

        img {
            width: 100%;
        }
    }

    .bottoni {
        padding-left: 140px;
        margin-top: 50px;
    }
</style>

@section("contenuto")

    <div class="d-flex align-items-start py-3 gap-4 bottoni">
        <a class="btn btn-outline-secondary" href="{{ route("cats.index") }}">Indietro</a>
        <a class="btn btn-outline-warning" href="{{ route("cats.edit", $cat) }}">Modifica</a>
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina
        </button>
    </div>

    <div class="gatto">

        <div class="immagine">
            <img src="{{ asset("storage/" . $cat->image) }}" alt="immagine_gatto">
        </div>

        <div>
            <p><strong>Nome: </strong>{{ $cat->name }}</p>
            <p><strong>Slug: </strong>{{ $cat->slug }}</p>
            <p><strong>Sesso: </strong>{{ $cat->sex }}</p>
            <p><strong>Data di nascita: </strong>{{ $cat->date_of_birth }}</p>
            <p><strong>Manto: </strong>{{ $cat->coat }}</p>
            <p><strong>Info: </strong>{{ $cat->info }}</p>
            <p><strong>Adottato: </strong>{{ $cat->adottato }}</p>
            <p><strong>Prenotato: </strong>{{ $cat->prenotato }}</p>
        </div>
    </div>

    <!-- modale conferma eliminazione -->
    <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina Gatto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare questo gatto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route("cats.destroy", $cat) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-outline-danger" type="submit" value="Elimina definitivamente">
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection