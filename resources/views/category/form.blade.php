@extends('layouts.master')

@section('content')

    <!-- start page title -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                       <div class="col-md-12">
                        <h4 class="page-title d-inline"><i class="fa fa-industry"></i>&nbsp;ADD NEW category</h4>
                    
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                       @if($page == "create")
                            {{ Form::open(['route' => 'categories.store', 'methode'=>'post', 'enctype'=>'multipart/form-data']) }}
                        @else
                            {{ Form::open(['route' => ['categories.update', $category->id], 'methode'=>'post', 'enctype'=>'multipart/form-data']) }}
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('title', 'Title', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('title', $page == 'edit' ? $category->title : '', ['class' => 'form-control', 'placeholder' => 'Write a title']) }}
                                    @if($errors->has('title'))
                                        <p class="error-msg">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('status', 'Status', ['class' => 'control-label required-field']) }}
                                    {{ Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], $page == 'edit' ? $category->status : '', ['class' => 'form-control']) }}
                                </div>
                            </div>  
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('image', 'Upload Image', ['class' => 'control-label required-field']) }}
                                    {{ Form::file('image', 
                                            ['class' => 'form-control']) 
                                    }}
                                    @if($errors->has('image'))
                                        <p class="error-msg">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                                @if($page == "edit")
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/images/' . $category->image) }}" alt="" height="200" width="200">
                                </div>
                                @endif
                            </div>
                           
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
