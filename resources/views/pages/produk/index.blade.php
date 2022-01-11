@extends('layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endpush

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between">
                            <p class="card-title">Data Produk</p>
                        </div>
                        <div class="card-body">
                            <table class="table" id="pesanan">
                                <thead>
                                    <tr>
                                        <th>produk_id</th>
                                        <th>nama_produk</th>
                                        <th>stok_sekarang</th>
                                        <th>stok_terjual</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <script src='//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js'></script>
    <link rel='stylesheet' href='//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css'>
    <script>
        $(document).ready(function() {
            $('#pesanan').DataTable({
                "ajax": "{{ url('api/produk') }}",
                "columns": [{
                        "data": "produk_id"
                    },
                    {
                        "data": "nama_produk"
                    },
                    {
                        "data": "stok_sekarang"
                    },
                    {
                        "data": "stok_terjual"
                    },
                ]
            });
        });
    </script>
@endpush
