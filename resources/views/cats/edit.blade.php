@extends("layouts.master")

@section("titolo")
    Inserisci nuovo gatto
@endsection

@section("contenuto")

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cats.update', $cat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-control mb-4 d-flex flex-column">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name', $cat->name) }}">
                @error('name')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control mb-4 d-flex flex-wrap">
                <label for="image" class="me-2">Immagine Gatto </label>
                <input type="file" id="image" name="image">
                @error('image')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <img class="img-fluid w-25 mb-5" src=" {{ asset("storage/" . $cat->image) }}" alt="immagine_gatto">
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="sex">Sesso</label>
                <select name="sex" id="sex">
                    <option value="M" {{ old('sex', $cat->sex) == 'M' ? 'selected' : '' }}>Maschio</option>
                    <option value="F" {{ old('sex', $cat->sex) == 'F' ? 'selected' : '' }}>Femmina</option>
                </select>
                @error('sex')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="date_of_birth">Data nascita (YYYY-MM)</label>
                <input type="text" name="date_of_birth" value="{{ old('date_of_birth', $cat->date_of_birth) }}" />
                @error('date_of_birth')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control mb-4 d-flex flex-wrap">
                <label for="coat">Mantello</label>
                <input type="text" name="coat" id="coat" value="{{ old('coat', $cat->coat) }}" />
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <label for="info">Riassunto</label>
                <textarea name="info" id="info" rows="5">{{ old('info', $cat->info) }}</textarea>
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <!-- valore nascosto di default per evitare problemi con la validazione -->
                <input type="hidden" name="adottato" value="0">
                <input type="checkbox" name="adottato" id="adottato" value="1" {{ old('adottato', $cat->adottato) ? 'checked' : '' }} />
                <label for="adottato" class="form-check-label">Adottato</label>
            </div>

            <div class="form-control mb-4 d-flex flex-column">
                <!-- valore nascosto di default per evitare problemi con la validazione -->
                <input type="hidden" name="prenotato" value="0">
                <input type="checkbox" name="prenotato" id="prenotato" value="1" {{ old('prenotato', $cat->prenotato) ? 'checked' : '' }} />
                <label for="prenotato" class="form-check-label">Prenotato</label>
            </div>

            <input type="submit" value="Salva">
        </form>

    </div>

@endsection