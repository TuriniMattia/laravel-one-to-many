@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <h1>Descrizione del Progetto: {{$project->project_name}}</h1>
        <p>{!! $project->project_description!!}</p>
        <h4>Categoria</h4>
        <p>{{optional($project->type)->name}}</p>
    </div>
    <div class="container">

    </div>

</section>
@endsection