<div >
@if($selected_Conversations)

<div class="main-content-body main-content-body-chat">

								<div class="main-chat-header">
									<div class="main-img-user"><img alt="" src="{{URL::asset('Dashboard/img/faces/9.jpg')}}"></div>
									<div class="main-chat-msg-name">
										<h6>{{$receiveruser->name}}</h6>
									</div>
									
								</div><!-- main-chat-header -->
								<div class="main-chat-body" id="ChatBody">
									<div class="content-inner">
									@foreach($message as $messages)
										<div class="media {{$auth_email==$messages->sender_email ?'flex-row-reverse':'' }} ">
											<div class="main-img-user online"><img alt="" src="{{URL::asset('Dashboard/img/faces/9.jpg')}}"></div>
											<div class="media-body">
												<div class="main-msg-wrapper right">
													{{$messages->body}}
												</div>
												<div>
													<span>9:48 am</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
												</div>
											</div>
										</div>
									
									@endforeach
									</div>
								</div>
							
							</div>
							@endif
							</div>
