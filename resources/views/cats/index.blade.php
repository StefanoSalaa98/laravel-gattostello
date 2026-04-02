@extends("layouts.master")

<style>
    .lista {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .aggiungi {
        margin: 30px auto;
    }

    .immagine {
        width: 100%;

        img {
            width: 100%;
            aspect-ratio: 1;
        }
    }

    .ricerca {
        text-align: center;
        margin-bottom: 30px;
    }
</style>

@section("contenuto")

    <div class="d-flex align-items-start py-3 gap-4">
        <a class="btn btn-outline-primary aggiungi" href="{{ route("cats.create") }}">Aggiungi nuovo gatto</a>
    </div>

    <form class="ricerca" method="GET" action="{{ route('cats.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cerca gatto...">
        <button type="submit">Cerca</button>
    </form>

    <div class="container lista">

        @foreach ($cats as $cat)
            <x-card>
                @if ($cat->image)
                    <div class="immagine">
                        <img src="{{ asset("storage/" . $cat->image) }}" alt="immagine_gatto">
                    </div>
                @endif
                <x-slot:nome>{{ $cat->name}}</x-slot>
                    <a href="{{ route("cats.show", $cat->id) }}">Visualizza</a>
            </x-card>
        @endforeach

    </div>

@endsection