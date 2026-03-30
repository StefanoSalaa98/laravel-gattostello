@extends("layouts.master")

@section("titolo")
    Inserisci nuovo gatto
@endsection

@section("contenuto")

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">

        <form action="{{ route('cats.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-control mb-4 d-flex flex-column">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" placeholder="es: Cico" value="{{ old('name') }}">
                @error('name')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" placeholder="es: cico" value="{{ old('slug') }}">
                @error('slug')
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
                <label for="coat">Mantello</label>
                <input type="text" name="coat" id="coat" value="{{ old('coat') }}" />
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="info">Riassunto</label>
                <textarea name="info" id="info" rows="5">{{ old('info') }}</textarea>
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <input type="checkbox" name="adottato" id="adottato" {{ old('adottato') ? 'checked' : ''}} />
                <label for="adottato" class="form-check-label">Adottato</label>
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <input type="checkbox" name="prenotato" id="prenotato" {{ old('prenotato') ? 'checked' : ''}} />
                <label for="prenotato" class="form-check-label">Prenotato</label>
            </div>

            <input type="submit" value="Salva">
        </form>

    </div>

@endsection