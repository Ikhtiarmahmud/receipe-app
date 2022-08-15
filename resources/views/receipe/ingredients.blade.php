<div class="col-12 mt-4">
    <div class="card">
        <div class="card-body">
            <h3 class="mb-5">Ingredient Items</h2>
            <div class="repeater">
                <div data-repeater-list="group-a">
                    @if($page == "edit")
                        @foreach ($ingredients as $item)
                        <div class="group-inp mb-3" data-repeater-item>
                            <div class="row">
                                <div class="col-md-4">
                                    {{ Form::label('name', 'Name', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('name', $item->name, ['class' => 'form-control', 'placeholder' => 'Write a name']) }}
                                </div>
                                <div class="col-md-3">
                                    {{ Form::label('quantity', 'Quantity', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('quantity', $item->quantity, ['class' => 'form-control', 'placeholder' => 'Write quantity']) }}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('status', 'Status', ['class' => 'control-label required-field']) }}
                                        {{ Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], $item->status, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                {{ Form::hidden('id', $item->id) }}
                                <div class="col-md-2 repeater-action-btn">
                                    <input data-repeater-delete type="button" value="Delete" class="btn btn-danger"/>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="group-inp mb-3" data-repeater-item>
                            <div class="row">
                                <div class="col-md-4">
                                    {{ Form::label('name', 'Name', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Write a name']) }}
                                </div>
                                <div class="col-md-3">
                                    {{ Form::label('quantity', 'Quantity', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('quantity', '', ['class' => 'form-control', 'placeholder' => 'Write quantity']) }}
                                </div>
                                <div class="col-md-3">
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
                    @endif
                </div>
                <input data-repeater-create type="button" value="ADD" class="btn btn-primary mt-4"/>
            </div>
        </div>
    </div>
</div>