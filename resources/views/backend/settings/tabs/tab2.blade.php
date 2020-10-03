<div role="tabpanel" class="tab-pane" id="tab2">
    <div class="form-group">
        {{ Form::label('company_address', trans('validation.attributes.backend.settings.companydetails.address'), ['class' => 'col-lg-2
        control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('company_address', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.address'),
            'rows' => 2]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('company_contact', trans('validation.attributes.backend.settings.companydetails.contactnumber'), ['class'
        => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('company_contact', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.contactnumber'),
            'rows' => 2]) }}
        </div>
    </div>
    <!--form control-->
</div>
