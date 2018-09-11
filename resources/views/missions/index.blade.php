@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h2>Mission Categories</h2>
                        <div class="float-right">
                            <a href="{{ route('public.home') }}" class="btn btn-light btn-sm float-right"
                               data-toggle="tooltip" data-placement="left" title="back to home">
                                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                back to home
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex flex-column">
                            @foreach($categories as $category)

                                <div class="d-flex flex-row">
                                    <div class="card flex-row align-items-center">
                                        <div class="card-body">
                                            <h2 class="text-center">{{ $category->missions_count }}
                                                <span class="text-small text-muted">missions</span>                                  
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="card w-100">
                                        <div class="card-header"><a href="/missions/{{$category->slug}}">
                                                <h2>{{$category->name}}</h2></a></div>

                                        <div class="card-body">
                                            {{ $category->description }}
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    </div>



@endsection