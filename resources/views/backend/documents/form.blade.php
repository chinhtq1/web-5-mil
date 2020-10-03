<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', trans('validation.attributes.backend.documents.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.documents.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('categories', trans('validation.attributes.backend.documents.category'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($selectedCategories))
                {{ Form::select('categories[]', $documentCategories, $selectedCategories, ['class' => 'form-control categories box-size', 'required' => 'required', 'multiple' => 'multiple']) }}
            @else
                {{ Form::select('categories[]', $documentCategories, null, ['class' => 'form-control categories box-size', 'required' => 'required', 'multiple' => 'multiple']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('publish_datetime', trans('validation.attributes.backend.documents.publish'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($document->publish_datetime))
                {{ Form::text('publish_datetime', \Carbon\Carbon::parse($document->publish_datetime)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.documents.publish'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @else
                {{ Form::text('publish_datetime', null, ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.documents.publish'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('file', trans('validation.attributes.backend.documents.file'), ['class' => 'col-lg-2 control-label required']) }}
        @if(!empty($document->file))
            <div class="col-lg-10">
                <div class="custom-file-input" style=" margin-bottom: 2rem">
                    <input type="file" name="file" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                    <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                </div>
                <a target="_blank" href="{{ Storage::disk('public')->url('img/document/' . $document->file) }}" style="word-break: break-word">
                    <img src="{{ asset(config('common.file-type')[$document->type]) }}" alt="Loại file">
                    {{ Storage::disk('public')->url('img/document/' . $document->file) }}
                </a>

            </div>

        @else
            <div class="col-lg-5">
                <div class="custom-file-input">
                    <input type="file" name="file" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                    <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                </div>
            </div>
        @endif
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('description', trans('validation.attributes.backend.documents.description'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('description', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.documents.description'), 'maxlength' => 512]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('status', trans('validation.attributes.backend.documents.status'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::select('status', $status, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.documents.status'), 'required' => 'required']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
</div>

@section("after-scripts")
    <script type="text/javascript">
        Backend.Document.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
    </script>
@endsection
