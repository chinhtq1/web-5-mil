{{-- FOOTER SETTING --}}
<div role="tabpanel" class="tab-pane" id="tab4">
    <div class="form-group">
        {{ Form::label('blog_title', 'Tiêu đề trang tin tức', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('blog_title', null,['class' => 'form-control', 'placeholder' => 'Tiêu đề trang tin tức','rows' => 2]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('product_title', 'Tiêu đề trang sản phẩm', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('product_title', null,['class' => 'form-control', 'placeholder' => 'Tiêu đề trang sản phẩm',
            'rows' => 2]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('document_title', 'Tiêu đề trang tải tài liệu', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('document_title', null,['class' => 'form-control', 'placeholder' => 'Tiêu đề trang tải tài liệu',
            'rows' => 2]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('contact_title', 'Tiêu đề trang về chúng tôi', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('contact_title', null,['class' => 'form-control', 'placeholder' => 'Tiêu đề trang liên hệ',
            'rows' => 2]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('event_title', 'Tiêu đề trang sự kiện', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('event_title', null,['class' => 'form-control', 'placeholder' => 'Tiêu đề trang sự kiện',
            'rows' => 2]) }}
        </div>
    </div>


    <hr>
    <div class="form-group">
        {{ Form::label('fb_link', 'Link FB', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('fb_link', null,['class' => 'form-control', 'placeholder' => 'Link FB',
            'rows' => 2]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('twitter_link', 'Twitter Link', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('twitter_link', null,['class' => 'form-control', 'placeholder' => 'Twitter Link','rows' => 2]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('printerest_link', 'Pinterest Link', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('printerest_link', null,['class' => 'form-control', 'placeholder' =>'Pinterest link','rows' => 2]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('printerest_link', 'RSS Link', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('printerest_link', null,['class' => 'form-control', 'placeholder' =>'RSS link','rows' => 2]) }}
        </div>
    </div>

    <hr>
    <div class="form-group">
        {{ Form::label('header_title', 'Header Title', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('header_title', null,['class' => 'form-control', 'placeholder' =>'Header Title','rows' => 2]) }}
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <div class="row form-group">
                {{ Form::label('header_color', 'Màu header', ['class' => 'col-lg-3 control-label']) }}

                <div class="col-lg-9">
                    {{ Form::text('header_color', null,['class' => 'form-control', 'placeholder' =>'Màu Header','rows' => 2]) }}
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                {{ Form::label('footer_color', 'Màu Footer', ['class' => 'col-lg-3 control-label']) }}

                <div class="col-lg-9">
                    {{ Form::text('footer_color', null,['class' => 'form-control', 'placeholder' =>'Màu Footer','rows' => 2]) }}
                </div>
            </div>
        </div>
    </div>

    <!--form control-->
</div>
