@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        List of Guidance and counseling Experts
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="">An active item</a></li>
                            <li class="list-group-item"><a href="">A second item</a></li>
                            <li class="list-group-item"><a href="">A third item</a></li>
                            <li class="list-group-item"><a href="">A fourth item</a></li>
                            <li class="list-group-item"><a href="">And a fifth one</a></li>
                            <li class="list-group-item"><a href="">An active item</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="chat-body-list">
                    <div class="card">
                        <div class="card-body">
                            <h6><i class="fa fa-check-circle text-success"></i> Wilson Kinyua</h6>
                        </div>
                    </div>
                    <div class="chat-body">
                        <div class="d-flex">
                            <div>
                                {{-- <img
                                    src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                    alt=""> --}}
                            </div>
                            <div>
                                <h6>Wilson Kinyua: <small>2023-07-08 21:56:27</small></h6>
                                <div class="chat-message">
                                    <p>test</p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div>
                                {{-- <img src="https://previews.123rf.com/images/apoev/apoev2107/apoev210700033/171405527-default-avatar-photo-placeholder-gray-profile-picture-icon-business-man-illustration.jpg"
                                    alt=""> --}}
                            </div>
                            <div>
                                <h6>Wilson Kinyua: <small>2023-07-08 21:56:31</small></h6>
                                <div class="chat-message">
                                    <p>hello</p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card card-body">
                    <div id="chat-messages">
                        <div class="message received">
                            <div class="message-content">
                                <p>This is a received message</p>
                                <span class="message-time">10:30 AM</span>
                            </div>
                        </div>
                        
                        <div class="message sent">
                            <div class="message-content">
                                <p>This is a sent message</p>
                                <span class="message-time">10:31 AM</span>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="card card-body">
                    <form id="send-form">
                        <div class="input-group">
                            <input type="text" id="message-input" class="form-control" placeholder="Type a message">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>


        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
