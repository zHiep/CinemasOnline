@extends('admin.layout.index')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
               @lang('lang.scan_ticket')
            </div>

            <div class="card-body pt-2">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>@lang('lang.theater')</td>
                        <td id="theater"></td>
                    </tr>
                    <tr>
                        <td>@lang('lang.room')</td>
                        <td id="room"></td>
                    </tr>
                    <tr>
                        <td>@lang('lang.seat')</td>
                        <td id="seats"></td>
                    </tr>
                    <tr>
                        <td>@lang('lang.movies')</td>
                        <td id="movie"></td>
                    </tr>
                    <tr>
                        <td>@lang('lang.showtime_web')</td>
                        <td><span id="date"></span > | <span id="startTime"></span></td>
                    </tr>
                    <tr>
                        <td>@lang('lang.status')</td>
                        <td id="status"></td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <label for="ticket_id" class="form-control-label">@lang('lang.ticket_code')</label>
                    <input id="ticket_id" class="form-control" name="userCode" type="number" value="" readonly>
                </div>

                <div id="barcode-scanner-controller" class="controller">
                    <nav class="navbar navbar-dark">
                        <div class="navbar-brand mb-0 h3">
                            <span id="back-button">&#8249;@lang('lang.barcode_scanner')</span>

                        </div>
                        <div class="spacer"></div>
                        <div class="camera-button-container h3">
{{--                            <span id="camera-swap-button">&#8645;</span>--}}
                            <span id="camera-switch-button">&#8646;</span>
                        </div>
                    </nav>
                    <div id="barcode-scanner-container" class="view-controller-container" style="max-height: 200px">
                        <div class="web-sdk-progress-bar"></div>
                    </div>
                    <div class="action-bar">
                        <div class="barcode-result-container"></div>
                    </div>
                </div>

                <div class="content-container">
                    <div id="barcode-scanner-button" class="btn">@lang('lang.barcode_scanner')</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let $codeTemp = '';
        let results = [];
        let scanbotSDK, barcodeScanner;

        class Config {
            static license() {
                return 
                        "L6qp/ROAbRzojTbih0WiA6Opj4edHm" +
                        "j/45qEGtEcS317HDV7HEy0noZKz/+A" +
                        "UVF84A66Q6OjSPd7BcGPclWDXazLIn" +
                        "s7s+02dqmrGTJj/Z6F4nzOBlebKPJh" +
                        "j5UaYCD+BNq+0L/VHQumUTqS0BpaSH" +
                        "KC1i9r+iXSUGK57WH2yoat2uawBi2d" +
                        "EP7JmXsWHldGYItSKdI7wXw7GBW2eY" +
                        "fzhXa+refHB2cVYe9rO+B6Yh26V5xr" +
                        "PKfwuuE5Gg9xMsW6jZK5GerTuYWE/Z" +
                        "s6ImJQv24VDg76Rz2HWnxTmCIQCAoR" +
                        "Yj8jkR81BHHIGq3Zzq/9tVusldDRKG" +
                        "hyQjzXCWsPVQ==\nU2NhbmJvdFNESw" +
                        "psb2NhbGhvc3R8Y2luZW1hc29ubGlu" +
                        "ZS1wcm9kdWN0aW9uLnVwLnJhaWx3YX" +
                        "kuYXBwCjE3MzM3ODg3OTkKODM4ODYw" +
                        "Nwo4\n";
            }
            static barcodeScannerContainerId() {
                return "barcode-scanner-container";
            }
        }

        window.onresize = () => {
            this.resizeContent();
        };

        window.onload = async () => {
            this.resizeContent();

            scanbotSDK = await ScanbotSDK.initialize({ licenseKey: Config.license() });
            console.log('scanbotSDK', scanbotSDK);
            $("#barcode-scanner-button").on('click', async (e) => {
                $("#barcode-scanner-controller").addClass('d-block');

                const barcodeFormats = [
                    "QR_CODE",
                ];

                const config = {
                    containerId: Config.barcodeScannerContainerId(),
                    style: {
                        window: {
                            borderColor: "blue"
                        },
                        text: {
                            color: "red",
                            weight: 500
                        }
                    },
                    onBarcodesDetected: onBarcodesDetected,
                    returnBarcodeImage: true,
                    onError: onScannerError,
                    barcodeFormats: barcodeFormats,
                    preferredCamera: 'DroidCam Source 2'
                };

                try {
                    barcodeScanner = await scanbotSDK.createBarcodeScanner(config);
                    const divElement = document.querySelector('#barcode-scanner-container div[style*="position: relative"]');

                    // Kiểm tra nếu phần tử tồn tại, thay đổi thuộc tính position
                    if (divElement) {
                        divElement.style.position = ""; // Loại bỏ thuộc tính position
                        console.log('Đã loại bỏ position: relative');
                    } else {
                        console.log('Không tìm thấy thẻ div với position: relative');
                    }
                } catch (e) {
                    console.log(e.name + ': ' + e.message);
                    alert(e.name + ': ' + e.message);
                    $("#barcode-scanner-controller").addClass("d-none");
                }
            });

            $('#back-button').on('click', async (e) => {
                const controller =
                    e.target.parentElement.parentElement.parentElement.className;
                $('.controller').style = "display:none";
                barcodeScanner.dispose();
                barcodeScanner = undefined;
            })

            $("#camera-swap-button").on('click', async (e) => {
                barcodeScanner.swapCameraFacing(true);
            });

            $("#camera-switch-button").on('click' ,async (e) => {
                onCameraSwitch(barcodeScanner);
            });
        }

        async function onBarcodesDetected(e) {
            let text = "";
            const $ticketElement = $('#ticket_id');
                e.barcodes.forEach((barcode) => {
                    $ticketElement.val(barcode.text);
                    if ($codeTemp !== barcode.text) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "/admin/scanTicket/handle",
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                'code': barcode.text,
                            },
                            statusCode: {
                                200: (data) => {
                                    $('#theater').text(data.theater);
                                    $('#room').text(data.room);
                                    $('#seats').text(data.seats);
                                    $('#movie').text(data.movie);
                                    $('#date').text(data.date);
                                    $('#startTime').text(data.startTime);
                                    if (data.check) {
                                        $('#status').addClass('text-success').removeClass('text-danger').text(data.message);
                                    } else {
                                        $('#status').addClass('text-danger').removeClass('text-success').text(data.message);
                                    }
                                    $codeTemp = $ticketElement.val();
                                },
                                500: (data) => {
                                    $('#theater').text('');
                                    $('#room').text('');
                                    $('#movie').text('');
                                    $('#seats').text('');
                                    $('#date').text('');
                                    $('#startTime').text('');
                                    $('#status').addClass('text-warning').text(data.message);
                                    $codeTemp = $ticketElement.val();
                                }

                            }
                        });
                    }
            });

            let result;
            if (e.barcodes[0].barcodeImage) {
                result = await scanbotSDK.toDataUrl(e.barcodes[0].barcodeImage);
            }

            // Toastify({ text: text.slice(0, -1), duration: 10000, avatar: result }).showToast();
        }

        async function onCameraSwitch(scanner) {
            const cameras = await scanner?.fetchAvailableCameras()
            if (cameras) {
                const currentCameraInfo = scanner?.getActiveCameraInfo();
                if (currentCameraInfo) {
                    const cameraIndex = cameras.findIndex((cameraInfo) => { return cameraInfo.deviceId == currentCameraInfo.deviceId });
                    const newCameraIndex = (cameraIndex + 1) % (cameras.length);
                    alert(`Current camera: ${currentCameraInfo.label}.\nSwitching to: ${cameras[newCameraIndex].label}`)
                    scanner?.switchCamera(cameras[newCameraIndex].deviceId);
                }
            }
        }

        async function onScannerError(e) {
            console.log("Error:", e);
            alert(e.name + ': ' + e.message);
        }

        async function addAllPagesTo(generator) {
            for (let i = 0; i < results.length; i++) {
                const result = results[i];
                await generator.addPage(Utils.imageToDisplay(result));
            }
        }

        function resizeContent() {
            const height = document.body.offsetHeight - (50 + 59);
            const controllers = document.getElementsByClassName("controller");

            for (let i = 0; i < controllers.length; i++) {
                const controller = controllers[i];
                controller.style.height = height;
            }
        }


    </script>
@endsection
