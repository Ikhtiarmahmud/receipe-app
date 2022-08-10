@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="row">
                   <div class="col-md-12">
                    <h4 class="page-title d-inline"><i class="fa fa-industry"></i>&nbsp;CUSTOMER LIST</h4>
                    <p class="mt-4 add-btn" >
                        <a href="{{route('customers.create')}}" class="btn btn-primary waves-effect mr-4"><i class="fa fa-plus"></i> ADD NEW</a>
                    </p>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
    	<div class="col-12">
    		<div class="card">
                @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                @endif
    			<div class="card-body">
                        <table class="table table-responsive-sm table-striped" id="datatable">
                            <thead>
    						<tr class="text-center bg-primary text-white">
    							<th>SL</th>
    							<th>NAME</th>
    							<th>STATUS</th>
    							<th>ACTION</th>
    						</tr>
    					</thead>
    					<tbody class="text-center">
                            @php
                                $sl = 0;
                            @endphp
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{++$sl}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>
                                        <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {{ Form::open(['route' => ['customers.destroy', $customer->id], 'methode'=>'post', 'class' => 'd-inline'])}}
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure!')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        {{Form::close()}}
                                     </td>
                                </tr>
                            @endforeach
    					</tbody>
    				</table>
    			</div>
    		</div>
    	</div>
    </div>
</div>
<!-- end page title -->
@endsection
@push('js')
<script src="<?=url('assets/js/sweetalert2.all.min.js');?>"></script>
<script src="<?=url('assets/js/customjs/delete-function.js');?>"></script>
@endpush
