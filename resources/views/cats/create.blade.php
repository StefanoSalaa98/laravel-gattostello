@extends("layouts.master")

@section("titolo")
    Inserisci nuovo gatto
@endsection

<style>
    .indietro {
        margin-bottom: 50px;
    }
</style>

@section("contenuto")

    <div class="container">

        <a class="btn btn-outline-secondary indietro" href="{{ route("cats.index") }}">Indietro</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cats.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-control mb-4 d-flex flex-column">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" placeholder="es: Cico" value="{{ old('name') }}">
                @error('name')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control mb-4 d-flex flex-wrap">
                <label for="image" class="me-2">Immagine gatto </label>
                <input type="file" id="image" name="image">
                @error('image')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="sex">Sesso</label>
                <select name="sex" id="sex">
                    <option value="M" {{ old('sex') == 'M' ? 'selected' : '' }}>Maschio</option>
                    <option value="F" {{ old('sex') == 'F' ? 'selected' : '' }}>Femmina</option>
                </select>
                @error('sex')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="date_of_birth">Data nascita (YYYY-MM)</label>
                <input type="text" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="2022-05" />
                @error('date_of_birth')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control mb-4 d-flex flex-wrap">
                <label for="coat" class="me-2">Mantello</label>
                <input type="text" name="coat" id="coat" value="{{ old('coat') }}" />
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="info">Informazioni</label>
                <textarea name="info" id="info" rows="5">{{ old('info') }}</textarea>
            </div>
            <div class="form-control mb-4 d-flex">
                <!-- valore nascosto di default per evitare problemi con la validazione -->
                <input type="hidden" name="adottato" value="0">
                <input type="checkbox" name="adottato" id="adottato" value="1" {{ old('adottato') ? 'checked' : '' }}>
                <label class="ms-2" for="adottato">Adottato</label>
            </div>

            <div class="form-control mb-4 d-flex">
                <!-- valore nascosto di default per evitare problemi con la validazione -->
                <input type="hidden" name="prenotato" value="0">
                <input type="checkbox" name="prenotato" id="prenotato" value="1" {{ old('prenotato') ? 'checked' : ''}} />
                <label class="ms-2" for="prenotato" class="form-check-label">Prenotato</label>
            </div>

            <input type="submit" value="Salva">
        </form>

    </div>

@endsection