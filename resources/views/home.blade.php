@extends('layouts.admin')
@section('content')
    @if (!auth()->user()->is_admin)
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
    @endif
    @if (auth()->user()->is_admin)
        <div class="card">
            <div class="card-header">
                Dashboard
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-body bg-success text-white">
                            <h3>Users</h3>
                            <h5> {{ App\Models\User::count() }}</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-body bg-info text-white">
                            <h3>Roles</h3>
                            <h5>{{ App\Models\Role::count() }}</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-body bg-dark text-white">
                            <h3>Messages</h3>
                            <h5>{{ App\Models\Message::count() }}</h5>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-body">
                            <h4><span>Users</span> <a class="float-right text-primary"
                                    href="{{ route('admin.users.index') }}">View All <i class="fa fa-arrow-right"></i></a>
                            </h4>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (App\Models\User::all() as $user)
                                        <tr>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach ($user->roles as $key => $item)
                                                    <span class="badge badge-info">{{ $item->title }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    @parent
@endsection
