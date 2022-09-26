@extends('layouts.master')

@section('content')

    <!-- start page title -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                       <div class="col-md-12">
                        <h4 class="page-title d-inline"><i class="fa fa-industry"></i>&nbsp;ADD NEW ARTICLE</h4>

                       </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                       @if($page == "create")
                            {{ Form::open(['route' => 'articles.store', 'methode'=>'post', 'enctype'=>'multipart/form-data']) }}
                        @else
                            {{ Form::open(['route' => ['articles.update', $article->id], 'methode'=>'post', 'enctype'=>'multipart/form-data']) }}
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('title', 'Title', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('title', $page == 'edit' ? $article->title : '', ['class' => 'form-control', 'placeholder' => 'Write a title']) }}
                                    @if($errors->has('title'))
                                        <p class="error-msg">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('status', 'Status', ['class' => 'control-label required-field']) }}
                                    {{ Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], $page == 'edit' ? $article->status : '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('description', 'Description', ['class' => 'control-label required-field']) }}
                                    {{ Form::textarea('description', $page == 'edit' ? $article->description : '',
                                    ['class' => 'form-control textarea',
                                    'rows' => 4,
                                    'placeholder' => 'Write a description']) }}
                                    @if($errors->has('description'))
                                        <p class="error-msg">{{ $errors->first('description') }}</p>
                                    @endif
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
                            </div>
                            @if($page == "edit")
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/images/' . $article->image) }}" alt="" height="200" width="200">
                                </div>
                            @endif
                        </div>
                        {{  Form::submit('Submit', ['class' => 'btn btn-primary mt-2']) }}
                        {{ Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end page title -->

@endsection
