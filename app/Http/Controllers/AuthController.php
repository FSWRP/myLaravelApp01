<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }
 
    public function registerPost(Request $request)
{
    $request->validate([
        'username' => 'required|unique:users',
        'name' => 'required|string|max:255',
        'password' => 'required|min:6',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->role = $request->role; // เพิ่มบรรทัดนี้เพื่อกำหนด role
    $user->save();

    return back()->with('success', 'สมัครสมาชิกสำเร็จ!');
}
 
    public function login()
    {
        return view('login');
    }
 
    public function loginPost(Request $request)
{
    $credentials = [
        'username' => $request->username,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user) {
            // ตรวจสอบ role ของผู้ใช้ และเปลี่ยนเส้นทางไปยังหน้าที่เหมาะสม
            switch ($user->role) {
                case 'แอดมิน':
                    return redirect('/home')->with('success', 'Login Success');
                case 'พนักงานคลังอะไหล่':
                    return redirect('/homep')->with('success', 'Login Success');
                case 'เจ้าของอู่':
                    return redirect('/hame')->with('success', 'Login Success');
                default:
                    // จัดการกับกรณีที่ role ไม่ตรงกับที่คาดหวัง
                    return back()->with('error', 'Unauthorized role');
            }
        }
    }

    return back()->with('error', 'Error: Username or Password is incorrect');
}


 
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('login');
    }
}