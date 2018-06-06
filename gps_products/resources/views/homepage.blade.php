@extends('layouts.theme_main')
@section('title', 'County Tax Sale App (CTSA)')
@section('content')

    <div class="mr-front-content col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="js-typed-text">
            <h1 class="mr-front-heading">
            </h1>
            <h2 class="mr-front-subheading">
            </h2>
        </div>
        <br/>
        <br/>
        <div class="mr-front-cta">
            <a href="{{ route('login') }}" class="btn btn-lg btn-blue btn-outline">Sign In</a>
            <a href="{{ route('signup') }}" class="btn btn-lg btn-blue">Register</a>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(function () {
            var typedText = $(".js-typed-text");
            typedText.text('');
            typedText.typed({
                strings: [
                    '<h2 class="mr-front-heading">{{ $questions[0]->question }}</h2> <br/> <h2 class="mr-front-subheading">{{ $questions[0]->answer }} <span class="typed-cursor">|</span> </h2>',
                    '<h2 class="mr-front-heading">{{ $questions[1]->question }}</h2> <br/> <h2 class="mr-front-subheading">{{ $questions[1]->answer }} <span class="typed-cursor">|</span> </h2>',
                    '<h2 class="mr-front-heading">{{ $questions[2]->question }}</h2> <br/> <h2 class="mr-front-subheading">{{ $questions[2]->answer }} <span class="typed-cursor">|</span> </h2>',
                    '<h2 class="mr-front-heading">{{ $questions[3]->question }}</h2> <br/> <h2 class="mr-front-subheading">{{ $questions[3]->answer }} <span class="typed-cursor">|</span> </h2>',
                ],
                loop: true,
                startDelay: 500,
                backDelay: 2000
            });
        });
    </script>
@endsection
