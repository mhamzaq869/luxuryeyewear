@extends('backend.layouts.master')
@section('title', 'Integeration')
@section('main-content')

    <style>
        .form-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 23px;
            float:right;
            margin-left: 156px;
            top: 9px;
        }

        /* Hide default HTML checkbox */
        .form-switch input {display:none;}

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }
        input.default:checked + .slider {
            background-color: #444;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
    </style>

    <div class="content-body p-3">
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-3">Integerations</h2>

                    <div class="row">
                        @foreach ($integrations as $integration)
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="card border shadow">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <img src="{{ asset('images/'.$integration->image) }}"
                                            alt="{{ $integration->name }}" height="40" width="40" />
                                        {{-- <label class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input med-query default" id="customSwitch1"
                                                data-id="{{ $integration->id }}"
                                                {{ $integration->status == '0' ? '' : 'checked' }} name="status"
                                                onchange="integrationStatus({{$integration->id}},this)" />
                                                <span class="slider round"></span>
                                        </label> --}}
                                        <div class="dropdown chart-dropdown">
                                            <a class="btn" onclick="showFolderModel('{{ route('integration.show',[$integration->id]) }}')">
                                                <span class="align-middle">
                                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                        </div>


                                    </div>
                                    <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                        <div class="role-heading">
                                            <h4 class="fw-bolder">{{ $integration->name }}</h4>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>
    </div>

    <div id="integration" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="other-save-details" class="widget-box widget-color-dark user-form" method="POST" action="{{route('integration.store')}}">
                        @csrf
                        <input type="hidden" id="integration_id" name="id" value="">
                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Public Key </label>
                                <input type="text" id="client_id" class="form-control" placeholder="Client/Public id" name="client_id">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Secret Key </label>
                                <input type="text" id="secret_id" class="form-control" placeholder="Secret Key" name="secret_key">
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <button type="submit" class="btn btn-rounded btn-success btn-sm rounded" id="btn-save" > <i class="fas fa-save"></i> Save </button>
                        </div>
                    </form>

                </div>

                <div class="loader_container" id="form_loader" style="display:none">
                    <div class="loader"></div>
                </div>

            </div>
        </div>
    </div>

    <div id="smtp" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="smtpMyModalLabel"></h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="smtpForm" class="widget-box widget-color-dark user-form" method="POST" action="{{route('integration.store')}}">
                        @csrf
                        <input type="hidden" id="smtp_integration_id" name="id" value="">

                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Host </label>
                                <input type="text" id="host" class="form-control" placeholder="Host" name="host">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Username</label>
                                <input type="text" id="username" class="form-control" placeholder="username" name="username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Password</label>
                                <input type="text" id="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Encryption </label>
                                <input type="text" id="encryption" class="form-control" placeholder="Encryption - ssl/tls" name="encryption">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Port </label>
                                <input type="number" id="port" class="form-control" placeholder="Port" name="port">
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <button type="submit" class="btn btn-rounded btn-success btn-sm rounded" id="btn-save" > <i class="fas fa-save"></i> Save </button>
                        </div>
                    </form>

                </div>

                <div class="loader_container" id="form_loader" style="display:none">
                    <div class="loader"></div>
                </div>

            </div>
        </div>
    </div>

@endsection



@push('scripts')
<script>
    function showFolderModel(url, type = null) {
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if (response.status == true) {
                    var integration = response.data;

                    if (integration.id != 6) {
                        $("#integration_id").val(integration.id)
                        $("#client_id").val(integration.public_key)
                        $("#secret_id").val(integration.secret_key)
                        $('#myModalLabel').text(integration.name + ' Integration');
                        $('#integration').modal('show');
                    } else{
                        $("#smtp_integration_id").val(integration.id)
                        $("#host").val(integration.host)
                        $("#username").val(integration.username)
                        $("#password").val(integration.password)
                        $("#encryption").val(integration.encryption)
                        $("#port").val(integration.port)
                        $('#smtpMyModalLabel').text(integration.name + ' Configuaration');
                        $('#smtp').modal('show');
                    }
                }

            }
        });
    }

    $("#save-details").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.status == true) {
                    $("#integration").modal('hide');
                }

            },
            error: function(e) {
                console.log(e);
            }
        });
    });

    $("#smtpForm").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.status == true) {
                    $("#integration").modal('hide');
                }

            },
            error: function(e) {
                console.log(e);
            }
        });
    });

</script>

@endpush
