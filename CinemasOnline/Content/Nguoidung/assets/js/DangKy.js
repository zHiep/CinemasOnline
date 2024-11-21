function togglePasswordVisibility(fieldId) {
    const passwordField = document.getElementById(fieldId);
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text'; // Hiển thị mật khẩu
    } else {
        passwordField.type = 'password'; // Ẩn mật khẩu
    }
}

document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn chặn việc submit form mặc định
        validateForm(form); // Gọi hàm validate
    });
});

// Phần validate form
function validateForm(form) {
    const isRegisterTab = document.getElementById('Register').style.display === 'block';

    const fullName = document.getElementById('fullname') ? document.getElementById('fullname').value : '';
    const email = isRegisterTab ? document.getElementById('email').value : '';
    const emailLogin = !isRegisterTab ? document.getElementById('login-email').value : '';
    const phone = isRegisterTab ? document.getElementById('phone').value : '';
    const password = isRegisterTab ? document.getElementById('password').value : '';
    const passwordLogin = !isRegisterTab ? document.getElementById('login-password').value : '';
    const confirmPassword = isRegisterTab ? document.getElementById('confirm-password').value : '';
    const dob = document.getElementById('dob') ? document.getElementById('dob').value : '';
    const gender = document.getElementById('gender') ? document.getElementById('gender').value : '';

    const nameRegex = /^[a-zA-ZÀ-ỹ\s]+$/;
    let hasError = false;

    // Xóa thông báo lỗi trước đó
    document.querySelectorAll('.error-message').forEach(error => error.style.display = 'none');

    if (isRegisterTab) {
        // Kiểm tra Họ và tên
        if (!nameRegex.test(fullName)) {
            document.getElementById('fullname-error').innerText = "Họ và tên không được chứa ký tự đặc biệt.";
            document.getElementById('fullname-error').style.display = 'block';
            hasError = true;
        }
    
        if (fullName.trim() === '') {
            document.getElementById('fullname-error').innerText = "Họ và tên là trường bắt buộc.";
            document.getElementById('fullname-error').style.display = 'block';
            hasError = true;
        }
    
        // Kiểm tra Email
        if (email.trim() === '') {
            document.getElementById('email-error').innerText = "Email là trường bắt buộc.";
            document.getElementById('email-error').style.display = 'block';
            hasError = true;
        }
    
        // Kiểm tra Số điện thoại
        if (phone.trim() === '' || !/^\d{10}$/.test(phone)) {
            document.getElementById('phone-error').innerText = "Số điện thoại phải là 10 chữ số.";
            document.getElementById('phone-error').style.display = 'block';
            hasError = true;
        }
    
        // Kiểm tra Mật khẩu
        if (password.trim() === '') {
            document.getElementById('password-error').innerText = "Mật khẩu là trường bắt buộc.";
            document.getElementById('password-error').style.display = 'block';
            hasError = true;
        }
    
        // Kiểm tra Xác nhận mật khẩu
        if (password !== confirmPassword) {
            document.getElementById('confirm-password-error').innerText = "Mật khẩu và xác nhận mật khẩu không khớp.";
            document.getElementById('confirm-password-error').style.display = 'block';
            hasError = true;
        }

        // Kiểm tra Ngày tháng năm sinh
        if (dob && dob.trim() === '') {
            document.getElementById('dob-error').innerText = "Ngày tháng năm sinh là trường bắt buộc.";
            document.getElementById('dob-error').style.display = 'block';
            hasError = true;
        }

        // Kiểm tra Giới tính
        if (gender && gender === '') {
            document.getElementById('gender-error').innerText = "Giới tính là trường bắt buộc.";
            document.getElementById('gender-error').style.display = 'block';
            hasError = true;
        }

    } else {
        // Kiểm tra Email Đăng Nhập
        if (emailLogin.trim() === '') {
            document.getElementById('login-email-error').innerText = "Email là trường bắt buộc.";
            document.getElementById('login-email-error').style.display = 'block';
            hasError = true;
        }

        // Kiểm tra Mật khẩu Đăng Nhập
        if (passwordLogin.trim() === '') {
            document.getElementById('login-password-error').innerText = "Mật khẩu là trường bắt buộc.";
            document.getElementById('login-password-error').style.display = 'block';
            hasError = true;
        }
    }

    // Nếu không có lỗi, cho phép nhập mã OTP
    if (!hasError) {
        document.getElementById('otpPopup').style.display = 'flex';
    }
}

function openTab(evt, tabName) {
    // Ẩn tất cả các tab content
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";  
    }

    // Xóa active class từ tất cả các tab links
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Hiển thị tab được chọn và thêm class active cho tab link
    document.getElementById(tabName).style.display = "block";  
    evt.currentTarget.className += " active";
}

// OTP
document.addEventListener("DOMContentLoaded", function() {

    function handleOTPInput() {
        const otpInputs = document.querySelectorAll('#otp > .otp-input');

        otpInputs.forEach((input, i) => {
            input.addEventListener('keydown', (event) => {
                const isBackspace = event.key === "Backspace";
                const isNumber = /^[0-9]$/.test(event.key);
                const isLetter = /^[A-Za-z]$/.test(event.key);
                
                // Xử lý Backspace: chỉ xóa nếu ô hiện tại có giá trị
                if (isBackspace) {
                    if (input.value === '' && i > 0) {
                        otpInputs[i - 1].focus();
                    } else {
                        input.value = '';
                    }
                } 
                
                // Xử lý khi nhập số hoặc chữ cái
                else if (isNumber || isLetter) {
                    input.value = event.key;
                    if (i < otpInputs.length - 1) otpInputs[i + 1].focus();
                    event.preventDefault();
                }
            });
        });
    }

    handleOTPInput();
});


// Đóng popup khi nhấn vào nút đóng
document.getElementById('closeOtpPopup').addEventListener('click', function() {
    document.getElementById('otpPopup').style.display = 'none';
});

