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

class AuthSignInTest extends TestCase
{
    /**
     * Test đăng nhập thành công bằng email.
     */
    public function test_sign_in_with_email_success()
    {
        // Tạo user giả lập
        $user = User::factory()->create([
            'email_verified' => 1, // Email đã được xác minh
        ]);

        // Gửi request POST tới route đăng nhập
        $response = $this->post('/signin', [
            'username' => $user->email,
            'password' => 'Test12345',
        ]);
        // Kiểm tra người dùng đã được xác thực
        $this->assertTrue(Auth::check());
        $this->assertEquals(Auth::user()->id, $user->id);

        // Kiểm tra phản hồi trả về
        $response->assertSessionHas('success', 'Chào mừng bạn ' . $user->fullName . '!');
    }

    public function test_sign_in_with_phone_success()
    {
        // Tạo user giả lập
        $user = User::factory()->create([
            'email_verified' => 1, // Email đã được xác minh
        ]);

        // Gửi request POST tới route đăng nhập
        $response = $this->post('/signin', [
            'username' => $user->phone,
            'password' => 'Test12345',
        ]);
        // Kiểm tra người dùng đã được xác thực
        $this->assertTrue(Auth::check());
        $this->assertEquals(Auth::user()->id, $user->id);

        // Kiểm tra phản hồi trả về
        $response->assertSessionHas('success', 'Chào mừng bạn ' . $user->fullName . '!');
    }

    /**
     * Test đăng nhập thất bại khi sai mật khẩu.
     */
    public function test_sign_in_with_invalid_password()
    {
        $user = User::factory()->create([
            'email_verified' => 1,
        ]);

        // Gửi request POST với mật khẩu sai
        $response = $this->post('/signin', [
            'username' => $user->email,
            'password' => 'wrongpassword',
        ]);

        // Kiểm tra Auth không đăng nhập
        $this->assertFalse(Auth::check());

        // Kiểm tra phản hồi trả về
        $response->assertSessionHas('warning', 'Sai tài khoản hoặc mật khẩu');
    }

    /**
     * Test đăng nhập thất bại khi email chưa được xác minh.
     */
    public function test_sign_in_with_unverified_email()
    {
        $user = User::factory()->create([
            'email_verified' => 0, // Email chưa được xác minh
        ]);

        // Gửi request POST tới route đăng nhập
        $response = $this->post('/signin', [
            'username' => $user->email,
            'password' => 'Test12345',
        ]);

        // Kiểm tra Auth không đăng nhập
        $this->assertFalse(Auth::check());
        // Kiểm tra phản hồi trả về
        $response->assertSessionHas('warning', 'Tài khoản chưa được kích hoạt! Vui lòng click vào đường dẫn được gửi đến email của bạn!');
    }
}
