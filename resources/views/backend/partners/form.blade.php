<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', trans('validation.attributes.backend.partners.name'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.partners.name'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->


    <div class="form-group">
        {{ Form::label('status', trans('validation.attributes.backend.partners.status'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    @if(isset($partner->status) && !empty ($partner->status))
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
        {{ Form::label('featured_image', trans('validation.attributes.backend.blogs.image'), ['class' => 'col-lg-2 control-label required']) }}

        @if(!empty($partner->featured_image))
            <div class="col-lg-8">
                <p class="small text-gray">Kích thước ảnh đề xuất: 150 x 150 ( tỉ lệ: 3 x 2, 1 x 1 )</p>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="custom-file-input">
                            <input type="file" name="featured_image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                            <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ Storage::disk('public')->url('img/partner/' . $partner->featured_image) }}" height="200" width="300">
                    </div>
                </div>
            </div>
        @else
            <div class="col-lg-8">
                <p class="small text-gray">Kích thước ảnh đề xuất: 150 x 150 ( tỉ lệ: 3 x 2, 1 x 1 )</p>
                <div class="">
                    <div class="custom-file-input">
                        <input type="file" name="featured_image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                        <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                    </div>
                </div>
            </div>
        @endif
    </div><!--form control-->

</div>

{{--@section("after-scripts")--}}
{{--    <script type="text/javascript">--}}

{{--    </script>--}}
{{--@endsection--}}
