@extends("layouts.master")

@section("titolo")
    Inserisci nuovo gatto
@endsection

@section("contenuto")

    <div class="container">

        <form action="{{ route('cats.update', $cat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-control mb-4 d-flex flex-column">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" value="{{ $cat->name }}" required>
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ $cat->slug }}" required>
            </div>

            <div class="form-control mb-4 d-flex flex-wrap">
                <label for="image" class="me-2">Immagine Gatto </label>
                <input type="file" id="image" name="image">
            </div>

            <div>
                <img class="img-fluid w-25 mb-5" src=" {{ asset("storage/" . $cat->image) }}" alt="immagine_gatto">
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="sex">Sesso</label>
                <select name="sex" id="sex">
                    <option value="M">Maschio</option>
                    <option value="F">Femmina</option>
                </select>
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="date_of_birth">Data nascita (YYYY-MM)</label>
                <input type="text" name="date_of_birth" value="{{ $cat->date_of_birth }}" />
            </div>

            <div class="form-control mb-4 d-flex flex-wrap">
                <label for="coat">Mantello</label>
                <input type="text" name="coat" id="coat" value="{{ $cat->coat }}" />
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="info">Riassunto</label>
                <textarea name="info" id="info" rows="5">{{ $cat->info }}</textarea>
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <input type="checkbox" name="adottato" id="adottato" {{ $cat->adottato ? 'checked' : '' }} />
                <label for="adottato" className="form-check-label">Adottato</label>
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <input type="checkbox" name="prenotato" id="prenotato" {{ $cat->prenotato ? 'checked' : '' }} />
                <label for="prenotato" className="form-check-label">Prenotato</label>
            </div>

            <input type="submit" value="Salva">
        </form>

    </div>

@endsection