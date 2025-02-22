@extends('frontend.layouts.app')
@section('title')
    マイポワント
@endsection
@section('css')
@endsection
@section('content')
    <div class="faq container">
        <div class="title title_set">
            <h1 class="title_tlt">ご利用ガイド</h1>
            <p class="title_subtlt">- FAQ -</p>
        </div>
        <div class="des_box faq-empty-height">
            @if (count($all_faq) > 0)
                <div class="items">
                    @foreach ($all_faq as $index => $faq)
                        <div class="faq-item">
                            <a class="faq-question">
                                <div class="ribbon">Q</div>
                                <p class="question">{{ $faq->title }}</p>
                            </a>
                            <div class="faq-answer">
                                <div class="ribbon">A</div>
                                <p class="answer">{{ $faq->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert empty-alert">表示するデータがありません。</div>
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/faq.js') }}"></script>
@endsection
