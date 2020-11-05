@section('page_styles')

@stop
@extends('layouts.master-layout')
@section('content')
    <!-- page content -->
    <div class="panel bg-white mt-5">
        <h4 class="panel-title">Edit Cms Page</h4>
        {{ Form::model($cms_page, ['route' => ['admin.cms.edit', $cms_page->id]]) }}
            <div class="row">
                <div class="form-group col-md-6 grid-padding">
                    {{ Form::text('title',null,['placeholder' => 'Page Title', 'class' => 'form-control'])  }}
                </div>

                <div class="form-group col-md-6 grid-padding">
                    {{ Form::text('slug',null,['placeholder' => 'Slug', 'class' => 'form-control'])  }}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12 grid-padding">
                    {{ Form::textarea('content',null,['placeholder' => 'Page Content', 'class' => 'form-control'])  }}
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

        CKEDITOR.replace('content', {

            filebrowserUploadUrl: "{{route('admin.cms.edit', ['_token' => csrf_token(),'id' => $cms_page->id])}}",

            filebrowserUploadMethod: 'form'

        });

    </script>
@stop