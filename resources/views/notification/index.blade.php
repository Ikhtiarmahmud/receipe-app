@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="row">
                   <div class="col-md-12">
                    <h4 class="page-title d-inline"><i class="fa fa-industry"></i>&nbsp;NOTIFICATION LIST</h4>
                    <p class="mt-4 add-btn" >
                        <a href="{{route('notifications.create')}}" class="btn btn-primary waves-effect mr-4"><i class="fa fa-plus"></i> ADD NEW</a>
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
    						<tr class="bg-primary text-white">
    							<th>SL</th>
    							<th>Title</th>
    							<th>Subtitle</th>
    							<th>Type</th>
    							<th>Content</th>
    							<th>ACTION</th>
    						</tr>
    					</thead>
    					<tbody>
                            @php
                                $sl = 0;
                            @endphp
                            @foreach ($notifications as $notification)
                                <tr>
                                    <td>{{++$sl}}</td>
                                    <td>{{$notification->title}}</td>
                                    <td>{{$notification->sub_title}}</td>
                                    <td>{{$notification->type}}</td>
                                    <td>{{$notification->column_id}}</td>
                                    <td>
                                        <a href="{{ route('notifications.edit',$notification->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {{ Form::open(['route' => ['notifications.destroy', $notification->id], 'methode'=>'post', 'class' => 'd-inline'])}}
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
