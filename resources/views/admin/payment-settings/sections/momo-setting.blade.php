<div class="tab-pane momo-info show" id="momo-info" role="tabpanel">
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body add-products p-0">
                    <form action="{{ route('admin.momo-setting.update', 1) }}" method="POST">
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
                                                        <option {{ @$momoSetting->status == 0 ? 'selected' : '' }}
                                                            value="0">Ẩn</option>
                                                        <option {{ @$momoSetting->status == 1 ? 'selected' : '' }}
                                                            value="1">Hiện</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="product-tags" class="form-label">Trạng Thái Tài
                                                        Khoản</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="mode">
                                                        <option selected="">Chọn Trạng Thái</option>
                                                        <option {{ @$momoSetting->mode == 0 ? 'selected' : '' }}
                                                            value="0">Sandbox</option>
                                                        <option {{ @$momoSetting->mode == 1 ? 'selected' : '' }}
                                                            value="1">Live</option>
                                                    </select>
                                                </div>

                                                <div class="col-xl-12">
                                                    <label for="partner_code" class="form-label">partner_code / Mã
                                                        Đối Tác</label>
                                                    <input type="text" class="form-control" id="partner_code"
                                                        placeholder="Mã Đối Tác" name="partner_code"
                                                        value="{{ @$momoSetting->partner_code }}">
                                                </div>

                                                <div class="col-xl-12">
                                                    <label for="access_key" class="form-label">Access Key / Khóa truy cập</label>
                                                    <input type="text" class="form-control" id="access_key"
                                                        placeholder="Secret Key" name="access_key"
                                                        value="{{ @$momoSetting->access_key }}">
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="secret_key" class="form-label">Secret Key / Mã Bí Mật</label>
                                                    <input type="text" class="form-control" id="secret_key"
                                                        placeholder="Secret Key" name="secret_key"
                                                        value="{{ @$momoSetting->secret_key }}">
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
