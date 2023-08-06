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
                                    @if (!in_array($message->sender->id, $senderIds))
                                        @php
                                            $senderIds[] = $message->sender->id;
                                        @endphp
                                        <li class="list-group-item">
                                            <a href="{{ route('admin.user.messages', $message->sender->id) }}">
                                                {{ $message->sender->name }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <h4 class="text-danger text-center mt-5 pt-5">
                    Select a user to chat with from the list on the left
                </h4>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
