@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Crea un nuovo progetto!</h1>
        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-8">
                <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- form titolo --}}
                    <div class="form-group mb-3">
                        <h5>Titolo</h5>
                        <label for="title">Titolo</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <h5>Tipologia</h5>
                        <label for="types_id">Tipologia </label>
                        <select name="types_id" id="types_id" class="form-select">
                            <option value="">Nessuna categoria</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- form per le technologie --}}
                    <div class="form-group mb-3">
                        <h5>Tecnologie usate</h5>
                        @foreach ($technologies as $technology)
                            <div class="form-check">
                                <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                                    class="form-check-input" value="{{ $technology->id }}">
                                <label for="technology-{{ $technology->id }}"
                                    class="form-check-label">{{ $technology->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    {{-- form per immagine --}}
                    <div class="form-group mb-3">
                        <h5>Scegli immagine</h5>
                        <label for="image">Immagine</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    {{-- Image preview --}}
                    <div class="mt-3">
                        <img id="image_preview" src="" alt="" style="max-height: 200px">
                    </div>
                    {{-- form per contenuto --}}
                    <div class="form-group mb-3">
                        <h5>Descrizione progetto</h5>
                        <label for="content">Contenuto</label>
                        <textarea name="content" id="content" rows="10" class="form-control">
                        </textarea>
                    </div>

                    <button class="btn btn-success" type="submit">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
