<reply :attributes="{{ $reply }}" inline-template v-cloak>
    <div id="reply-{{ $reply->id }}" class="card mt-2">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('profile',$reply->owner->name) }}">
                        {{ $reply->owner->name }}
                    </a>
                    said {{ $reply->created_at->diffForHumans() }}
                </div>


                <div>
                    <form action="/replies/{{$reply->id}}/favorites" method="post">
                        @csrf
                        <button type="submit" class="btn btn-secondary" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                            {{ $reply->favorites_count}} {{ Str::plural('Favorite',$reply->favorites_count) }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>
                <button class="btn btn-sm btn-primary" @click="update">Update</button>
                <button class="btn btn-sm btn-link" @click="editing = false">Cancel</button>
            </div>
            <div v-else v-text="body"></div>
        </div>

        @can('update',$reply)
            <div class="card-footer d-flex">
                <button class="btn btn-secondary btn-sm mr-1" @click="editing = true">Edit</button>
                <button class="btn btn-danger btn-sm mr-1" @click="destroy">Delete</button>
            </div>
        @endcan
    </div>
</reply>