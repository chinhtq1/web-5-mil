
{{ Form::label('name', trans('validation.attributes.backend.productcategories.title'), ['class' => 'col-lg-2 control-label required']) }}

<div class="col-lg-10">
    {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.blogcategories.title'), 'required' => 'required']) }}
</div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
    {{ Form::label('slug', trans('validation.attributes.backend.productcategories.slug'), ['class' => 'col-lg-2 control-label']) }}

    <div class="col-lg-10">
        {{ Form::text('slug', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.blogcategories.slug'), 'disabled' => 'disabled']) }}
    </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
    {{ Form::label('status', trans('validation.attributes.backend.productcategories.is_active'), ['class' => 'col-lg-2 control-label']) }}

    <div class="col-lg-10">
        <div class="control-group">
            <label class="control control--checkbox">
                @if(isset($productCategory->status) && !empty ($productCategory->status))
                    {{ Form::checkbox('status', 1, true) }}
                @else
                    {{ Form::checkbox('status', 1, false) }}
                @endif
                <div class="control__indicator"></div>
            </label>
        </div>
    </div><!--col-lg-3-->
</div>

@section("after-scripts")
    <script type="text/javascript">
        Backend.ProductCategory.selectors.GenerateSlugUrl = "{{route('admin.generate.slug')}}";
        Backend.ProductCategory.selectors.SlugUrl = "{{url('/')}}";
        Backend.ProductCategory.init();

    </script>
@endsection
