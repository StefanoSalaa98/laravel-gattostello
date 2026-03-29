@extends("layouts.master")

@section("titolo")
    Inserisci nuovo gatto
@endsection

@section("contenuto")

    <div class="container">

        <form action="{{ route('cats.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-control mb-4 d-flex flex-column">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" placeholder="es: Cico" required>
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" placeholder="es: cico" required>
            </div>

            <div class="form-control mb-4 d-flex flex-wrap">
                <label for="image" class="me-2">Immagine gatto </label>
                <input type="file" id="image" name="image" required>
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
                <input type="text" name="date_of_birth" placeholder="2022-05" />
            </div>

            <div class="form-control mb-4 d-flex flex-wrap">
                <label for="coat">Mantello</label>
                <input type="text" name="coat" id="coat" />
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="info">Riassunto</label>
                <textarea name="info" id="info" rows="5"></textarea>
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <input type="checkbox" name="adottato" id="adottato" />
                <label for="adottato" className="form-check-label">Adottato</label>
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <input type="checkbox" name="prenotato" id="prenotato" />
                <label for="prenotato" className="form-check-label">Prenotato</label>
            </div>

            <input type="submit" value="Salva">
        </form>

    </div>

@endsection