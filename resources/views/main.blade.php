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
                    <h2 class="featurette-heading fw-normal lh-1">🌍✈️ Share Your Impressions! ✈️🌍</h2>
                    <p class="lead">Hey, fellow adventurers! 🌟 We want to hear all about your latest travel escapades! Whether you’ve explored hidden gems, tasted exotic foods, or stumbled upon breathtaking views, your stories are what make this community special. 📸✨</p>
                    <p class="lead">Drop your favorite travel memories, stunning photos, and insider tips in the comments below. Let’s inspire each other with incredible experiences and must-visit spots around the globe! 🌏❤️</p>
                    <p class="lead">Happy traveling and looking forward to your amazing stories! 🚀📷</p>
                </div>
                <div class="col-md-5">
                    <img src="https://n1s1.hsmedia.ru/c6/d6/b5/c6d6b53c3d05795cdda21931af00b69c/728x546_1_49d04df94b04be9f8dfeeb7c3bf0e869@1708x1281_0xac120003_17183358951622447666.jpg" width="500" height="500">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">🗺️🎒 Plan Trips with Friends! 🗺️🎒</h2>
                    <p class="lead">Hey travel buddies! 👫👬 Ready to make your next adventure a group effort? With our platform, planning trips with friends has never been easier! 🎉✨</p>
                    <p class="lead">Coordinate dates, share destination ideas, and build your itinerary all in one place. No more endless group chats or mixed-up plans—just smooth sailing from start to finish. 🌟📅</p>
                    <p class="lead">Start planning your dream getaway together and let the excitement begin! 🌴🌆</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img src="https://kartinki.pics/uploads/posts/2022-12/1670531862_1-kartinkin-net-p-puteshestvenniki-kartinki-pinterest-1.jpg" width="500" height="500">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">📖✨ Create Your Own Story! ✨📖</h2>
                    <p class="lead">Hey, adventurers! 🌟 It’s time to turn your travel dreams into reality. Share your unique journey and let the world see your story unfold! Whether you’re exploring a bustling city, relaxing on a serene beach, or trekking through hidden trails, every adventure has its own magic. ✨🗺️</p>
                    <p class="lead">Post your personal travel tales, stunning photos, and unforgettable moments right here. Inspire others with your creativity and make your experiences a part of the global travel tapestry! 🌍📸</p>
                    <p class="lead">Your story is waiting to be shared. Let’s create something amazing together! 🚀🌟</p>
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
