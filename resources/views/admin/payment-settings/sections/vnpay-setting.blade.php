<div class="tab-pane vnpay-info show" id="vnpay-info" role="tabpanel">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body add-products p-0">
                    <form action="{{ route('admin.vnpay-setting.update', 1) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="p-4">
                            <div class="row gx-5">
                                <div class="col-12">
                                    <div class="card custom-card shadow-none mb-0 border-0">
                                        <div class="card-body p-0">
                                            <div class="row gy-3">
                                                <div class="col-xl-12">
                                                    <label for="product-tags" class="form-label">Trạng Thái</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="status">
                                                        <option selected="">Chọn Trạng Thái</option>
                                                        <option {{ @$vnpaySetting->status == 0 ? 'selected' : '' }}
                                                            value="0">Ẩn</option>
                                                        <option {{ @$vnpaySetting->status == 1 ? 'selected' : '' }}
                                                            value="1">Hiện</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="product-tags" class="form-label">Trạng Thái Tài
                                                        Khoản</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="mode">
                                                        <option selected="">Chọn Trạng Thái</option>
                                                        <option {{ @$vnpaySetting->mode == 0 ? 'selected' : '' }}
                                                            value="0">Sandbox</option>
                                                        <option {{ @$vnpaySetting->mode == 1 ? 'selected' : '' }}
                                                            value="1">Live</option>
                                                    </select>
                                                </div>

                                                <div class="col-xl-12">
                                                    <label for="vnpayterminalid" class="form-label">Terminal ID / Mã
                                                        Website</label>
                                                    <input type="text" class="form-control" id="vnpayterminalid"
                                                        placeholder="Mã Website" name="vnpayterminalid"
                                                        value="{{ @$vnpaySetting->terminal_id }}">
                                                </div>

                                                <div class="col-xl-12">
                                                    <label for="vnpay_hashSecret" class="form-label">Secret Key / Chuỗi
                                                        bí mật tạo checksum</label>
                                                    <input type="text" class="form-control" id="vnpay_hashSecret"
                                                        placeholder="Secret Key" name="vnpay_hashSecret"
                                                        value="{{ @$vnpaySetting->secret_key }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                            <button type="submit"
                                class="btn btn-primary-gradient btn-wave waves-effect waves-light m-1">Lưu Thay Đổi
                                &nbsp; <i class="fas fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
