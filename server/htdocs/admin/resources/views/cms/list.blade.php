@section('page_styles')

@stop
@extends('layouts.master-layout')
@section('content')
    <!-- page content -->
    <div class="add-product-wrapper">
    <div class="data-table-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th class="width-70 text-right">#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Content</th>
                            <th>Created_by</th>
                            <th>Updated_by</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($cms_pages as $page)
                            <tr>
                                <td class="width-70 text-right">{{$loop->iteration}}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{$page->slug}}</td>
                                <td>{!! $page->content !!}</td>
                                <td>{{ get_user_by_id($page->created_by)->name }}</td>
                                <td>{{ get_user_by_id($page->updated_by)->name }}</td>
                                <td class="action text-center">
                                    <a href="{{route('admin.cms.edit',['id'=>$page->id])}}">
                                        <span class="icon edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11.947" height="11.947" viewBox="0 0 11.947 11.947"><defs><style>.a{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;}</style></defs><path class="a" d="M10.213,2.625a1.549,1.549,0,0,1,2.19,2.19L5.011,12.206,2,13.028l.821-3.011Z" transform="translate(-1.5 -1.581)"/></svg>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <p> No Cms Pages Added Yet.</p>

                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@stop
@section('page_scripts')
@stop