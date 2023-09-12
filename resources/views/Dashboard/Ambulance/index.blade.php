@extends('Dashboard.layouts.master')

@section('title')
{{trans('Ambulance.Ambulance')}}
@stop

@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('Ambulance.Ambulance')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Ambulance.Ambulance_Car')}} </span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.Sections.messages_alert')
				<!-- row opened -->
				<div class="row row-sm">
					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
                                    <a href="{{route('Ambulance.create')}}" class="btn btn-primary"> {{trans('Ambulance.add_New_Car')}}</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th>#</th>
												<th > {{trans('Ambulance.car_number')}}</th>
												<th > {{trans('Ambulance.car_model')}} </th>
												<th> {{trans('Ambulance.car_year_made')}}</th>
												<th> {{trans('Ambulance.car_type')}}</th>
												<th > {{trans('Ambulance.driver_name')}}</th>
                                                <th >{{trans('Ambulance.driver_license_number')}}</th>
                                                <th >{{trans('Ambulance.driver_phone')}}</th>
                                                <th >{{trans('Ambulance.is_available')}}</th>
                                                <th >{{trans('insurance.notes')}}</th>
                                <th >{{trans('insurance.Processes')}}</th>
                            </tr>
										</thead>
										<tbody>
                                        @foreach( $Ambulance as $ambulance)
											<tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$ambulance->car_number}}</td>
                                                <td>{{$ambulance->car_model}}</td>
                                                <td>{{$ambulance->car_year_made}}</td>
                                                <td>{{$ambulance->car_type == 1 ? 'مملكوكة' :'ايجار'}}</td>
                                                <td>{{$ambulance->driver_name}}</td>
                                                <td>{{$ambulance->driver_license_number}}</td>
                                                <td>{{$ambulance->driver_phone}}</td>
                                                <td class="{{$ambulance->is_available == 1 ? 'bg-success':'bg-danger'}}">{{$ambulance->is_available == 1 ? 'مفعلة':'غير مفعلة'}}</td>
                                                <td>{{$ambulance->notes}}</td>
                                                <td>
                                                    <a href="{{route('Ambulance.edit',$ambulance->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleted{{$ambulance->id}}"><i class="fas fa-trash"></i></button>
                                                </td>
											</tr>
                                            @include('Dashboard.Ambulance.Deleted')
                                        @endforeach
										</tbody>
									</table>
								</div>
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection