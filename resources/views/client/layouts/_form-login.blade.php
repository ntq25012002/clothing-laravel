<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-headers">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ti-close"></span>
                </button>
            </div>

            <div class="modal-body p-5">
                <div class="text-center mb-4">
                    <h2 class="m-0 ft-regular">Đăng nhập</h2>
                </div>
                <form action="{{ route('client-login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email*">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu*">
                    </div>
                    {{-- <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="flex-1">
                                <input id="dd" class="checkbox-custom" name="dd" type="checkbox">
                                <label for="dd" class="checkbox-custom-label">Remember Me</label>
                            </div>
                            <div class="eltio_k2">
                                <a href="#">Lost Your Password?</a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Đăng nhập</button>
                    </div>

                    <div class="form-group text-center mb-0">
                        <p class="extra">Chưa có tài khoản?<a href="#et-register-wrap" class="text-dark"> Đăng ký</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
