@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-header bg-danger text-center">ERROR
                        <div class="float-right">
                            <a href="{{ route('mission.password') }}" class="btn btn-light btn-sm float-right"
                               data-toggle="tooltip" data-placement="left" title="try again">
                                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                try again
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        100 points has been deducted from your account. Better luck next time!
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection