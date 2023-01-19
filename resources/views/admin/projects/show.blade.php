@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- Categoria  --}}
        <h4 class="text-center text-primary mt-3">
            {{ $project->type ? $project->type->name : 'Nessuna categoria' }}
        </h4>

        {{-- Titolo progetto --}}
        <h1 class="text-center mt-3"> Nome Progetto : {{ $project->title }}</h1>

        {{-- Informazioni base del progetto --}}
        <div class="d-flex justify-content-between mt-3">
            <h5> Data creazione : {{ $project->created_at }}</h5>
            <p class="fs-4">
                Slug : {{ $project->slug }}</p>
        </div>
        <h4>Descrizione del Progetto </h4>
        <p class="mt-3"> Descrizione Progetto : {{ $project->content }}</p>
        {{-- Lista delle tecnologie usate  --}}
        <div class="technologies">
            <h4>Tecnologie usate : </h4>
            @forelse ($project->technologies as $technology)
                <span class="fw-semibold"> #{{ $technology->name }}</span>
            @empty
                <span>Nessun tag</span>
            @endforelse
        </div>

        {{-- Immagine progetto --}}
        <h4 class="mt-4">Foto del Progetto : </h4>
        @if ($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="">
        @else
            <div class="div">
                <h3>Immagine non disponibile</h3>
            </div>
        @endif


        {{-- Card del progetto --}}
        <div class="card mt-4" style="width: 18rem;">
            @if ($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="">
            @else
                <div class="text-center">
                    <img src="https://www.associazionejam.it/wp-content/uploads/2017/04/non-disponibile-300x300.png"
                        alt="Foto di {{ $project->title }}" style="width:200px">
                </div>
            @endif
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> Progetto : {{ $project->title }}</h5>
                <p class="card-text"> Descrizione : {{ $project->content }}</p>
                <p class="card-text"> Creato il :{{ $project->created_at }} </p>
            </div>
        </div>
    </div>
@endsection
