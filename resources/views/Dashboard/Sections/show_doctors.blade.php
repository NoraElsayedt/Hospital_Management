@extends('Dashboard.layouts.master')
@section('title')
{{trans('Doctors.doctors')}}
@stop
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{$sections->name}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
				{{trans('Doctors.doctors')}}</span>
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
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
												<th class="wd-15p border-bottom-0">#####</th>
												<th class="wd-15p border-bottom-0"> {{trans('Doctors.name')}} </th>
												<th class="wd-15p border-bottom-0"> {{trans('Doctors.img')}} </th>
												<th class="wd-15p border-bottom-0"> {{trans('Doctors.email')}} </th>
												<th class="wd-15p border-bottom-0"> {{trans('Doctors.section')}} </th>
												<th class="wd-15p border-bottom-0"> {{trans('Doctors.phone')}} </th>
												<th class="wd-15p border-bottom-0"> {{trans('Doctors.appointments')}} </th>
												<th class="wd-15p border-bottom-0"> {{trans('Doctors.Status')}} </th>
											
												<th class="wd-20p border-bottom-0">{{trans('Doctors.created_at')}}</th>
												<th class="wd-15p border-bottom-0">{{trans('Doctors.Processes')}}</th>
												
											</tr>
                            </thead>
							<tbody>
										@foreach($All_Doctor as $Doctors)	
										<tr>
												
												<td>{{$loop->iteration}}</td>
												<td>{{$Doctors->name}}</td>
												<td>{{$Doctors->img}}


                                                @if($Doctors->image)
                                            <img src="{{Url::asset('Dashboard/img/doctors/'.$Doctors->image->filename)}}"
                                                 height="50px" width="50px" alt="">

                                        @else
                                            <img src="{{Url::asset('Dashboard/img/doctor_default.png')}}" height="50px"
                                                 width="50px" alt="">
                                        @endif


                                                </td>
												<td>{{$Doctors->email}}</td>
												<td>{{$Doctors->section->name}}</td>
												<td>{{$Doctors->phone}}</td>
												<td>
                                                @foreach($Doctors->appointments as $appointment)    
                                                {{$appointment->name}}
                                            @endforeach</td>
												<td>
													
												<div
                                            class="dot-label bg-{{$Doctors->status == 1 ? 'success':'danger'}} ml-1"></div>
													
													{{$Doctors->status ? trans('Doctors.Enabled'):trans('Doctors.Not_enabled')}}</td>
												<td>{{$Doctors->created_at->diffForHumans()}}</td>
												<td>	
                                                <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('Doctors.Processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('Doctor.edit',$Doctors->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp; {{trans('Doctors.edit')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password{{$Doctors->id}}"><i   class="text-primary ti-key"></i>&nbsp;&nbsp; {{trans('Doctors.update_password')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$Doctors->id}}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp; {{trans('Doctors.Status_change')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$Doctors->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp; {{trans('Doctors.delete_doctor')}}</a>
                                            </div>
                                        </div>
                                            
                                            
                                            
                                            
                                            </td>
											</tr>

											
											@include('Dashboard.Doctors.delete')
                                            @include('Dashboard.Doctors.deleteAll')
                                            @include('Dashboard.Doctors.update_password')
                                            @include('Dashboard.Doctors.updateStatus')
											@endforeach	
								</tbody>
                        </table>
                    </div>
                </div>
            </div>
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



				