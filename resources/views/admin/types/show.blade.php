@extends('layouts/admin')

@section('content')
    <div class="container">
        <h1>{{ $type->name }}</h1>

        <div class="mb-3">
            <strong>Slug: </strong>
            <span>{{ $type->slug }}</span>
        </div>

        <div class="mb-3">
            <strong>Descrizione: </strong>
            <span>{{ $type->description }}</span>
        </div>

        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('admin.types.edit', $type) }}">Modifica tipo</a>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Elimina
                tipo</button>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModallLabel">Conferma eliminazione</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body">
                        Sei sicuro di voler eliminare il tipo {{ $type->name }}?<br>
                        Tutti i progetti di questo tipo verranno eliminati.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <form action="{{ route('admin.types.destroy', $type) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        @if (count($type->projects))
            <h2>Progetti {{ $type->name }}</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Titolo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Data</th>
                        <th scope="col">URL</th>
                        <th scope="col">Dettagli</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($type->projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ $project->type?->name }}</td>
                            <td>{{ $project->date }}</td>
                            <td>{{ $project->url }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}"><i
                                        class="fa-solid fa-search"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <pre>Nessun progetto di questo tipo</pre>
        @endif

        <hr>

        <a href="{{ route('admin.types.index') }}">Torna alla lista completa</a>
    </div>
@endsection
