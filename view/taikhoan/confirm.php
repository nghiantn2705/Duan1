
<div class='container mt-4 mb-3'>
             <div class='tab-content container d-flex justify-content-center'>
                <div class='tab-pane form-users' id='pills-login' role='tabpanel' aria-labelledby='tab-login'>
                    <form action="index.php?act=confirm" method='POST'>
                        <div class='text-center mb-3'>
                        <h1 class=''>Quên Mật Khẩu</h1>
                        </div>
                        <div class='form-outline mb-4'>
                        <label class='form-label' for='loginName'>Nhập code đã gửi đến email</label>
                        <input type='text' id='loginName' name="code" class='form-control'  placeholder="Code" />
                        </div>
                        <div class=''>
                        <button type='submit' class='btn btn-primary btn-block mb-4' name="xacnhan">Gửi </button>
                        </div>
                        <div class='text-center'>
                        <p>Bạn chưa có tài khoản? <a href='index.php?act=dangky'>Đăng ký</a></p>
                        <button type='button' class='btn btn-link btn-floating mx-1'>
                        <i class='fab fa-facebook-f'></i>
                        </button>
                        <button type='button' class='btn btn-link btn-floating mx-1'>
                            <i class='fab fa-google'></i>
                        </button>
                        <button type='button' class='btn btn-link btn-floating mx-1'>
                            <i class='fab fa-twitter'></i>
                        </button>
                        <button type='button' class='btn btn-link btn-floating mx-1'>
                            <i class='fab fa-github'></i>
                        </button>
                        </div>
                    </form>
                </div>
            </div>
</div>