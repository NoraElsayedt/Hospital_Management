
<div wire:ignore>
<div class="main-chat-list" id="ChatList">
@foreach($Conversations as $Conversation)
									<div wire:click='chatuserseleted({{$Conversation}},{{$this->getusers($Conversation,$name="id")}})' class="media new">
									
										<div class="media-body">
											<div class="media-contact-name">
												<span>{{$this->getusers($Conversation,$name='name')}}</span>
												 <span>{{$Conversation->messages->last()->created_at->shortAbsoluteDiffForHumans()}}</span>
											</div>
											<p>{{$Conversation->messages->last()->body}}</p>
										</div>

									</div>
									@endforeach
								
								</div><!-- main-chat-list -->

</div>
