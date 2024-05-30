<div class="container px-4 py-5">
    <h2 class="pb-2 border-bottom">Trips</h2>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

        @foreach($trips as $trip)

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('{{asset("storage/$trip->cover_path")}}');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
                            <button type="button" class="btn btn-outline-light">
                                <a class="nav-link" href="/trip/{{$trip->id}}">{{$trip->name}}</a>
                            </button>
                        </h3>
                        <ul class="d-flex list-unstyled mt-auto">

                            <li class="d-flex align-items-center me-3">
                                <small>{{$trip->location}}</small>
                            </li>
                            <li class="d-flex align-items-center">
                                <small>{{$trip->date}}</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
