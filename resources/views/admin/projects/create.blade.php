@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <h1>Inserisci un nuovo progetto</h1>

    </div>
    <div class="container">
        <form action="{{route ('admin.projects.store')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="project_name" class="form-label">Nome del nuovo progetto</label>
                <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Nome del nuovo progetto">
                
                @error('project_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>
            <div class="mb-3">
                <label for="project_description" class="form-label"> Descrizione del progetto</label></label>
                <textarea class="form-control" name="project_description" id="project_description" rows="5" placeholder="Descrizione del progetto"></textarea>
                @error('project_description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
              </div>
              <div class="mb-3">
                <label for="github_link" class="form-label">Link al GitHub del progetto</label>
                {{-- <input type="url" class="form-control" id="github_link" name="github_link" placeholder="http::/...."> --}}
                <input type="text" class="form-control" id="github_link" name="github_link" placeholder="http::/....">
                @error('github_link')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>


            <button class="btn btn-success">Crea</button>

        </form>


    </div>

</section>
@endsection