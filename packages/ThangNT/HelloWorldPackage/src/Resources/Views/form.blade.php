

{!! Form::open(['method' => 'POST', 'files' => true, 'id' => 'editData']) !!}

    {{-- Coupon Code --}}
    <p class="form-group">
        <label class="control-label" for="code">Coupon Code</label>
        <span class="require-notation">*</span>
        <input  id="code" class="form-control" type="" name="code" placeholder="Code" required>
    </p>


    {{-- Discount Rate --}}
    <label class="control-label" for="discount_rate">Discount Rate</label>
    <span class="require-notation">*</span>
    <p class="discount-rate-area form-group">
        <span class="col-sm-10">
            <input type="number" id="discount_rate" min="0" step="0.01" onkeypress="return checkInputNumberFloat(event);" class="form-control" name="discount_rate" placeholder="Discount Rate" required>
        </span>
        <span class="col-sm-2">
            @include('partials.discount-rate-type')
        </span>
    </p>


    {{-- Start Date and End Date--}}
    <p class="start-date-area form-group">
        <label class="control-label" for="start_date">Start Date</label>
        <span class="require-notation">*</span>
        <input  id="start_date" class="form-control" type="text" name="start_date" placeholder="Start Date" required="required">
    </p>
    <p class="expired-date-area form-group">
        <label class="control-label" for="expired_date">Expired Date</label>
        <span class="require-notation">*</span>
        <input  id="expired_date" class="form-control" type="text" name="expired_date" placeholder="Expired Date" required="required">
    </p>


    {{-- Coupon Type --}}
    <p class="form-group">
        {!! Form::label('type', 'Coupon Type:') !!}
        <span class="require-notation">*</span>
    </p>
    <p class="type-area form-group">
        @foreach(getCouponTypeList() as $key => $type)
            <label class="padding-checkbox-size" for="{{ 'type' . $key }}">{!! Form::radio('type', $key, false, ['id' => 'type' . $key, 'required']); !!}
                <span class="coupon-text">{{ $type }}</span>
            </label>
        @endforeach
        <br/>
        {{-- <label for="type" class="error">Please select coupon type</label> --}}
        <label class="error-label display-hidden" id="typeNoticeRequired">The field is required</label>
        <label class="error-label-small display-hidden" id="typeNoticeSelectUser">Please select a user to apply coupon</label>

    </p>


    <p class="form-group">
        <!-- Table User if click Private -->
        <div class="table-product-event-area" id="tableArea">

            <table class="table table-striped table-hover dataTable no-footer dtr-inline" id="tabledata">
                <thead>
                    <tr>
                      <th class="first-column-table center">
                        <input type="checkbox" name="" id="chkCheckAll" onclick="checkAllItem(this)">
                      </th>
                      <th>Name</th>
                      <th>Email</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <label class="username-list" id="userNameList"></label>
            <input class="" type="hidden" name="listItemSelected" id="listItemSelected"></input>
        </div><!-- ./List Content -->

    </p>



    <!-- Actual Submit button  -->
    <input type="hidden" name="typeSubmit" id="typeSubmit" value="0">
    <input type="hidden" name="couponId" id="couponId">



    {{-- Images --}}
    <p class="form-group">
        {!! Form::label('image', 'Image:') !!}
        <span class="require-notation">*</span>
        <label class="error-label-small display-hidden" id="imageNotice">Please upload and select a default image</label>
        <div id="oldImageArea" class="old-image-area">
            <span id="listOldImage"></span>
        </div>
        <input type="hidden" name="oldImages" id="oldImages">
        <span class="display-hidden">
            <input type="hidden" id="imageUploadedArea">
            <input type="hidden" id="imageSelected" name="imageSelected" >
        </span>

    </p>

{!! Form::close() !!}

    <input type="hidden" name="countImageUpload" id="countImageUpload" value="0">
    {!! Form::open(['method' => 'POST', 'files' => true, "class" => "dropzone", 'route' => ['images.upload', IMAGE_TYPE_COUPON], 'id' => 'upload-image-form']) !!}
        {!! Form::file('imagesUpload[]', ['multiple', 'class' => ' with-preview invisibility', 'id' => 'imagesUpload']) !!}
    {!! Form::close() !!}
    <!-- ./ End form - Form Close -->


    <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="updateCreateData">Create</button>
        <button type="button" class="btn btn-default" id="closeModal" onclick="return closeModal()">Close</button>
    </div>






