@extends('dashboard', ['pageTitle' => '_camelUpper_casePlural_ &raquo; Create'])

@section('javascript')
    <script type="text/javascript">

        $(document).ready(function () {
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#expired_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });

    </script>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right raw-margin-top-24 raw-margin-left-24">
                {{-- {!! Form::open(['route' => 'customers.search']) !!}
                <input class="form-control form-inline pull-right" name="search" placeholder="Search">
                {!! Form::close() !!} --}}
            </div>
            <h1 class="pull-left">Customers: Create</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            {!! Form::open(['route' => 'customers.store']) !!}

            <div class="form-group ">
                <label class="control-label" for="Code">Code</label>
                <span style="color: red;">*</span>
                <input  id="Code" class="form-control" type="text" name="code" placeholder="Code">
            </div>

            <div class="form-group ">
                <label class="control-label" for="Discount_rate">Discount Rate</label>
                <span style="color: red;">*</span>
                <input  id="Discount_rate" class="form-control" type="number" name="discount_rate" step="any"   placeholder="Discount Rate">
            </div>

            <div class="form-group ">
                <label class="control-label" for="Discount_rate_type">Discount Rate Type</label>
                <span style="color: red;">*</span>
                <input  id="Discount_rate_type" class="form-control" type="number" name="discount_rate_type" placeholder="Discount Rate Type">
            </div>



            <div class="form-group">
                {!! Form::label('start_date', 'Start date:') !!}
                <span style="color: red;">*</span>
                <div class="form-group input-group">
                    {!! Form::text('start_date', null, ['required' => '', 'class' => 'form-control']) !!}
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
                <div class="text-danger display-hidden" id="noticeStartDate">The start date field is required.</div>
                {!! $errors->first('start_date', '<div class="text-danger"  id="noticeStartDate">:message</div>') !!}
            </div>

            <div class="form-group">
                {!! Form::label('expired_date', 'Expired date:') !!}
                <span style="color: red;">*</span>
                <div class="form-group input-group">
                    {!! Form::text('expired_date', null, ['required' => '', 'class' => 'form-control']) !!}
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
                <div class="text-danger display-hidden" id="noticeExpiredDate">The expired date field is required.</div>
                {!! $errors->first('expired_date', '<div class="text-danger"  id="noticeExpiredDate">:message</div>') !!}
            </div>



            <div class="form-group ">
                <label class="control-label" for="Type">Type</label>
                <input  id="Type" class="form-control" type="number" name="type" placeholder="Type">
            </div>

            <div class="form-group ">
                <label class="control-label" for="Image_id">Image Id</label>
                <input  id="Image_id" class="form-control" type="number" name="image_id" placeholder="Image Id">
            </div>

            <div class="form-group ">
                <label class="control-label" for="Images">Images</label>
                <input  id="Images" class="form-control" type="text" name="images" placeholder="Images">
            </div>

            <div class="form-group ">
                <label class="control-label" for="Status">Status</label>
                <input  id="Status" class="form-control" type="number" name="status" placeholder="Status">
            </div>


            {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>



@stop