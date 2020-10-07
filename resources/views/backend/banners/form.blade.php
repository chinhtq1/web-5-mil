<div class="box-body">
    <div class="form-group">
        {{ Form::label('title1', trans('validation.attributes.backend.banners.title1'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title1', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.banners.title1'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('title2', trans('validation.attributes.backend.banners.title2'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title2', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.banners.title2'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('status', trans('validation.attributes.backend.banners.status'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    @if(isset($banner->status) && !empty ($banner->status))
                        {{ Form::checkbox('status', 1, true) }}
                    @else
                        {{ Form::checkbox('status', 1, false) }}
                    @endif
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-3-->
    </div>

    <div class="form-group">
        {{ Form::label('featured_image', trans('validation.attributes.backend.banners.image'), ['class' => 'col-lg-2 control-label required']) }}
        @if(!empty($banner->featured_image))

            <div class="col-lg-2">
                <div class="custom-file-input">
                    <input type="file" name="featured_image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                    <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="{{ Storage::disk('public')->url('img/banner/' . $banner->featured_image) }}" height="300" >
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
</div>

{{--@section("after-scripts")--}}
{{--    <script type="text/javascript">--}}

{{--    </script>--}}
{{--@endsection--}}
