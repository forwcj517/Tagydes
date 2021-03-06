@extends('layouts.app')

@section('page-title', trans('app.resellers'))
@section('page-heading', trans('app.resellers'))


@section('breadcrumbs')
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">@lang('app.resellers')</li>
</ol>
<h1 class="page-header">@lang('app.branch_table')</h1>
@stop


@section('content')

@include('partials.messages')

<div class="panel panel-inverse">
    <!-- begin panel-heading -->
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
        </div>
        <h4 class="panel-title">
            @lang('app.list')
        </h4>
    </div>
    <!-- end panel-heading -->
    <div class="panel-body">

            <div class="pb-2 border-bottom-light">
                <div class="col-md-12 mb-3 pb-2">
                    <a href="{{ route('branch.create') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fas fa-plus mr-2"></i>
                        @lang('app.add_branch')
                    </a>
                </div>
            </div>
            

        <!-- <form action="" method="GET" id="resellers-form" class="pb-2 mb-3 border-bottom-light">
                <div class="row my-3 flex-md-row flex-column-reverse">
                    <div class="col-md-4 mt-md-0 mt-2">
                        <div class="input-group custom-search-form">
                            <input type="text"
                            class="form-control input-solid"
                            name="search"
                            value="{{ Input::get('search') }}"
                            placeholder="@lang('app.search_for_resellers')">
                            <span class="input-group-append">
                                @if (Input::has('search') && Input::get('search') != '')
                                <a href="{{ route('reseller.list') }}"
                                class="btn btn-light d-flex align-items-center text-muted"
                                role="button">
                                <i class="fas fa-times"></i>
                            </a>
                            @endif
                            <button class="btn btn-light" type="submit" id="search-resellers-btn">
                                <i class="fas fa-search text-muted"></i>
                            </button>
                        </span>
                    </div>
                </div>
                        
            </div>            
        </form> -->

        <div class="table-responsive mt-3" id="resellers-table-wrapper">
            
            <table id="data-table-responsive" class="table table-striped table-bordered">
                <thead>
                    <tr>
                                        
                        <th class="min-width-100">@lang('app.branch_name')</th>
                        <th class="min-width-100">@lang('app.address')</th>                              
                        <th class="text-center min-width-150">@lang('app.action')</th>                        
                    </tr>
                </thead>
                <tbody>
                    @if (count($branches) > 0)
                    @foreach ($branches as $branch)                    
                        <tr >                        
                            <td class="align-middle"> 
                            {{$branch->title}}
                            </td>
                            <td class="align-middle"> 
                            {{$branch->address}}
                            </td>
                                                        
                            
                                <td class="align-middle">                            
                                    <a href="{{ route('branch.edit', $branch->id) }}" class="btn btn-icon edit" title="@lang('app.edit_customer')" data-toggle="tooltip" data-placement="top">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="{{ route('branch.delete', $branch->id) }}" class="btn btn-icon" title="@lang('app.delete_customer')" data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="@lang('app.please_confirm')" data-confirm-text="@lang('app.are_you_sure_delete_customer')" data-confirm-delete="@lang('app.yes_delete_him')">
                                        <i class="fas fa-trash"></i>
                                    </a>                                
                                </td>
                            

                        </tr>

                    @endforeach
                    @else
                    <tr>
                        <td colspan="7"><em>@lang('app.no_records_found')</em></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

{!! $branches->render(null,['tab'=>'']) !!}

@stop

@section('scripts')
<script>
    $("#status").change(function () {
        $("#resellers-form").submit();
    });
</script>
@stop
