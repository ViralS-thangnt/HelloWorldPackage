@extends('dashboard', ['pageTitle' => '_camelUpper_casePlural_ &raquo; Index'])

@section('page-style')

    {{-- <link rel="stylesheet" type="text/css" href="{{ getLinkFrontEnd('css/ink4u.css') }}"> --}}

    {{-- Datetime picker --}}
    <link href="{{ getLinkFrontEnd('plugins/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- Image loading --}}
    <link rel="stylesheet" type="text/css" href="{{ getLinkFrontEnd('plugins/lightbox2/dist/css/lightbox.css') }}">

    {{-- Dropzone --}}
    <link href="{{ getLinkFrontEnd('plugins/upload/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />

@stop

@section('javascript')

    <script type="text/javascript">
        var urlListUser = '{{ route('customers.datatable') }}';
        var getListUrl  = '{{ route('coupons.index') }}';
        var deleteImageUrl = '{{ route('images.delete', ['id' => '']) }}';
    </script>

    {{-- <script type="text/javascript" src="{{ getLinkFrontEnd('plugins/jquery-validation/lib/jquery.validate.min.js') }}" ></script> --}}

    {{-- Dropzone --}}
    <script type="text/javascript" src="{{ asset('plugins/upload/dropzone/dropzone.js') }}" ></script>

    {{-- Image loading --}}
    <script type="text/javascript" src="{{ getLinkFrontEnd('plugins/lightbox2/dist/js/lightbox.min.js') }}" ></script>

    {{-- Datetime picker --}}
    <script src="{{ getLinkFrontEnd('plugins/datetimepicker/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ getLinkFrontEnd('plugins/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

    {{-- Page Script --}}
    <script type="text/javascript" src="{{ getLinkFrontEnd('js/coupons/list.js') }}" ></script>

@stop

@section('content')

    <div class="row">
        <br />
        <div class="col-md-12">
            <h1 class="pull-left">Coupons</h1>
            <a class="btn btn-primary btn-add-item pull-right raw-margin-top-24 raw-margin-right-8" id="addItem">Add New</a>
        </div>
    </div>

    <div class="row row-content">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable">

                </table>
            </div>
        </div>
    </div>

    @include('coupons.modal')

@stop

