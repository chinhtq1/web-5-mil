<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', trans('validation.attributes.backend.products.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.products.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('categories', trans('validation.attributes.backend.blogs.category'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($selectedCategories))
                {{ Form::select('categories[]', $productCategories, $selectedCategories, ['class' => 'form-control tags box-size', 'required' => 'required', 'multiple' => 'multiple']) }}
            @else
                {{ Form::select('categories[]', $productCategories, null, ['class' => 'form-control select2 tags box-size', 'required' => 'required', 'multiple' => 'multiple']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('publish_datetime', trans('validation.attributes.backend.products.publish'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($product->publish_datetime))
                {{ Form::text('publish_datetime', \Carbon\Carbon::parse($product->publish_datetime)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.products.publish'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @else
                {{ Form::text('publish_datetime', null, ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.products.publish'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('feature_image', trans('validation.attributes.backend.products.image'), ['class' => 'col-lg-2 control-label required']) }}
        @if(!empty($product->feature_image))
            <div class="col-lg-1">
                <img src="{{ Storage::disk('public')->url('img/product/' . $product->feature_image) }}" height="80" width="80">
            </div>
            <div class="col-lg-5">
                <div class="custom-file-input">
                    <input type="file" name="feature_image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                    <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                </div>
            </div>
        @else
            <div class="col-lg-5">
                <div class="custom-file-input">
                    <input type="file" name="feature_image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                    <label for="file-1"><i class="fa fa-upload"></i><span>Choose a file</span></label>
                </div>
            </div>
        @endif
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('base_feature', trans('validation.attributes.backend.products.base_feature'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('base_feature', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.products.base_feature'), 'maxlength' => 512]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('base_feature', trans('validation.attributes.backend.products.detail_feature'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('detail_feature', null, ['class' => 'form-control box-size editor', 'placeholder' => trans('validation.attributes.backend.products.detail_feature'), 'maxlength' => 512]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('content', trans('validation.attributes.backend.products.content'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('content', null, ['class' => 'form-control editor', 'placeholder' => trans('validation.attributes.backend.products.content')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('meta_title', trans('validation.attributes.backend.products.meta-title'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('meta_title', null, ['class' => 'form-control box-size ', 'placeholder' => trans('validation.attributes.backend.products.meta-title')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('slug', trans('validation.attributes.backend.products.slug'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('slug', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.products.slug'), 'disabled' => 'disabled']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('cannonical_link', trans('validation.attributes.backend.products.cannonical_link'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('cannonical_link', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.products.cannonical_link')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->


    <div class="form-group">
        {{ Form::label('meta_keywords', trans('validation.attributes.backend.products.meta_keyword'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('meta_keywords', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.products.meta_keyword')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('meta_description', trans('validation.attributes.backend.products.meta_description'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('meta_description', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.products.meta_description')]) }}
        </div><!--col-lg-3-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('status', trans('validation.attributes.backend.products.status'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::select('status', $status, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.products.status'), 'required' => 'required']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
</div>

@section("after-scripts")
    <script type="text/javascript">

        Backend.Product.selectors.GenerateSlugUrl = "{{route('admin.generate.slug')}}";
        Backend.Product.selectors.SlugUrl = "{{url('/')}}";
        Backend.Product.init();

    </script>
@endsection
