@section('page_styles')

@stop
@extends('layouts.master-layout')
@section('content')
    <!-- page content -->
    <div class="panel bg-white mt-5">
        <h4 class="panel-title">Edit Faq</h4>
        {{ Form::model($faq,['route' => ['admin.faq.edit', 'id'=>$faq->id]]) }}
        <div class="row">
            <div class="form-group col-md-6 grid-padding">
                {{ Form::label('for_app')}}<br><br>
                {{config('custom-config.faq.static_names.for_app_by_name.consumer')}}
                {{ Form::radio('for_app',config('custom-config.faq.static_values.for_app.consumer'),['class' => 'form-control'])  }}
                {{config('custom-config.faq.static_names.for_app_by_name.merchant')}}
                {{ Form::radio('for_app',config('custom-config.faq.static_values.for_app.merchant'),['class' => 'form-control'])  }}
            </div>
            <div class="form-group col-md-6 grid-padding">
                {{ Form::text('category',null,['placeholder' => 'Category', 'class' => 'form-control'])  }}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12 grid-padding">
                {{ Form::textarea('question',null,['placeholder' => 'Question', 'class' => 'form-control'])  }}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12 grid-padding">
                {{ Form::textarea('answer',null,['placeholder' => 'Answer', 'class' => 'form-control'])  }}
            </div>
        </div>

        <div class="btn-container col-md-2">
            {{ Form::submit('SAVE',['class'=>'btn btn-ghost']) }}
        </div>
        {{ Form::close() }}
    </div>
    <!-- /page content -->
@stop
@section('page_scripts')
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">

        CKEDITOR.replace('question', {

            filebrowserUploadUrl: "{{route('admin.faq.add', ['_token' => csrf_token()])}}",

            filebrowserUploadMethod: 'form'

        });

        CKEDITOR.replace('answer', {

            filebrowserUploadUrl: "{{route('admin.faq.add', ['_token' => csrf_token()])}}",

            filebrowserUploadMethod: 'form'

        });

    </script>
@stop