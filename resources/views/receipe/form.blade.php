@extends('layouts.master')

@section('content')

    <!-- start page title -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                       <div class="col-md-12">
                        <h4 class="page-title d-inline"><i class="fa fa-industry"></i>&nbsp;ADD NEW RECEIPE</h4>
                    
                       </div>
                    </div>
                </div>
            </div>
            @if($page == "create")
                {{ Form::open(['route' => 'receipes.store', 'methode'=>'post', 'enctype'=>'multipart/form-data']) }}
            @else
                {{ Form::open(['route' => ['receipes.update', $receipe->id], 'methode'=>'post', 'enctype'=>'multipart/form-data']) }}
                @method('PUT')
            @endif
            
           @include('receipe.meta')

           @include('receipe.ingredients')

           @include('receipe.steps')

            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body text-center">
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                        {{ Form::close()}}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- end page title -->

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            'use strict';

            $('.repeater').repeater({
                show: function () {
                    $(this).slideDown();
                   $('.group-input').addStyle('margin-bottom', '10px');
                },
                hide: function (deleteElement) {
                    if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
            });

            $('.step-repeater').repeater({
                show: function () {
                    $(this).slideDown();
                   $('.group-input').addStyle('margin-bottom', '10px');
                },
                hide: function (deleteElement) {
                    if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
            });
        } );
    </script>
@endpush
