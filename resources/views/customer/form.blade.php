@extends('layouts.master')

@section('content')

    <!-- start page title -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                       <div class="col-md-12">
                        <h4 class="page-title d-inline"><i class="fa fa-industry"></i>&nbsp;ADD NEW CUSTOMER</h4>
                    
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                       @if($page == "create")
                            {{ Form::open(['route' => 'customers.store', 'methode'=>'post', 'enctype'=>'multipart/form-data']) }}
                        @else
                            {{ Form::open(['route' => ['customers.update', $customer->id], 'methode'=>'post', 'enctype'=>'multipart/form-data']) }}
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('name', 'Name', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('name', $page == 'edit' ? $customer->name : '', ['class' => 'form-control', 'placeholder' => 'Write your name']) }}
                                    @if($errors->has('name'))
                                        <p class="error-msg">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('email', 'Email', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('email', $page == 'edit' ? $customer->email : '', 
                                        ['class' => 'form-control', 'placeholder' => 'Write your email'])
                                    }}
                                    @if($errors->has('email'))
                                        <p class="error-msg">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('address', 'Address', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('address', $page == 'edit' ? $customer->address : '', 
                                            ['class' => 'form-control', 'placeholder' => 'Write your address']) }}
                                    @if($errors->has('address'))
                                        <p class="error-msg">{{ $errors->first('address') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    {{ Form::label('age', 'Age', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('age', $page == 'edit' ? $customer->age : '', 
                                        ['class' => 'form-control', 'placeholder' => 'Write your age']) 
                                    }}
                                    @if($errors->has('age'))
                                        <p class="error-msg">{{ $errors->first('age') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    {{ Form::label('Blood Group', 'Blood Group', ['class' => 'control-label required-field']) }}
                                    {{ Form::text('blood_group', $page == 'edit' ? $customer->blood_group : '', 
                                        ['class' => 'form-control', 
                                        'placeholder' => 'Write your blood group'
                                        ])}}
                                    @if($errors->has('blood_group'))
                                        <p class="error-msg">{{ $errors->first('blood_group') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ Form::label('status', 'Status', ['class' => 'control-label required-field']) }}
                                    {{ Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], $page == 'edit' ? $customer->status : '', ['class' => 'form-control']) }}
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
                                    <img src="{{ asset('storage/images/' . $customer->image) }}" alt="" height="200" width="200">
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
