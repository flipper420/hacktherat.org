@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-header bg-success text-center">Congrats, You did it!!!
                        <div class="float-right">
                            <a href="{{ route('mission.password') }}" class="btn btn-light btn-sm float-right"
                               data-toggle="tooltip" data-placement="left" title="back to home">
                                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                do another one?
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        {{$points}} points has been added to your account. Keep on hacking, HACKER!!!
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection