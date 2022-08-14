<div class="col-12 mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('title', 'Title', ['class' => 'control-label required-field']) }}
                        {{ Form::text('title', $page == 'edit' ? $receipe->title : 'test', ['class' => 'form-control', 'placeholder' => 'Write a title']) }}
                        @if($errors->has('title'))
                            <p class="error-msg">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('time', 'Time', ['class' => 'control-label required-field']) }}
                        {{ Form::text('time', $page == 'edit' ? $receipe->time : '30', ['class' => 'form-control', 'placeholder' => 'Write a cooking time']) }}
                        @if($errors->has('time'))
                            <p class="error-msg">{{ $errors->first('time') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        {{ Form::label('description', 'Description', ['class' => 'control-label required-field']) }}
                        {{ Form::textarea('description', $page == 'edit' ? $receipe->description : 'test', 
                            ['class' => 'form-control textarea',
                            'placeholder' => 'Write a description',
                            'rows' => 2]) 
                        }}
                        @if($errors->has('time'))
                            <p class="error-msg">{{ $errors->first('time') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('status', 'Status', ['class' => 'control-label required-field']) }}
                        {{ Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], $page == 'edit' ? $receipe->status : '', ['class' => 'form-control']) }}
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
                        <img src="{{ asset('storage/images/' . $receipe->image) }}" alt="" height="200" width="200">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>