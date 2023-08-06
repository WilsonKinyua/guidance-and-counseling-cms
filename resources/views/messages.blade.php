@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3">
                @if (!auth()->user()->is_counsellor)
                    <div class="card">
                        <div class="card-header">
                            List of Guidance and counseling Experts
                        </div>

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($users as $user)
                                    @if (auth()->user()->id != $user->id)
                                        <li class="list-group-item"><a
                                                href="{{ route('admin.user.messages', $user->id) }}">{{ $user->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->is_counsellor)
                    <div class="card">
                        <div class="card-header">
                            Users who have requested for counselling
                        </div>

                        <div class="card-body">
                            <ul class="list-group">
                                {{-- display users who have sent messages to the counsellor --}}
                                @php
                                    $senderIds = [];
                                @endphp

                                @foreach ($messages as $message)
                                    @if (!$message->sender->is_counselor && !in_array($message->sender->id, $senderIds))
                                        @php
                                            $senderIds[] = $message->sender->id;
                                        @endphp
                                        @if ($message->sender != auth()->user())
                                            <li class="list-group-item">
                                                <a href="{{ route('admin.user.messages', $message->sender->id) }}">
                                                    {{ $message->sender->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <div class="chat-body-list">
                    <div class="card">
                        <div class="card-body">
                            <h6><i class="fa fa-check-circle text-success"></i> {{ $counsellor->name ?? 'No name' }}</h6>
                        </div>
                    </div>
                    <div class="card card-body">
                        <div class="chat-body">
                            @forelse ($messages as $message)
                                @if ($message->sender->id == auth()->user()->id || $message->receiver->id == auth()->user()->id)
                                    <div>
                                        <h6>{{ $message->sender->name }} <small
                                                class="badge badge-info">{{ $message->created_at->diffForHumans() }}</small>
                                        </h6>
                                        <div class="chat-message">
                                            <p>
                                                {{ $message->message }}
                                            </p>
                                            <hr>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <h4 class="text-danger text-center mt-5 pt-5">
                                    No messages yet
                                </h4>
                            @endforelse
                        </div>
                        <div class="chat-footer">
                            <form action="{{ route('admin.store.message') }}" method="post">
                                @csrf
                                <input type="hidden" name="receiver_id" value="{{ $counsellor->id }}">
                                <input type="hidden" name="counsellor_id" value="{{ $counsellor->id }}">
                                <div class="input-group">
                                    <input type="text" name="message" class="form-control"
                                        placeholder="Type your message" required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <h4 class="text-danger text-center mt-5 pt-5">
                    Select a user to chat with from the list on the left
                </h4>
            </div>
        </div>
    </div>
    {{-- @endif --}}
@endsection
@section('scripts')
    @parent
@endsection
