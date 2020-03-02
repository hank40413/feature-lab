@extends('layouts.general')

@section('title', 'qr-scan')

@section('include-styles')
    <link rel="stylesheet" href="{{ asset('mix/css/sweetalert2.min.css') }}">
@endsection
@section('style')
    <style>
        .custom-swal2-popup {
            width: 50%
        }

        @media screen and (max-width: 1000px) {
            .custom-swal2-popup {
                width: 80%
            }
        }

        .scanner-preview.active {
            width: 90%
        }

        .scanner-preview.inactive {
            visibility: hidden;
        }
    </style>
@endsection

@section('body')
    <div class="container" style="padding: 10px">
        <button id="start-scan-btn" class="btn btn-success">開始掃描</button>
    </div>
@endsection

@section('include-scripts')
    <script src="{{ asset('mix/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('mix/js/instascan.min.js') }}"></script>
@endsection

@section('script')
    <script>
        let camera, startScanBtn, videoElement, scanner;

        startScanBtn = $('#start-scan-btn');
        videoElement = $('<video class="scanner-preview"></video>')[0];
        scanner = new Instascan.Scanner({
            video: videoElement,
            mirror: false,
            backgroundScan: false
        });

        $(document).ready(function () {
            Instascan.Camera.getCameras()
                .then(function (cameras) {
                    camera = cameras[0];
                })
                .catch(function (e) {
                    console.error('No cameras found.');
                    startScanBtn.attr('disabled', true);
                    if (startScanBtn.hasClass('btn-success')) {
                        startScanBtn.removeClass('btn-success');
                        startScanBtn.addClass('btn-danger');
                    }
                    startScanBtn.text('找不到攝影機');
                    startScanBtn.css({ cursor: 'not-allowed' });
                });

            scanner.addListener('scan', scannerOnScan);
            scanner.addListener('active', scannerOnActive);
            startScanBtn.on('click', startScanBtnOnClickListener);
        });

        const startScanBtnOnClickListener = function () {
            Swal.fire({
                html: videoElement,
                showConfirmButton: false,
                showCancelButton: true,
                cancelButtonText: '停止',
                cancelButtonColor: '#E3342F',
                onBeforeOpen: function () {
                    Swal.showLoading();
                },
                customClass: {
                    popup: 'custom-swal2-popup',
                },
            }).then(function () {
                scanner.stop();
            });
            scanner.start(camera);
        };

        const scannerOnScan = function (content) {
            console.log(content);
        };

        const scannerOnActive = function () {
            Swal.hideLoading();
        };
    </script>
@endsection
