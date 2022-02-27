{{-- <div class="col-md-4 ">
    <div class="position-fixed"> --}}
<div class="row">
    <div class="card border-0 rounded shadow mb-5"  style="width: 16rem;">
            <div class="card-body p-0">
                <ul class="list-group rounded">
                    <li class="list-group-item p-1 pl-3">
                        <h5>
                            <a href="{{ route('recentPost') }}" class="badge badge-rounded badge-light p-2 px-3 m-1">
                                Recent Posts</a>
                        </h5>
                    </li>
                    <li class="list-group-item p-1 pl-3">
                        <h5>
                            <a href="{{ route('oldestPost') }}" class="badge badge-rounded badge-light p-2 px-3 m-1">
                                Oldest Posts</a>
                        </h5>
                    </li>
                    {{-- <li class="list-group-item p-1 pl-3">
                        @foreach ($tags as $tag)
                            <a href="/post/byTag/{{ $tag->id }}" class="badge badge-pill badge-light p-2  m-1">
                                {{ $tag->title }}
                            </a>
                        @endforeach
                    </li> --}}
                    <li class="list-group-item p-1 pl-3">
                        @foreach ($catagories as $catagory)
                            <a href="/post/byCatagory/{{ $catagory->id }}"
                                class="badge badge-pill badge-light p-2  m-1">
                                {{ $catagory->title }}
                            </a>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
</div>
        

    {{-- </div>
</div> --}}
