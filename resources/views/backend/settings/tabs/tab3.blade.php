<div role="tabpanel" class="tab-pane" id="tab3">
    <div class="form-group">
        {{ Form::label('from_name', trans('validation.attributes.backend.settings.mail.fromname'), ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('from_name', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.mail.fromname'),
            'rows' => 2]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('from_email', trans('validation.attributes.backend.settings.mail.fromemail'), ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('from_email', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.mail.fromemail'),
            'rows' => 2]) }}
        </div>
    </div>
    <!--form control-->
</div>
