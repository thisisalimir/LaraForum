@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="/profiles/{{$thread->creator->name}}"> {{ $thread->creator->name }}</a> posted:
                                {{ $thread->title }}
                            </div>
                            <div>
                                @can('update',$thread)
                                    <form action="{{ $thread->path() }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-link">Delete Thread</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="body">{{ $thread->body }}</div>
                    </div>
                </div>
                @foreach ($replies as $reply)
                    @include('threads.reply')
                @endforeach

                <div class="mt-2">
                    {{ $replies->links() }}
                </div>

                @auth
                    <hr>
                    <form action="{{ $thread->path() . '/replies' }}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Have Something to Say?"
                                      rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary">Post</button>
                    </form>
                @endauth

                @guest
                    <hr>

                    <h5 class="text-center">Please <a href="{{ route('login') }}">Login</a> to Participate in this
                        Discussion</h5>
                @endguest
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p>
                            This Thread was published {{ $thread->created_at->diffForHumans() }}
                            By: <a href="">{{ $thread->creator->name }}</a> and Currently
                            has {{ $thread->replies_count }}
                            {{ Str::plural('comment',$thread->replies_count) }}.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
