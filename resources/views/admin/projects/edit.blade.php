@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <h1>Inserisci un nuovo progetto</h1>

    </div>
    <div class="container">
        <form action="{{route ('admin.projects.update', $project)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="project_name" class="form-label">Nome del nuovo progetto</label>
                <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Nome del nuovo progetto" value="{{old('project_name',$project->project_name)}}">
                
                @error('project_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Linguaggio usato</label>
                <select class="form-control" name="type_id" id="type_id">
                    <option value="">--Seleziona Linguaggio--</option>
                    @foreach($types as $type)
                    <option @selected($type->id == old('type_id', $project->type_id)) value="{{ $type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug del progetto" value="{{old('slug',$project->slug)}}">
                
            </div>
            <div class="mb-3">
                <label for="project_description" class="form-label"> Descrizione del progetto</label></label>
                <textarea class="form-control" name="project_description" id="project_description" placeholder="Descrizione del progetto" rows="">{{old('project_description',$project->project_description)}}</textarea>
                @error('project_description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
              </div>
              <div class="mb-3">
                <label for="github_link" class="form-label">Link al GitHub del progetto</label>
                {{-- <input type="url" class="form-control" id="github_link" name="github_link" placeholder="http::/...."> --}}
                <input type="text" class="form-control" id="github_link" name="github_link"  placeholder="http::/...."  value="{{old('github_link',$project->github_link)}}">
                @error('github_link')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>


            <button class="btn btn-success">Salva</button>

        </form>


    </div>

</section>
@endsection