@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @if($users->count() > 0)
                <h3>Pick a user to chat with</h3>
                <ul id="users">
                    @foreach($users as $user)
                        <li><span class="label label-info">{{ $user->name }}</span> <a href="javascript:void(0);" class="chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->name }}">Open chat</a></li>

                        <a href="javascript:void(0);" class="single_window_chat" data-id="{{ $user->id }}" data-user="{{ $user->name }}">Single window chat</a></li>
                    @endforeach
                </ul>
            @else
                <p>No users found! try to add a new user using another browser by going to <a href="{{ url('register') }}">Register page</a></p>
            @endif
        </div>
        <div class="col-md-8 chat-overlay1" id="chat-overlay">
            <div id="chat_box_section" class="chat_box_section " style="display: none">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat with <i class="chat-user"></i> </h3>
                                    
                                </div>
                                <div class="panel-body chat-area">
            
                                </div>
                                <div class="panel-footer">
                                    <div class="input-group form-controls">
                                        <textarea class="form-control input-sm chat_input" placeholder="Write your message here..."></textarea>
                                        <span class="input-group-btn">
                                                <button class="btn btn-primary btn-sm btn-chat" type="button" data-to-user="" disabled>
                                                    <i class="glyphicon glyphicon-send"></i>
                                                    Send</button>
                                            </span>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <input type="hidden" id="to_user_id" value="" />
            </div>
        </div>
    </div>

    {{-- @include('chat-box') --}}

    <input type="hidden" id="current_user" value="{{ \Auth::user()->id }}" />
    <input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />
    <input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER') }}" />
@stop

@section('script')
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    {{-- <script src="{{ asset('js/chat.js') }}"></script> --}}
    <script src="{{ asset('js/full_chat.js') }}"></script>

@stop