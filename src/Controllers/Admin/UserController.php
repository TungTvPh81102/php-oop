<?php

namespace Hi\PhpOop\Controllers\Admin;

use Exception;
use Hi\PhpOop\Commons\Controller;
use Hi\PhpOop\Commons\Helper;
use Hi\PhpOop\Models\User;
use Rakit\Validation\Validator;

class UserController extends Controller
{
    private User $users;

    public function __construct()
    {
        $this->users = new User();
    }

    public function index()
    {
        $title = 'List Users';

        $users = $this->users->getAll();

        return $this->viewAdmin('users.index', compact('title', 'users'));
    }

    public function create()
    {
        $title = 'Create User';
        return $this->viewAdmin('users.create', compact('title'));
    }

    public function store()
    {
        try {
            if (!empty($_POST)) {

                $validator = new Validator();

                $validation = $validator->make($_POST + $_FILES, [
                    'name' => 'required|max:50',
                    'email' => 'required|email',
                    'password' => 'required|min:6',
                    'avatar' => 'uploaded_file:0,2048K,png,jpg,jpeg',
                    'type' => 'required|in:admin,member',
                    'status' => 'required|in:0,1',
                ]);

                $validation->validate();

                if ($validation->fails()) {
                    $_SESSION['data'] = $_POST;
                    $_SESSION['errors'] = $validation->errors()->firstOfAll();
                    redirect('admin/users/create');
                    die();
                }

                $data = [
                    'name' => $_POST['name'] ?? null,
                    'email' => $_POST['email'] ?? null,
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'type' => $_POST['type'] ?? null,
                    'status' => $_POST['status'] ?? null,
                ];

                if (
                    is_array($_FILES['avatar'])
                    && $_FILES['avatar']['size'] >  0
                ) {
                    $from = $_FILES['avatar']['tmp_name'];
                    $to = 'public/assets/uploads/users/' . time() . '_' . $_FILES['avatar']['name'];

                    if (move_uploaded_file($from, PATH_ROOT . $to)) {
                        $data['avatar'] = $to;
                    } else {
                        throw new Exception('Upload ảnh thất bại, vui lòng thử lại');
                    }
                }

                if ($data) {
                    $this->users->insert($data);
                    $_SESSION['status'] = true;
                    $_SESSION['msg'] = 'Thao tác thành công';
                    redirect('admin/users');
                }
            }
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect('admin/users/create');
            exit();
        }
    }

    public function show($id)
    {
        try {
            $title = 'User Details';
            $user = $this->users->findById($id);

            if (empty($user)) {
                throw new Exception('Không tìm thấy người dùng');
            }

            return $this->viewAdmin('users.show', compact('title', 'user'));
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect('admin/users');
            exit();
        }
    }

    public function edit($id)
    {
        try {
            $title = 'Update User';
            $user = $this->users->findById($id);

            if (empty($user)) {
                throw new Exception('Không tìm thấy người dùng');
            }

            return $this->viewAdmin('users.edit', compact('title', 'user'));
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect('admin/users');
            exit();
        }
    }

    public function update($id)
    {
        try {
            $user = $this->users->findById($id);

            if (empty($user)) {
                throw new Exception('Không tìm thấy người dùng');
            }

            if (!empty($_POST)) {
                $validator = new Validator();

                $validation = $validator->make($_POST + $_FILES, [
                    'name' => 'required|max:50',
                    'email' => 'required|email',
                    'password' => 'min:6',
                    'avatar' => 'uploaded_file:0,2048K,png,jpg,jpeg',
                    'type' => 'required|in:admin,member',
                    'status' => 'required|in:0,1',
                ]);

                $validation->validate();

                if ($validation->fails()) {
                    $_SESSION['data'] = $_POST;
                    $_SESSION['errors'] = $validation->errors()->firstOfAll();
                    redirect("admin/users/{$user['id']}/edit");

                    die();
                }

                $data = [
                    'name' => $_POST['name'] ?? $user['name'],
                    'email' => $_POST['email'] ?? $user['email'],
                    'password' => $_POST['password'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'],
                    'type' => $_POST['type'] ?? $user['type'],
                    'status' => $_POST['status'] ?? $user['status'],
                ];

                $flagUpload = false;
                if (
                    is_array($_FILES['avatar'])
                    && $_FILES['avatar']['size'] >  0
                ) {
                    $flagUpload = true;

                    $from = $_FILES['avatar']['tmp_name'];
                    $to = 'public/assets/uploads/users/' . time() . '_' . $_FILES['avatar']['name'];

                    if (move_uploaded_file($from, PATH_ROOT . $to)) {
                        $data['avatar'] = $to;
                    } else {
                        throw new Exception('Upload ảnh thất bại, vui lòng thử lại');
                    }
                } else {
                    $data['avatar'] = $user['avatar'];
                }

                if ($data) {
                    $this->users->update($id, $data);

                    if ($flagUpload && $user['avatar'] && file_exists($user['avatar'])) {
                        unlink(PATH_ROOT . $user['avatar']);
                    }

                    $_SESSION['status'] = true;
                    $_SESSION['msg'] = 'Thao tác thành công';
                    redirect("admin/users/{$user['id']}/edit");
                    exit();
                }
            }
        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect("admin/users/{$user['id']}/edit");
        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->users->findById($id);

            if (empty($user)) {
                throw new Exception('Không tìm thấy người dùng');
            }

            $this->users->destroy($id);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';
            redirect('admin/users');
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect('admin/users');
            exit();
        }
    }
}
