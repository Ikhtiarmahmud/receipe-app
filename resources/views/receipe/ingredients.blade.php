<div class="col-12 mt-4">
    <div class="card">
        <div class="card-body">
            <h3 class="mb-5">Ingredient Items</h2>
            <div class="repeater">
                <div data-repeater-list="group-a">
                    <div class="group-inp mb-3" data-repeater-item>
                        <div class="row">
                            <div class="col-md-5">
                                {{ Form::label('name', 'Name', ['class' => 'control-label required-field']) }}
                                {{ Form::text('name[]', '', ['class' => 'form-control', 'placeholder' => 'Write a name']) }}
                            </div>
                            <div class="col-md-5">
                                {{ Form::label('amount[]', 'Amount', ['class' => 'control-label required-field']) }}
                                {{ Form::text('amount', '', ['class' => 'form-control', 'placeholder' => 'Write amount']) }}
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