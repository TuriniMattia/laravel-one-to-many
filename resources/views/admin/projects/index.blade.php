@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <h1>Pagina dei progetti</h1>
        <a class="btn btn-success" href="{{route('admin.projects.create')}}" title="Vai alla pagina di aggiunta di un nuovo progetto">Aggiungi progetto</a>

    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Progetto</th>
                    <th>Link al Github</th>
                    <th>slug</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td><a href="{{ route('admin.projects.show', $project)}}">{{$project->project_name}}</a></td>
                    <td>{{$project->github_link}}</td>
                    <td>{{$project->slug}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
@endsection