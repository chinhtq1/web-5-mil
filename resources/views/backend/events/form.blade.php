<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', trans('validation.attributes.backend.events.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.events.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('publish_datetime', trans('validation.attributes.backend.events.publish'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($event->publish_datetime))
                {{ Form::text('publish_datetime', \Carbon\Carbon::parse($event->publish_datetime)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.events.publish'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @else
                {{ Form::text('publish_datetime', null, ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.events.publish'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('start_datetime', trans('validation.attributes.backend.events.start_date'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($event->start_datetime))
                {{ Form::text('start_datetime', \Carbon\Carbon::parse($event->start_datetime)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.events.start_date'), 'required' => 'required', 'id' => 'datetimepicker2']) }}
            @else
                {{ Form::text('start_datetime', null, ['class' => 'form-control datetimepicker2 box-size', 'placeholder' => trans('validation.attributes.backend.events.start_date'), 'required' => 'required', 'id' => 'datetimepicker2']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('end_datetime', trans('validation.attributes.backend.events.end_date'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($event->end_datetime))
                {{ Form::text('end_datetime', \Carbon\Carbon::parse($event->end_datetime)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.events.end_date'), 'required' => 'required', 'id' => 'datetimepicker3']) }}
            @else
                {{ Form::text('end_datetime', null, ['class' => 'form-control datetimepicker3 box-size', 'placeholder' => trans('validation.attributes.backend.events.end_date'), 'required' => 'required', 'id' => 'datetimepicker3']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('featured_image', trans('validation.attributes.backend.events.image'), ['class' => 'col-lg-2 control-label required']) }}
        @if(!empty($event->featured_image))
            <div class="col-lg-1">
                <img src="{{ Storage::disk('public')->url('img/event/' . $event->featured_image) }}" height="80" width="80">
            </div>
            <div class="col-lg-5">
                <div class="custom-file-input">
                    <input type="file" name="featured_image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                    <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                </div>
            </div>
        @else
            <div class="col-lg-5">
                <div class="custom-file-input">
                    <input type="file" name="featured_image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                    <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                </div>
            </div>
        @endif
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('description', trans('validation.attributes.backend.events.description'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('description', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.events.description'), 'maxlength' => 512]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('content', trans('validation.attributes.backend.events.content'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('content', null, ['class' => 'form-control editor', 'placeholder' => trans('validation.attributes.backend.events.content')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->


    <div class="form-group">
        {{ Form::label('meta_title', trans('validation.attributes.backend.events.meta-title'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('meta_title', null, ['class' => 'form-control box-size ', 'placeholder' => trans('validation.attributes.backend.events.meta-title')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('slug', trans('validation.attributes.backend.events.slug'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('slug', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.events.slug'), 'disabled' => 'disabled']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('cannonical_link', trans('validation.attributes.backend.events.cannonical_link'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('cannonical_link', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.events.cannonical_link')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->


    <div class="form-group">
        {{ Form::label('meta_keywords', trans('validation.attributes.backend.events.meta_keyword'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('meta_keywords', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.events.meta_keyword')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('meta_description', trans('validation.attributes.backend.events.meta_description'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('meta_description', null,['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.events.meta_description')]) }}
        </div><!--col-lg-3-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('status', trans('validation.attributes.backend.events.status'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::select('status', $status, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.events.status'), 'required' => 'required']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
</div>

@section("after-scripts")
    <script type="text/javascript">

        Backend.Event.selectors.GenerateSlugUrl = "{{route('admin.generate.slug')}}";
        Backend.Event.selectors.SlugUrl = "{{url('/')}}";
        Backend.Event.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');

    </script>
@endsection
