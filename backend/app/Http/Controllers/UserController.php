<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {
        // показывает всех студентов
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        // страница с регистрацией для студента и преподавателя
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

    public function storeStudent(Request $request)
    {
        //return view('user.student');
        $user = new User();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->surname = $request->input('surname');
        $user->name = $request->input('name');
        $user->patronymic = $request->input('patronymic');
        $user->group = $request->input('group');
        $user->rule_id = 2; // По умолчанию rule_id равен 2
        $user->save();

        return redirect()->route('user.index');
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

        return redirect()->route('post.index');
    }



    public function LKStudent($id) {

        $user = User::find($id); // Получаем id студента
        return view('user.students.index', compact('user')); // Передаем данные поста на страницу редактирования
    }
    public function editStudent($id) {

        $user = User::find($id);
        return view('user.students.edit', compact('user')); // Передаем данные поста на страницу редактирования
    }
    public function editTeacher($id) {

        $user = User::find($id); // Получаем id студента
        return view('user.students.index', compact('user')); // Передаем данные поста на страницу редактирования
    }
    public function updateStudent(Request $request, $id) {
        // изменение записи
        // со страницы edit на контроллер отправляется id поста и его данные
        // записываем все данные и переходим на главную страницу
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
}
