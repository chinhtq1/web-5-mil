{{-- COMPANY INFO --}}
<div role="tabpanel" class="tab-pane" id="tab2">
{{--    LOGO    --}}
    <div class="form-group">
        {{ Form::label('company_logo', trans('validation.attributes.backend.settings.companydetails.logo'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">

            <div class="custom-file-input">
                {!! Form::file('company_logo', array('class'=>'form-control inputfile inputfile-1' )) !!}
                <label for="company_logo">
                    <i class="fa fa-upload"></i>
                    <span>Choose a file</span>
                </label>
            </div>
            <div class="img-remove-logo">
                <br>
                @if($setting->company_logo)
                    <img height="64" src="{{ Storage::disk('public')->url('img/settings/company-details/' . $setting->company_logo) }}"  alt="">
                    <i id="remove-company-logo-img" class="fa fa-times remove-logo" data-id="company_logo" aria-hidden="true"></i>
                @endif
            </div>
        </div>
        <!--col-lg-10-->
    </div>
    <!--form control-->

{{--    COMPANY NAME--}}
    <div class="form-group">
        {{ Form::label('company_name', trans('validation.attributes.backend.settings.companydetails.name'), ['class' => 'col-lg-2
        control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('company_name', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.name'),
            'rows' => 2]) }}
        </div>
    </div>

{{--   COMPANY ADDRESS  --}}
    <div class="form-group">
        {{ Form::label('company_address', trans('validation.attributes.backend.settings.companydetails.address'), ['class' => 'col-lg-2
        control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('company_address', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.address'),
            'rows' => 2]) }}
        </div>
    </div>

{{--    COMPANY EMAIL --}}
    <div class="form-group">
        {{ Form::label('company_email', trans('validation.attributes.backend.settings.companydetails.email'), ['class'
        => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('company_email', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.email'),
            'rows' => 2]) }}
        </div>
    </div>

{{--    CONTACT 1 --}}
    <div class="form-group">
        {{ Form::label('company_contact_1', trans('validation.attributes.backend.settings.companydetails.contact_1'), ['class'
        => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('company_contact_1', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.contact_1'),
            'rows' => 2]) }}
        </div>
    </div>
{{--    CONTACT 2 --}}
    <div class="form-group">
        {{ Form::label('company_contact_2', trans('validation.attributes.backend.settings.companydetails.contact_2'), ['class'
        => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('company_contact_2', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.contact_2'),
            'rows' => 2]) }}
        </div>
    </div>

    {{--   COMPANY MAP  --}}
    <div class="form-group">
        {{ Form::label('company_map', trans('validation.attributes.backend.settings.companydetails.map'), ['class' => 'col-lg-2
        control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('company_map', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.map'),
            'rows' => 2]) }}
            <p class="text-muted">Truy cập vào trang <a href="https://www.embedgooglemap.net/">https://www.embedgooglemap.net/</a></p>
        </div>
    </div>
</div>
