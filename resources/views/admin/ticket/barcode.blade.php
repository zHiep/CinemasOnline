<div class="modal fade modal-md" id="barcode{!! $value['id'] !!}" tabindex="-1" aria-labelledby="barcode_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="barcode_title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-12">
                                    <div class="flex-column d-flex justify-content-center text-center">
                                        <div>
                                            <img style="width: 200px" alt="QR code" src="data:image/png;base64,{{ DNS2D::getBarcodePNG($value->code.'', 'QRCODE') }}"/>
                                        </div>
                                        <div class="mt-2">
                                            {!! $value['code'] !!}
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

