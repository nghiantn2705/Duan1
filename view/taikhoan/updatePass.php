<div class='container mt-4 mb-3'>
             <div class='tab-content container d-flex justify-content-center'>
                <div class='tab-pane form-users' id='pills-login' role='tabpanel' aria-labelledby='tab-login'>
                    <form action="index.php?act=updatePass" method='POST'>
                        <div class='text-center mb-3'>
                        <h1 class=''>Đăng nhập</h1>
                        </div>
                        <div class='form-outline mb-4'>
                        <label class='form-label' for='loginName'>Nhập mật khẩu mới</label>
                        <input  type="password" name="passnew" required class='form-control' />
                        </div>
                        <div class='form-outline mb-4'>
                        <label class='form-label' for='loginPassword'>Xác nhận lại mật khẩu</label>
                        <input type="password" name="re-passnew" required  class='form-control' />
                        </div>
                        <div class='text-center'>
                        <button type='submit' class='btn btn-primary btn-block mb-4' name="done">Xác nhận</button>
                        </div>
                        <div class='text-center'>
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