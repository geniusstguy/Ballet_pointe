@extends('frontend.layouts.app')
@section('title')
コミュニティガイドライン
@endsection
@section('css')
@endsection
@section('content')
    <div class="container">
        <div class="title title_set">
            <h1 class="title_tlt">コミュニティガイドライン</h1>
            <p class="title_subtlt">- Guideline -</p>
        </div>
        <div class="content-border privacy-empty-height">
            @if (isset($guideline))
                {!! $guideline->html_content !!}
            @else
                <div class="alert empty-alert">表示するデータがありません。</div>
            @endif
        </div>
    </div>
@endsection
@section('script')
@endsection
