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
                                <th>For App</th>
                                <th>Category</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Created_by</th>
                                <th>Updated_by</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($faqs as $faq)
                                <tr>
                                    <td class="width-70 text-right">{{$loop->iteration}}</td>
                                    <td>{{config('custom-config.faq.static_names.for_app_by_value.'.$faq->for_app)}}</td>
                                    <td>{{ $faq->category ?? '-' }}</td>
                                    <td>{!! $faq->question !!}</td>
                                    <td>{!! $faq->answer !!}</td>
                                    <td>{{ get_user_by_id($faq->created_by)->name }}</td>
                                    <td>{{ get_user_by_id($faq->updated_by)->name }}</td>
                                    <td class="action text-center">
                                        <a href="{{route('admin.faq.edit',['id'=>$faq->id])}}">
                                        <span class="icon edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11.947" height="11.947" viewBox="0 0 11.947 11.947"><defs><style>.a{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;}</style></defs><path class="a" d="M10.213,2.625a1.549,1.549,0,0,1,2.19,2.19L5.011,12.206,2,13.028l.821-3.011Z" transform="translate(-1.5 -1.581)"/></svg>
                                        </span>
                                        </a>
                                        <a href="{{route('admin.faq.delete',['id' => $faq->id])}}">
                                        <span class="icon delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.411" height="11.457" viewBox="0 0 10.411 11.457"><defs><style>.a{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;}</style></defs><g transform="translate(-2.5 -1.5)"><path class="a" d="M3,6h9.411" transform="translate(0 -1.909)"/><path class="a" d="M12.32,4.091v7.32a1.046,1.046,0,0,1-1.046,1.046H6.046A1.046,1.046,0,0,1,5,11.411V4.091m1.569,0V3.046A1.046,1.046,0,0,1,7.614,2H9.706a1.046,1.046,0,0,1,1.046,1.046V4.091" transform="translate(-0.954)"/></g></svg>
                                        </span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <p> No Faq Added Yet.</p>

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