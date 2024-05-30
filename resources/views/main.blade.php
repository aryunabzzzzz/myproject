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
                    <h2 class="featurette-heading fw-normal lh-1">Share your impressions!</h2>
                    <p class="lead">text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text.</p>
                </div>
                <div class="col-md-5">
                    <img src="https://turizm.pibig.info/uploads/posts/2023-04/thumbs/1682325110_turizm-pibig-info-p-estetika-puteshestvii-turizm-instagram-38.jpg" width="500" height="500">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">Plan trips with friends</h2>
                    <p class="lead">text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img src="https://kartinki.pics/uploads/posts/2022-12/1670531862_1-kartinkin-net-p-puteshestvenniki-kartinki-pinterest-1.jpg" width="500" height="500">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">Create your own story</h2>
                    <p class="lead">text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text</p>
                </div>
                <div class="col-md-5">
                    <img src="https://trikky.ru/wp-content/blogs.dir/1/files/2020/11/01/b4550a22-6e2f-478c-8d4a-2075d025cc01.jpeg" width="500" height="500">
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
                    <button type="button" class="btn btn-primary btn-lg px-4 gap-3">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">
                        <a class="nav-link" href="{{ route('login') }}">LogIn</a>
                    </button>
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
