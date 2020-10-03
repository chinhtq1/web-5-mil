<div role="tabpanel" class="tab-pane" id="tab6">
    <div class="form-group">
        {{ Form::label('google_analytics', trans('validation.attributes.backend.settings.google.analytic'), ['class' => 'col-lg-2
        control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('google_analytics', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.google.analytic')])
            }}
        </div>
    </div>
    <!--form control-->
</div>
