@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-header bg-danger">
                <h2>{{$slug->name}}</h2>
                <span class="text-center text-white">{{$slug->description}}</span>
                <div class="float-right">
                    <a href="{{ route('missions') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip"
                       data-placement="left" title="back to missions">
                        <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                        back to missions
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="d-flex flex-column">
                    @foreach($slug->missions as $mission)

                        <div class="d-flex flex-row">
                            <div class="card flex-row flex-fill">
                                <img width="250" height="160" src="{{$mission->img_url}}">
                            </div>
                            <div class="card w-100">
                                <div class="card-header d-flex flex-row align-items-baseline">
                                    <a href="{{ $mission->url }}"><h2>{{$mission->name}}</h2></a>
                                    <div class="ml-auto">
                                        @if ($mission->difficulty == 'easy')
                                            <span class="badge badge-pill badge-success normal">Difficulty: {{$mission->difficulty}}</span>
                                        @elseif ($mission->difficulty == 'normal')
                                            <span class="badge badge-pill badge-primary normal">Difficulty: {{$mission->difficulty}}</span>
                                        @elseif ($mission->difficulty == 'hard')
                                            <span class="badge badge-pill badge-warning normal">Difficulty: {{$mission->difficulty}}</span>
                                        @elseif ($mission->difficulty == 'insane')
                                            <span class="badge badge-pill badge-danger normal">Difficulty: {{$mission->difficulty}}</span>
                                        @endif
                                        <span class="badge badge-pill badge-light normal">Reward: {{$mission->reward}}</span>
                                    </div>
                                </div>

                                <div class="card-body">
                                    {{ $mission->description }}
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