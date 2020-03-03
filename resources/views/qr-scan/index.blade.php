@extends('layouts.general')

@section('title', 'qr-scan')

@section('include-styles')
    <link rel="stylesheet" href="{{ asset('mix/css/sweetalert2.min.css') }}">
@endsection
@section('style')
    <style>
        .popup-for-scanner {
            width: 50%;
        }

        .popup-for-scan-result {
            width: 80%;
        }

        .popup-for-scan-result p:only-child {
            font-weight: bold;
            text-align: center;
        }

        @media screen and (max-width: 1000px) {
            .popup-for-scanner {
                width: 80%;
            }
        }

        .scanner-preview.active {
            width: 90%;
        }

        .scanner-capture-image {
            width: 100%;
        }

        .scanner-preview.inactive {
            visibility: hidden;
        }
    </style>
@endsection

@section('body')
    <div class="container" style="padding: 10px">
        <button id="start-scan-btn" class="btn btn-primary" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            偵測相機中...
        </button>
    </div>
@endsection

@section('include-scripts')
    <script src="{{ asset('mix/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('mix/js/instascan.min.js') }}"></script>
@endsection

@section('script')
    <script>
        let cameras, startScanBtn, videoElement, scanner;

        startScanBtn = $('#start-scan-btn');
        videoElement = $('<video class="scanner-preview"></video>')[0];
        scanner = new Instascan.Scanner({
            video: videoElement,
            captureImage: true,
            mirror: false,
            backgroundScan: false
        });

        $(document).ready(function () {
            Instascan.Camera.getCameras()
                .then(function (getCameras) {
                    cameras = getCameras;

                    scanner.addListener('scan', scannerOnScan);
                    scanner.addListener('active', scannerOnActive);
                    startScanBtn.on('click', startScanBtnOnClickListener);
                    startScanBtn.removeClass('btn-primary');
                    startScanBtn.addClass('btn-success');
                    startScanBtn.html('開始掃描');
                    startScanBtn.attr('disabled', false);
                })
                .catch(function (e) {
                    console.error('No cameras found.');

                    startScanBtn.removeClass('btn-success');
                    startScanBtn.addClass('btn-danger');
                    startScanBtn.html('找不到攝影機');
                    startScanBtn.css({cursor: 'not-allowed'});
                });
        });

        const startScanBtnOnClickListener = function () {
            Swal.fire({
                html: videoElement,
                showConfirmButton: false,
                showCancelButton: true,
                cancelButtonText: '停止',
                cancelButtonColor: '#E3342F',
                customClass: {
                    popup: 'popup-for-scanner',
                },
                onBeforeOpen() {
                    Swal.showLoading();
                },
                onOpen() {
                    if (cameras.length === 1) {
                        scanner.start(cameras[0]);
                    }
                },
                onClose() {
                    scanner.stop();
                }
            });
        };

        const scannerOnScan = function (content, image) {
            let resultContent =
                '<div class="container">\
                    <div class="row">\
                        <div class="col">\
                            <p>掃描畫面</p>\
                        </div>\
                        <div class="col">\
                            <p>掃描內容</p>\
                        </div>\
                        <div class="w-100"></div>\
                        <div class="col">\
                            <img class="scanner-capture-image" src="' + image + '" alt="掃描的畫面" />\
                        </div>\
                        <div class="col">\
                            <p>\
                                ' + content + (isUrl(content) ? '<a class="btn btn-info" style="color: white; margin: 3px;" href="' + content + '">前往</a>' : '') + '\
                            </p>\
                        </div>\
                    </div>\
                </div>';

            Swal.close();
            Swal.fire({
                title: '掃描結果',
                html: resultContent,
                confirmButtonText: '確定',
                customClass: {
                    popup: 'popup-for-scan-result',
                },
            });
        };

        const scannerOnActive = function () {
            Swal.hideLoading();
        };

        function isUrl(str) {
            let pattern = new RegExp('^(https?:\\/\\/)?' +
                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|' +
                '((\\d{1,3}\\.){3}\\d{1,3}))' +
                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' +
                '(\\?[;&a-z\\d%_.~+=-]*)?' +
                '(\\#[-a-z\\d_]*)?$', 'i');
            return pattern.test(str);
        }
    </script>
@endsection
