@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h1 class="text-center">Tutti i tuoi progetti</h1>
            <div class="col-8 mt-5">
                @if (session('message'))
                    <div class="alert alert-primary">
                        {{ session('message') }}
                    </div>
                @endif


                <table class="table table-light mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Titolo</th>
                            <th scope="col">Data di creazione</th>
                            <th scope="col">Preview Image</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->title }}</th>
                                <td>{{ $project->created_at }}</td>
                                <td class="w-25">
                                    @if ($project->image)
                                        <img class="w-50" src="{{ asset('storage/' . $project->image) }}" alt="">
                                    @else
                                        <div class="">
                                            <img class="w-25"
                                                src="https://www.associazionejam.it/wp-content/uploads/2017/04/non-disponibile-300x300.png"
                                                alt="Foto di {{ $project->title }}" style="width:200px">
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary"
                                        href="{{ route('admin.project.show', $project->slug) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-outline-success"
                                        href="{{ route('admin.project.edit', $project->slug) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-project-{{ $project->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal della conferma prima della cancellazione -->
                                    <div class="modal fade" id="delete-project-{{ $project->id }}" tabindex="-1"
                                        aria-labelledby="delete-label-{{ $project->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title fs-5" id="delete-label-{{ $project->id }}">Vuoi
                                                        cancellare {{ $project->title }}?</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annulla</button>
                                                    <form action="{{ route('admin.project.destroy', $project->slug) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">
                                                            Elimina
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $projects->links() }}
                </div>

            </div>
        </div>
    @endsection
