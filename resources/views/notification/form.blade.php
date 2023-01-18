@extends('layouts.master')

@section('content')

    <!-- start page title -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                       <div class="col-md-12">
                        <h4 class="page-title d-inline"><i class="fa fa-industry"></i>&nbsp;ADD NEW NOTIFICATION</h4>

                       </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                       @if($page == "create")
                            {{ Form::open(['route' => 'notifications.store', 'methode'=>'post', 'enctype'=>'multipart/form-data']) }}
                        @else
                            {{ Form::open(['route' => ['notifications.update', $notification->id], 'methode'=>'post', 'enctype'=>'multipart/form-data']) }}
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('title', 'Title', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('title', $page == 'edit' ? $notification->title : '', ['class' => 'form-control', 'placeholder' => 'Write a title']) }}
                                    @if($errors->has('title'))
                                        <p class="error-msg">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('sub_title', 'Sub Title', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('sub_title', $page == 'edit' ? $notification->title : '', ['class' => 'form-control', 'placeholder' => 'Write a sub title']) }}
                                    @if($errors->has('sub_title'))
                                        <p class="error-msg">{{ $errors->first('sub_title') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('type', 'Type', ['class' => 'control-label']) }}
                                    {{ Form::select('type', ['' => 'Select One', 'receipe' => 'Receipe', 'Article' => 'Article'], $page == 'edit' ? $notification->type : '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('content', 'Content', ['class' => 'control-label']) }}
                                    {{ Form::select('column_id', ['' => "Select One"], $page == 'edit' ? $notification->column_id : '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('image', 'Upload Image', ['class' => 'control-label']) }}
                                    {{ Form::file('image',
                                            ['class' => 'form-control'])
                                    }}
                                    @if($errors->has('image'))
                                        <p class="error-msg">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                            </div>
                            @if($page == "edit")
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/images/' . $notification->image) }}" alt="" height="200" width="200">
                                </div>
                            @endif
                        </div>
                        {{  Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                        {{ Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end page title -->

@endsection
