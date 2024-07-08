<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.register');
    }


    public function store(Request $request)
    {
        dump($request->all());
        if ($request->role == 'student') {
            dump($request->all());
            //$student = $request->all();
            //return view('user.student');
        } elseif ($request->role == 'teacher') {
            dump($request->all());
            //$teacher = $request->all();
            //return view('user.student');
        }


    }
    // STUDENT
    public function viewStudent() {
        return view('user.students.create');
    }

    public function storeStudent(Request $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->surname = $request->input('surname');
        $user->name = $request->input('name');
        $user->patronymic = $request->input('patronymic');
        $user->group = $request->input('group');
        $user->rule_id = 2; // По умолчанию rule_id равен 2
        $user->save();

        Auth::login($user);

        return redirect()->route('user.index');
    }

    public function LKStudent($id) {

        $user = User::find($id); // Получаем id студента
        return view('user.students.index', compact('user')); // Передаем данные поста на страницу редактирования
    }
    public function editStudent($id) {

        $user = User::find($id);
        return view('user.students.edit', compact('user')); // Передаем данные поста на страницу редактирования
    }

    public function updateStudent(Request $request, $id) {
        $user             = User::find($id);
        $user->email      = $request->input('email');
        $user->password   = bcrypt($request->input('password'));
        $user->surname    = $request->input('surname');
        $user->name       = $request->input('name');
        $user->patronymic = $request->input('patronymic');
        $user->group      = $request->input('group');
        $user->phone      = $request->input('phone');
        $user->work_phone = $request->input('work_phone');
        $user->telegram   = $request->input('telegram');
        $user->vk         = $request->input('vk');
        $user->about      = $request->input('about');
        $user->skills_id  = $request->input('skills_id');
        //$user->rule_id       = 1; // По умолчанию rule_id равен 2
        $user->save();
        return redirect()->route('student.lk', $user);
    }
    public function makeAdmin(User $user)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->back()->with('error', 'У вас нет прав для выполнения этого действия');
        }

        $user->is_admin = 1;
        $user->save();

        return redirect()->back()->with('success', 'Пользователь успешно назначен администратором');
    }

    public function destroyAdmin(User $user)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->back()->with('error', 'У вас нет прав для выполнения этого действия');
        }

        $user->is_admin = 0;
        $user->save();

        return redirect()->back()->with('success', 'Пользователь успешно назначен администратором');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Пользователь успешно удален');
    }
    // API
    public function APIindex() {
        $users = User::all();
        if (!$users) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return response()->json($users, 200);
    }

    public function APIshow($id) {
        $users = User::find($id);
        if (!$users) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return response()->json($users, 200);
    }
    public function APIstoreStudent(Request $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->surname = $request->input('surname');
        $user->name = $request->input('name');
        $user->patronymic = $request->input('patronymic');
        $user->group = $request->input('group');
        $user->rule_id = 2; // По умолчанию rule_id равен 2
        $user->save();
        return response()->json(['message' => 'Data saved successfully'], 200);

    }

    public function APIupdateStudent(Request $request, $id) {
        $user             = User::find($id);
        $user->email      = $request->input('email');
        $user->password   = bcrypt($request->input('password'));
        $user->surname    = $request->input('surname');
        $user->name       = $request->input('name');
        $user->patronymic = $request->input('patronymic');
        $user->group      = $request->input('group');
        $user->phone      = $request->input('phone');
        $user->work_phone = $request->input('work_phone');
        $user->telegram   = $request->input('telegram');
        $user->vk         = $request->input('vk');
        $user->about      = $request->input('about');
        $user->skills_id  = $request->input('skills_id');
        $user->save();
        return redirect()->route('student.lk', $user);
    }

    public function viewTeacher() {
        return view('user.teachers.create');
    }
    public function storeTeacher(Request $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->surname = $request->input('surname');
        $user->name = $request->input('name');
        $user->patronymic = $request->input('patronymic');
        $user->department = $request->input('department');
        $user->position = $request->input('position');
        $user->rule_id = 1; // По умолчанию rule_id равен 2
        $user->save();
        Auth::login($user);
        return redirect()->route('user.index');
    }
    public function LKTeacher($id) {

        $user = User::find($id);
        return view('user.teachers.index', compact('user'));
    }

    public function editTeacher($id) {

        $user = User::find($id);
        return view('user.teachers.index', compact('user'));
    }


    public function updateTeacher(Request $request, $id) {
        $user             = User::find($id);
        $user->email      = $request->input('email');
        $user->password   = bcrypt($request->input('password'));
        $user->surname    = $request->input('surname');
        $user->name       = $request->input('name');
        $user->patronymic = $request->input('patronymic');
        $user->department = $request->input('department');
        $user->position   = $request->input('position');
        $user->phone      = $request->input('phone');
        $user->work_phone = $request->input('work_phone');
        $user->telegram   = $request->input('telegram');
        $user->vk         = $request->input('vk');
        $user->about      = $request->input('about');
        $user->skills_id  = $request->input('skills_id');
        $user->save();
        return response()->json(['message' => 'Data saved successfully'], 200);
    }
    // API


    public function APIstoreTeacher(Request $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->surname = $request->input('surname');
        $user->name = $request->input('name');
        $user->patronymic = $request->input('patronymic');
        $user->department = $request->input('department');
        $user->position = $request->input('position');
        $user->rule_id = 1; // По умолчанию rule_id равен 2
        $user->save();
        return response()->json(['message' => 'Data saved successfully'], 200);

    }

    public function APIupdateTeacher(Request $request, $id) {
        $user             = User::find($id);
        $user->email      = $request->input('email');
        $user->password   = bcrypt($request->input('password'));
        $user->surname    = $request->input('surname');
        $user->name       = $request->input('name');
        $user->patronymic = $request->input('patronymic');
        $user->department = $request->input('department');
        $user->position   = $request->input('position');
        $user->phone      = $request->input('phone');
        $user->work_phone = $request->input('work_phone');
        $user->telegram   = $request->input('telegram');
        $user->vk         = $request->input('vk');
        $user->about      = $request->input('about');
        $user->skills_id  = $request->input('skills_id');
        $user->save();
        return response()->json(['message' => 'Data saved successfully'], 200);
    }

    // Авторизация

    public function loginForm() {
        return view('user.login');
    }
    public function login(Request $request) {
        if (
            Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password,
                ]
            )
        ) {
            return redirect()->route('post.index');
        }
        return redirect()->back();

    }
    public function logout() {
        Auth::logout();
        return redirect()->route('login.create');
    }

    public function APIlogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'ввели неверные данные'], 401);
        }
        $user = auth('api')->user();
        $userData = [
            'id' => $user->id,
            'email' => $user->email,
            'surname' => $user->surname,
            'name' => $user->name,
            'patronymic' => $user->patronymic,
            'department' => $user->department,
            'position'=> $user->position,
            'phone' => $user->phone,
            'work_phone' => $user->work_phone,
            'telegram' => $user->telegram,
            'vk' => $user->vk,
            'rule_id' => $user->rule_id,
        ];
        $token = auth('api')->claims(['user' => $userData])->attempt($credentials);
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    public function __construct (){
        //$this->middleware('auth:api')->except('APIlogin');
    }
    public function APIUser(Request $request) {
        return response()->json($request->user());
    }
    public function APILogout() {
        auth('api')->logout();
        return response()->json(['msg' => 'вы вышли']);
    }
    public function APIRefresh() {
        return $this->respondWithToken(auth('api')->refresh());
    }
}

