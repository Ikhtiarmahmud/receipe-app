<div class="col-12 mt-4">
    <div class="card">
        <div class="card-body">
            <h3 class="mb-5">STEPS</h2>
            <div class="step-repeater">
                <div data-repeater-list="group-b">
                    <div class="group-inp mb-3 steps" data-repeater-item>
                        <div class="row">
                            <div class="col-md-5">
                                {{ Form::label('title', 'Title', ['class' => 'control-label required-field']) }}
                                {{ Form::text('title', 'test', ['class' => 'form-control', 'placeholder' => 'Write a title']) }}
                            </div>
                            <div class="col-md-5">
                                {{ Form::label('image', 'Upload Image', ['class' => 'control-label required-field']) }}
                                {{ Form::file('image', 
                                        ['class' => 'form-control']) 
                                }}
                            </div>
                            <div class="col-md-5">
                                {{ Form::label('description', 'Description', ['class' => 'control-label required-field']) }}
                                {{ Form::textarea('description', 'test', 
                                    ['class' => 'form-control',
                                    'placeholder' => 'Write a description',
                                    'rows' => 2]) 
                                }}
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    {{ Form::label('status', 'Status', ['class' => 'control-label required-field']) }}
                                    {{ Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-md-2 repeater-action-btn">
                                <input data-repeater-delete type="button" value="Delete" class="btn btn-danger"/>
                            </div>
                        </div>
                    </div>
                </div>
                <input data-repeater-create type="button" value="ADD" class="btn btn-primary mt-4"/>
            </div>
        </div>
    </div>
</div>