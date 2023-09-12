<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('Dashboard/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{Auth::User()->name}}</h4>
							<span class="mb-0 text-muted">{{Auth::User()->email}}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
				<li class="side-item side-item-category">{{trans('Dashboard/main-sidebar.Main')}}</li>
				<li class="slide">
						<a class="side-menu__item" href="{{ route('dashboard.patient') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">{{trans('Dashboard/main-sidebar.Index')}}</span><span class="badge badge-success side-badge">1</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg><span class="side-menu__label">الكشوفات</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
						
						<li><a class="slide-item" href="{{ route('patient_invoices') }}">قائمة الفواتير</a></li>
						  <li><a class="slide-item"  href="{{ route('patient_Labs') }}" >المختبر</a></li>
                            <li><a class="slide-item"  href="{{ route('patient_Rays') }}">الاشعة</a></li>
						</ul>
					</li>
				</ul>
	</div>