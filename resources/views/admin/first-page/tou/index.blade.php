@extends('admin.layouts.master')
@section('title')
    利用規約管理
@endsection
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            管理者
        @endslot
        @slot('title')
            利用規約管理
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">利用規約管理</h5>
                    <div>
                        <a href="{{ route('admin.first-page.tou.create') }}" id="addTou"
                            class="btn btn-primary">利用規約登録</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="touDatatable" class="table nowrap dt-responsive align-middle table-hover table-bordered"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>内容</th>
                                <th>作成日時</th>
                                <th>ステータス</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_tou as $index => $tou)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ mb_strimwidth(strip_tags($tou->content), 0, 100, '...') }}</td>
                                    <td>{{ $tou->created_at }}</td>
                                    <td><span
                                            class="badge bg-{{ $tou->status == 1 ? 'success' : 'secondary' }}-subtle text-{{ $tou->status == 1 ? 'success' : 'secondary' }}"
                                            style="font-size: 12px">{{ $tou->status == 1 ? '現示' : '非現示' }}</span></td>
                                    <td class="d-flex gap-3 flex-wrap justify-content-center">
                                        <a href="{{ route('admin.first-page.tou.edit', $tou->id) }}" type="button"
                                            class="btn btn-sm btn-info">編集</a>
                                        <form action="{{ route('admin.first-page.tou.destroy', $tou->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('本当にこの記録を削除しますか？')">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    {{-- <script src="{{ URL::asset('build/js/app.js') }}"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let table = new DataTable('#touDatatable', {
                "pagingType": "full_numbers",
                language: {
                    processing: "処理中...",
                    lengthMenu: "_MENU_ 件表示",
                    zeroRecords: "記録は見つかりませんでした",
                    info: "_TOTAL_ 件中 _START_ から _END_ まで表示",
                    infoEmpty: "0 件中 0 から 0 まで表示",
                    infoFiltered: "(全 _MAX_ 件より抽出)",
                    search: "検索:",
                    paginate: {
                        first: "先頭",
                        previous: "前",
                        next: "次",
                        last: "最終"
                    }
                }
            });
        });
    </script>
@endsection
