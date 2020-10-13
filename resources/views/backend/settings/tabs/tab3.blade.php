<div role="tabpanel" class="tab-pane" id="tab3">
    <div class="form-group">
        {{ Form::label('section_index_1', 'Tiêu đề section 1', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('section_index_1', null,['class' => 'form-control', 'placeholder' => 'Tiêu đề section 1',
            'rows' => 2]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('section_index_1_background', 'Màu sắc section 1', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('section_index_1_background', null,['class' => 'form-control', 'placeholder' => 'Tiêu đề section 1',
            'rows' => 2]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('section_index_2', 'Tiêu đề section 2', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('section_index_2', null,['class' => 'form-control', 'placeholder' => 'Tiêu đề section 2','rows' => 2]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('section_index_2_background', 'Màu sắc section 2', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('section_index_2_background', null,['class' => 'form-control', 'placeholder' => 'Tiêu đề section 2','rows' => 2]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('section_index_3', 'Tiêu đề section 3', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('section_index_3', null,['class' => 'form-control', 'placeholder' =>'Tiêu đề section 3','rows' => 2]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('section_index_3_background', 'Màu sắc section 3', ['class' => 'col-lg-2 control-label'])
        }}

        <div class="col-lg-10">
            {{ Form::text('section_index_3_background', null,['class' => 'form-control', 'placeholder' =>'Tiêu đề section 3','rows' => 2]) }}
        </div>
    </div>
    <!--form control-->
</div>
