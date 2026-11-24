<?php




namespace App\Http\Controllers;




use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;




class UserController extends Controller
{
    public function index()
    {
         if (!Auth::check()) {
             return redirect()
                ->route('login')
                ->withErrors('Silakan login terlebih dahulu.');
        }            
        $data['dataUser'] = User::paginate(10)->onEachSide(1);
        return view('admin.user.index', $data);
    }




    public function create()
    {
        return view('admin.user.create');
    }




    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:Super Admin,Pelanggan,Mitra',
        ]);




        $data['password'] = Hash::make($request->password);
        User::create($data);




        return redirect()->route('user.index')->with('success', 'Penambahan data user berhasil!');
    }




    public function show(string $id)
    {
        // Tidak digunakan pada praktikum ini.
    }




    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
    }




    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);




        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'role' => 'required|in:Super Admin,Pelanggan,Mitra',
            'password' => 'nullable|min:8|confirmed'
        ]);




        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }




        $user->update($data);




        return redirect()->route('user.index')->with('success', 'Perubahan data user berhasil!');
    }




    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();




        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus!');
    }
}