@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($threads as $thread)
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4><a href="{{ $thread->path() }}">{{ $thread->title }}</a></h4>
                                <a href="{{ $thread->path() }}">
                                    <strong>{{ $thread->replies_count }} {{ Str::plural('reply',$thread->replies_count) }}</strong>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                                <div class="body">{{ $thread->body }}</div>
                        </div>
                    </div>
                @empty
                    <p>There is no Relevant Result</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
