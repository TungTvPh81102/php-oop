<?php

namespace Hi\PhpOop\Controllers\Admin;

use Exception;
use Hi\PhpOop\Commons\Controller;
use Hi\PhpOop\Commons\Helper;
use Hi\PhpOop\Models\Category;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{
    private Category $categories;

    public function __construct()
    {
        $this->categories = new Category();
    }

    public function index()
    {
        $title = 'List Categories';

        $categories = $this->categories->getAll();

        $this->viewAdmin('categories.index', [
            'title' => $title,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $title = 'Create Category';
        $this->viewAdmin('categories.create', ['title' => $title]);
    }

    public function store()
    {
        try {
            $validator = new Validator();

            $validation = $validator->make($_POST, [
                'name' => 'required|min:3|max:100|regex:/^[\p{L} ]+$/u',
                'status' => 'required|in:draft,publish',
            ]);

            $validation->validate();

            if ($validation->fails()) {

                $_SESSION['data'] = $_POST;

                $_SESSION['errors'] = $validation->errors()->firstOfAll();

                throw new Exception('Có lỗi xảy ra vui lòng thử lại');
            } else {

                $data = [
                    'name' => $_POST['name'] ?? null,
                    'status' => $_POST['status'] ?? null,
                ];

                if ($data) {

                    $this->categories->insert($data);
                    $_SESSION['status'] = true;
                    $_SESSION['msg'] = 'Thao tác thành công';
                    redirect('admin/categories');
                    exit();
                }
            }
        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect('admin/categories/create');
        }
    }

    public function show($id)
    {
        try {

            $title = 'Category Details';

            $category = $this->categories->findById($id);

            if (empty($category)) {
                throw new Exception('Không tìm thấy danh mục');
            }

            $this->viewAdmin('categories.show', compact('title', 'category'));
        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();

            redirect('admin/categories');
            die;
        }
    }

    public function edit($id)
    {
        try {
            $title = 'Update Category';

            $category = $this->categories->findById($id);

            if (empty($category)) {
                throw new Exception('Không tìm thấy danh mục');
            }

            $this->viewAdmin('categories.edit', compact('title', 'category'));
        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();

            redirect('admin/categories');
            die;
        }
    }

    public function update($id)
    {
        try {
            $category = $this->categories->findById($id);

            if (empty($category)) {
                throw new Exception('Không tìm thấy danh mục');
            }

            $validator = new Validator();

            $validation = $validator->make($_POST, [
                'name' => 'required|min:3|max:100|regex:/^[\p{L} ]+$/u',
                'status' => 'required|in:draft,publish',
            ]);

            $validation->validate();

            if ($validation->fails()) {

                $_SESSION['errors'] = $validation->errors()->firstOfAll();
                throw new Exception('Có lỗi xảy ra, vui lòng thử lại');
            } else {

                $data = [
                    'name' => $_POST['name'] ?? $category['name'],
                    'status' => $_POST['status'] ?? $category['status'],
                ];

                if ($data) {

                    $this->categories->update($id, $data);
                    $_SESSION['status'] = true;
                    $_SESSION['msg'] = 'Thao tác thành công';
                    redirect("admin/categories/{$category['id']}/edit");
                    exit();
                }
            }
        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect("admin/categories/{$category['id']}/edit");
        }
    }

    public function destroy($id)
    {
        try {
            $category = $this->categories->findById($id);

            if (!empty($category)) {
                $this->categories->destroy($id);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';
            redirect('admin/categories');
        } catch (\Throwable $th) {

            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect('admin/categories');
        }
    }
}
