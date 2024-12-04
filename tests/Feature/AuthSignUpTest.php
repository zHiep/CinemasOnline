<?php

namespace Tests\Feature;

use App\Models\Info;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthSignUpTest extends TestCase
{   
    /**
     * Test đăng ký thành công với email
     *
     * @return void
     */
    // public function testSignUpWithEmailSuccess()
    // {   
    //     $data = [
    //         'fullName' => 'John Doe',
    //         'email' => 'john.doe11@gmail.com',
    //         'phone' => '0973645255',
    //         'password' => 'Test12345',
    //         'repassword' => 'Test12345',
    //     ];
    //     $response = $this->post('/signUp', $data);

    //     // Kiểm tra phản hồi từ server
    //     $response->assertSessionHas('success', 'Đăng ký thành công, vui lòng kiểm tra email để kích hoạt tài khoản !');
    // }
    public function testChangePasswordSuccessfully()
{
    // Tạo người dùng mẫu
    $user = User::factory()->create();

    // Đăng nhập người dùng
    $this->actingAs($user);
    dd(Auth::check());
    // Gửi yêu cầu thay đổi mật khẩu
    $response = $this->post('/changePassword', [
        'oldpassword' => 'Test12345',
        'password' => 'NewPassword1', // Mật khẩu mới hợp lệ
        'repassword' => 'NewPassword1',
    ]);
    // Kiểm tra người dùng được chuyển hướng đến trang signOut và thông báo thành công
    $response->assertSessionHas('success', 'Cập nhật mật khẩu thành công');

    // Kiểm tra mật khẩu đã thay đổi
    $user->refresh();
    $this->assertTrue(Hash::check('NewPassword1', $user->password));
}
}
