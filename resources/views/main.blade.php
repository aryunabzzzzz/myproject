@extends('layouts')
@section('title')
    Main
@endsection
@section('content')

    <main>

            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">Вдохновляйся и вдохновляй <span class="text-body-secondary">It’ll blow your mind.</span></h2>
                    <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
                </div>
                <div class="col-md-5">
                    <img src="https://sun9-34.userapi.com/impg/aNvMSj27g_DPKQMseca6zTGmdXuvzd8wwHV70w/u0lA2pb3Cyo.jpg?size=1332x1332&quality=95&sign=d69a35055b76c871d5a868e87fdb5de0&type=album" width="500" height="500">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">Найди людей разделяющих твои интересы <span class="text-body-secondary">Планируйте вместе. </span></h2>
                    <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img src="https://sun9-34.userapi.com/impg/aNvMSj27g_DPKQMseca6zTGmdXuvzd8wwHV70w/u0lA2pb3Cyo.jpg?size=1332x1332&quality=95&sign=d69a35055b76c871d5a868e87fdb5de0&type=album" width="500" height="500">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">Делись опытом <span class="text-body-secondary">Checkmate.</span></h2>
                    <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
                </div>
                <div class="col-md-5">
                    <img src="https://sun9-34.userapi.com/impg/aNvMSj27g_DPKQMseca6zTGmdXuvzd8wwHV70w/u0lA2pb3Cyo.jpg?size=1332x1332&quality=95&sign=d69a35055b76c871d5a868e87fdb5de0&type=album" width="500" height="500">
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->

        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="https://sun9-24.userapi.com/impg/CvjClXCZYheVvxXV53AZ6D_EFvpNCMTpUY1aIQ/KPRCZf-Glao.jpg?size=394x141&quality=96&sign=8c0252ee8627c9b35da77ed840323fa8&type=album" alt="" width="200" height="70">
            <h1 class="display-5 fw-bold text-body-emphasis">Create your own</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Join us and share your experience with others!</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-primary btn-lg px-4 gap-3"><a class="nav-link" href="{{ route('register') }}">Register</a></button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4"><a class="nav-link" href="{{ route('login') }}">LogIn</a></button>
                </div>
            </div>
        </div>


        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2023–2024 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </main>
@endsection
