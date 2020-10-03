<div role="tabpanel" class="tab-pane" id="tab4">
    <div class="form-group">
        {{ Form::label('footer_text', trans('validation.attributes.backend.settings.footer.text'), ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('footer_text', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.footer.text'),
            'rows' => 2]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('copyright_text', trans('validation.attributes.backend.settings.footer.copyright'), ['class' => 'col-lg-2
        control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('copyright_text', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.footer.copyright'),
            'rows' => 2]) }}
        </div>
    </div>
    <!--form control-->
</div>
