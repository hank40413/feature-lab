@extends('layouts.general')

@section('title', 'home')

@section('body')
    <div class="container" style="margin-top: 10px">
        <div class="row">
            <div class="col">
                <h2>功能捷徑</h2>
            </div>
            <div class="col">
                <h2>說明</h2>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <button id="btn-redirect-qr-scan" class="btn btn-outline-info">二維條碼掃描</button>
            </div>
            <div class="col">
                使用 <span><a href="https://github.com/schmich/instascan" target="_blank">instascan</a></span> 套件完成的二維條碼掃描器
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const btnRedirectQrScan = $('#btn-redirect-qr-scan');

        btnRedirectQrScan.on('click', function () {
            location.href = '{{ route('qr-scan.index') }}';
        });
    </script>
@endsection
