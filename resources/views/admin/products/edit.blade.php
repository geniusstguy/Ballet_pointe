@extends('admin.layouts.master')

@section('content')
    @include('admin.products.create', ['product' => $product])
@endsection