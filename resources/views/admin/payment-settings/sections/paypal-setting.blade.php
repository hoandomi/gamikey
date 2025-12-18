<div class="tab-pane paypal-info show active" id="paypal-info" role="tabpanel">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body add-products p-0">
                    <form action="{{ route('admin.paypay-setting.update', 1) }}" method="POST">
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
                                                        <option {{ @$paypalSetting->status == 0 ? 'selected' : '' }}
                                                            value="0">Ẩn</option>
                                                        <option {{ @$paypalSetting->status == 1 ? 'selected' : '' }}
                                                            value="1">Hiện</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="product-tags" class="form-label">Trạng Thái Tài
                                                        Khoản</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="mode">
                                                        <option selected="">Chọn Trạng Thái</option>
                                                        <option {{ @$paypalSetting->mode == 0 ? 'selected' : '' }}
                                                            value="0">Sandbox</option>
                                                        <option {{ @$paypalSetting->mode == 1 ? 'selected' : '' }}
                                                            value="1">Live</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="paypalClientId" class="form-label">Tỷ Giá Chuyển Đổi
                                                        (VND -> USD)</label>
                                                    <input type="text" class="form-control" id="currency_rate"
                                                        placeholder="VD: 24000 = 1 USD" name="currency_rate"
                                                        value="{{ @$paypalSetting->currency_rate }}">
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="paypalClientId" class="form-label">PayPal Client
                                                        ID</label>
                                                    <input type="text" class="form-control" id="paypalClientId"
                                                        placeholder="PayPal Client ID" name="paypalClientId"
                                                        value="{{ @$paypalSetting->client_id }}">
                                                </div>

                                                <div class="col-xl-12">
                                                    <label for="paypalSecretKey" class="form-label">PayPal Secret
                                                        Key</label>
                                                    <input type="text" class="form-control" id="paypalSecretKey"
                                                        placeholder="PayPal Secret Key" name="paypalSecretKey"
                                                        value="{{ @$paypalSetting->client_secret }}">
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
