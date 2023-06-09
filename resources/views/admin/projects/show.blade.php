@extends('layouts/admin')

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>

        <div class="mb-3">
            <strong>Slug: </strong>
            <span>{{ $project->slug }}</span>
        </div>

        <div class="mb-3">
            <strong>Tipo: </strong>
            <span>{{ $project->type->name }}</span>
        </div>

        <div class="mb-3">
            <strong>Tecnologie: </strong>
            @foreach ($technologies as $technology)
                <span class="badge rounded-pill"
                    style="background-color: {{ $technology->color }}">{{ $technology->name }}</span>
            @endforeach
        </div>

        <div class="project-preview text-center mb-3">
            @if ($project->preview)
                <img class="w-25" src="{{ asset('storage/' . $project->preview) }}" alt="Preview progetto">
            @else
                <img class="w-25" src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                    class="card-img-top" alt="Project preview">
            @endif
        </div>

        <div class="mb-3">
            <strong>Descrizione:</strong>
            <p>{{ $project->description }}</p>
        </div>

        <a class="btn btn-outline-warning mb-3" href="{{ $project->url }}" target="_blank">GitHub</a>

        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">Modifica progetto</a>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Elimina
                progetto</button>
        </div>

        <hr>

        <a href="{{ route('admin.projects.index') }}">Torna alla lista completa</a>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModallLabel">Conferma eliminazione</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body">
                        Sei sicuro di voler eliminare il progetto {{ $project->title }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
