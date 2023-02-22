@extends('admin::layouts.master')

@section('page_title')
    Tickets
@stop

@section('content-wrapper')
    <div class="content full-page">

        <div class="float-container">
            <div class="float-child">
                <file-uploader-component></file-uploader-component>
            </div>

            <div class="float-child">
                <div class="panel">
                    <div class="panel-body" id="content">
                        Wait Please !
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop
<style>
    .float-container {
        border: 3px solid #fff;
        padding: 20px;
    }

    .float-child {
        width: 50%;
        float: left;
        padding: 20px;
    }
</style>
<script src="{{asset('js/app.js') }} "></script>

