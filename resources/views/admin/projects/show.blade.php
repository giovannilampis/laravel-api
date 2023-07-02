@extends('layouts.dashboard')

@section('content')

<div class="container">

    <div class="row justify-content-center flex-wrap text-center">

        <div class="col-6 mt-5">

            <div class="card">
                <img src="{{ asset('storage/'.$project->img_url) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title"><span 
                    class="badge rounded-pill bg-secondary">{{$project->category->name?? 'No Category' }}</span>
                  </h4>
                  <h5>Technologies:</h5>
                  @if($project->technologies)
                    @foreach($project->technologies as $elem)
                      <div>{{$elem->name}}</div>
                    @endforeach
                  @endif
                  <h5 class="card-title">{{ $project->title }}</h5>
                  <p class="card-text">{{ $project->description }}</p>
                  <div class="d-flex justify-content-start">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-light">INDEX</a>
                    <a href="{{ route('admin.projects.edit', ['project'=>$project]) }}" class="btn btn-outline-light mx-3"><i class="fa-solid fa-pencil"></i></a>
                    <form action="{{ route('admin.projects.destroy', ['project'=>$project]) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
                  </div>
                </div>
              </div>

        </div>

    </div>
</div>

@endsection