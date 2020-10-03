<div role="tabpanel" class="tab-pane active" id="tab1">
    <div class="form-group">
        {{ Form::label('logo', trans('validation.attributes.backend.settings.sitelogo'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">

            <div class="custom-file-input">
                {!! Form::file('logo', array('class'=>'form-control inputfile inputfile-1' )) !!}
                <label for="logo">
                    <i class="fa fa-upload"></i>
                    <span>Choose a file</span>
                </label>
            </div>
            <div class="img-remove-logo">
                @if($setting->logo)
                    <img height="50" width="50" src="{{ Storage::disk('public')->url('img/logo/' . $setting->logo) }}">
                    <i id="remove-logo-img" class="fa fa-times remove-logo" data-id="logo" aria-hidden="true"></i>
                @endif
            </div>
        </div>
        <!--col-lg-10-->
    </div>
    <!--form control-->

    <div class="form-group">
        {{ Form::label('favicon', trans('validation.attributes.backend.settings.favicon'), ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            <div class="custom-file-input">
                {!! Form::file('favicon', array('class'=>'form-control inputfile inputfile-1' )) !!}
                <label for="favicon">
                    <i class="fa fa-upload"></i>
                    <span>Choose a file</span>
                </label>
            </div>
            <div class="img-remove-favicon">
                @if($setting->favicon)
                    <img height="50" width="50" src="{{ Storage::disk('public')->url('img/favicon/' . $setting->favicon) }}">
                    <i id="remove-favicon-img" class="fa fa-times remove-logo" data-id="favicon" aria-hidden="true"></i>
                @endif
            </div>
        </div>
        <!--col-lg-10-->
    </div>
    <!--form control-->
    <div class="form-group">
        {{ Form::label('seo_title', trans('validation.attributes.backend.settings.metatitle'), ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('seo_title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.metatitle')])
            }}
        </div>
        <!--col-lg-10-->
    </div>
    <!--form control-->

    <div class="form-group">
        {{ Form::label('seo_keyword', trans('validation.attributes.backend.settings.metakeyword'), ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::textarea('seo_keyword', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.metakeyword'),
            'rows' => 2]) }}
        </div>
        <!--col-lg-3-->
    </div>
    <!--form control-->

    <div class="form-group">
        {{ Form::label('seo_description', trans('validation.attributes.backend.settings.metadescription'), ['class' => 'col-lg-2
        control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('seo_description', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.metadescription'),
            'rows' => 2]) }}
        </div>
        <!--col-lg-3-->
    </div>
    <!--form control-->
</div>
