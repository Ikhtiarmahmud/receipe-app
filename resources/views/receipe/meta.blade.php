<div class="col-12 mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('title', 'Title', ['class' => 'control-label required-field']) }}
                        {{ Form::text('title', $page == 'edit' ? $receipe->title : '', ['class' => 'form-control', 'placeholder' => 'Write a title']) }}
                        @if($errors->has('title'))
                            <p class="error-msg">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        {{ Form::label('time', 'Time', ['class' => 'control-label required-field']) }}
                        {{ Form::text('time', $page == 'edit' ? $receipe->time : '', ['class' => 'form-control', 'placeholder' => 'Write a cooking time']) }}
                        @if($errors->has('time'))
                            <p class="error-msg">{{ $errors->first('time') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        {{ Form::label('people', 'People', ['class' => 'control-label required-field']) }}
                        {{ Form::text('people', $page == 'edit' ? $receipe->people : '', ['class' => 'form-control', 'placeholder' => 'Write total people']) }}
                        @if($errors->has('people'))
                            <p class="error-msg">{{ $errors->first('people') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        {{ Form::label('description', 'Description', ['class' => 'control-label required-field']) }}
                        {{ Form::textarea('description', $page == 'edit' ? $receipe->description : '',
                            ['class' => 'form-control',
                            'placeholder' => 'Write a description',
                            'rows' => 2])
                        }}
                        @if($errors->has('time'))
                            <p class="error-msg">{{ $errors->first('time') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        {{ Form::label('category', 'Category', ['class' => 'control-label required-field']) }}
                        {{ Form::select('category_id', $categories, $page == 'edit' ? $receipe->category_id : '', ['class' => 'form-control', 'placeholder' => 'Select a category']) }}
                        @if($errors->has('category_id'))
                            <p class="error-msg">{{ $errors->first('category_id') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        {{ Form::label('status', 'Status', ['class' => 'control-label required-field']) }}
                        {{ Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], $page == 'edit' ? $receipe->status : '', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-12 col-md-4">
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
                <div class="col-md-2">
                    <img src="{{ asset('storage/images/' . $receipe->image) }}" alt="" height="100" width="100">
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
