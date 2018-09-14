@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h2>Missions Password Form</h2>
                        <div class="float-right">
                            <a href="{{ route('public.home') }}" class="btn btn-light btn-sm float-right"
                               data-toggle="tooltip" data-placement="left" title="back to home">
                                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                back to home
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="/missions/submit/password" method="post">
                            {!! csrf_field() !!}

                            <div class="d-flex align-items-center flex-column">
                                <div class="form-group d-flex flex-column">
                                    <label class="mr-sm-2" for="category">Category</label>
                                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="category" id="category"
                                            style="width: 300px;">
                                        <option selected></option>
                                        @foreach ($categories as $category)
                                            <option value="{{$loop->index+1}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <label class="mr-sm-2" for="mission">Mission Name</label>
                                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="mission" id="mission"
                                            style="width: 300px;">
                                    </select>
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <label class="mr-sm-2" for="password">Password:</label>
                                    <input type="password" class="mr-sm-2 mb-2 w-100" name="password" id="password">
                                    <!-- Button trigger modal -->
                                    {!! Form::button(trans('modals.password_modal_default_btn_submit'), array('class' => 'btn btn-warning btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#passwordModal', 'data-title' => trans('modals.password_modal_default_title'), 'data-message' => trans('modals.password_modal_default_message'))) !!}

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('modals.modal-password')

@endsection

@section('footer_scripts')
    @include('scripts.password-modal-script')

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            var category = $("#category");
            var mission = $("#mission");

            $("#category").change(function () {
                console.log(category.val());
                //$( "#mission" ).html("<option selected>Wait...</option>");
                $.ajax({
                    type: "GET",
                    url: "/api/missions/password/category/" + category.val(),
                    success: function (result) {
                        //mission.html()
                        var output = "";
                        //console.log(result);
                        $.each(result, function (obj, value) {
                            //alert(value['name']);
                            output += "<option value='" + value['name'] + "'>" + value['name'] + "</option>";
                        });
                        mission.html(output);
                    }
                });
            });
        });
    </script>
@endsection