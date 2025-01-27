@extends('frontend.layouts.app')
@section('title')
    マイポワント
@endsection
@section('css')
@endsection
@section('content')
    <div class="container">
        <div class="title title_set">
            <h1 class="title_tlt">利用規約</h1>
            <p class="title_subtlt">- Terms of use -</p>
        </div>
        <div class="content-border tou-empty-height">
            @if (isset($tou))
                {!! $tou->html_content !!}
            @else
                <div class="alert empty-alert">表示するデータがありません。</div>
            @endif
        </div>
    </div>
@endsection
@section('script')
@endsection
