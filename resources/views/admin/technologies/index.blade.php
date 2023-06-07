@extends('layouts/admin')

@section('content')
    <div class="container">
        <h1>Lista tecnologie</h1>

        <a class="btn btn-primary mb-3" href="{{ route('admin.technologies.create') }}">Inserisci una nuova tecnologia</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Colore</th>
                    <th scope="col">Dettagli</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <td>{{ $technology->name }}</td>
                        <td>{{ $technology->slug }}</td>
                        <td>{{ $technology->color }}</td>
                        <td>
                            <a href="{{ route('admin.technologies.show', $technology) }}"><i
                                    class="fa-solid fa-search"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a class="btn btn-primary mb-3" href="{{ route('admin.technologies.create') }}">Inserisci una nuova tecnologia</a>

        <hr>

        <a href="{{ route('admin.dashboard.home') }}">Torna alla dashboard</a>
    </div>
@endsection
