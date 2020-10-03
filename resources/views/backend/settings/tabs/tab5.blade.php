<div role="tabpanel" class="tab-pane" id="tab5">
    <div class="form-group">
        {{ Form::label('terms', trans('validation.attributes.backend.settings.termscondition.terms'), ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::textarea('terms', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.termscondition.terms')])
            }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('disclaimer', trans('validation.attributes.backend.settings.termscondition.disclaimer'), ['class' => 'col-lg-2
        control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('disclaimer', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.termscondition.disclaimer')])
            }}
        </div>
    </div>
    <!--form control-->
</div>
