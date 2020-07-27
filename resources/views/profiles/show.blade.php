@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card-header">
                    <div>
                        <h4>{{ @$profileUser->name }}</h4>
                        <h6>
                            Joined Since {{ $profileUser->created_at->diffForHumans() }}
                        </h6>
                    </div>
                </div>
                <hr>

                @foreach($activities as $date => $activity)
                    <h3 class="page-header mt-2">{{ $date }}</h3>
                    @foreach ($activity as $record)
                        @if(view()->exists("profiles.activities.{$record->type}"))
                            @include ("profiles.activities.{$record->type}", ['activity' => $record])
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

@endsection