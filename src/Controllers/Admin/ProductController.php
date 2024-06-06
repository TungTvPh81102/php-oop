<?php

namespace Hi\PhpOop\Controllers\Admin;

use Carbon\Traits\Timestamp;
use Exception;
use Hi\PhpOop\Commons\Controller;
use Hi\PhpOop\Commons\Helper;
use Hi\PhpOop\Models\Category;
use Hi\PhpOop\Models\Product;
use Rakit\Validation\Validator;
use Hi\PhpOop\Models\Gallery;

class ProductController extends Controller
{
    private Product $product;
    private Category $category;

    private Gallery $gallery;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->gallery = new Gallery();
    }

    public function index()
    {
        $title = 'List Products';

        $products = $this->product->getAll();

        // Helper::dd($products);

        return $this->viewAdmin('products.index', compact('title', 'products'));
    }

    public function create()
    {
        $title = 'Create Products';

        $categories = $this->category->getAll();
        $categoriesPluck = array_column($categories, 'name', 'id');
        $categoriesPluck = array_map('strval', $categoriesPluck);

        return $this->viewAdmin('products.create', compact('title', 'categoriesPluck'));
    }

    public function store()
    {
        if (!empty($_POST)) {
            $validator = new Validator();

            $validation = $validator->validate($_POST + $_FILES, [
                'category_id' => 'required',
                'sku' => 'required|min:3|max:9|alpha_num',
                'name' => 'required|max:100',
                'price_regular' => 'required|numeric|min:1',
                'discount' => 'numeric',
                'thumbnail' => 'required|uploaded_file:0,2048K,png,jpg,jpeg,webp',
                'gallery.*' => 'required|uploaded_file:0,2048K,png,jpg,jpeg,webp',
                'description' => 'max:255',
                'content' => 'max:6500',
                'status' => 'required|in:draft,pending,publish',
            ]);

            $validation->validate();

            if ($validation->fails()) {
                $_SESSION['data'] = $_POST;
                $_SESSION['errors'] = $validation->errors()->firstOfAll();
                redirect('admin/products/create');
                exit();
            }

            $data = [
                'category_id' => $_POST['category_id'] ?? null,
                'sku' => $_POST['sku'] ?? null,
                'name' => $_POST['name'] ?? null,
                'price_regular' => $_POST['price_regular'] ?? null,
                'discount' => $_POST['discount'] ?? null,
                'thumbnail' => get_file_upload('thumbnail'),
                'description' => $_POST['description'] ?? null,
                'content' => $_POST['content'] ?? null,
                'status' => $_POST['status'] ?? null,
            ];

            try {
                $this->product->getConnection()->beginTransaction();

                if (is_array($data['thumbnail'])) {
                    $from = $_FILES['thumbnail']['tmp_name'];
                    $to = 'public/assets/uploads/products/' . time() . '_' . $_FILES['thumbnail']['name'];

                    if (move_uploaded_file($from, PATH_ROOT .  $to)) {
                        $data['thumbnail'] = $to;
                    } else {
                        $_SESSION['errors']['thumbnail'] = 'Upload ảnh không thành công';
                        redirect('admin/products/create');
                        exit();
                    }
                }

                $productID =  $this->product->insertGetLastId($data);

                if ($productID) {
                    $gallerys = get_file_upload('gallery');

                    if (is_array($gallerys['name'])) {

                        foreach ($gallerys['name'] as $key => $value) {

                            $to = 'public/assets/uploads/products/gallerys/'
                                . time() . '_' .
                                $_FILES['gallery']['name'][$key];

                            $file = [
                                'name' => $value,
                                'tmp_name' => $gallerys['tmp_name'][$key],
                            ];

                            if (move_uploaded_file($file['tmp_name'], PATH_ROOT . $to)) {
                                $galleryData = [
                                    'product_id' => $productID,
                                    'image' => $to
                                ];

                                $this->gallery->insert($galleryData);
                            } else {
                                $_SESSION['errors']['gallery'] = 'Upload ảnh không thành công';
                                redirect('admin/products/create');
                                exit();
                            }
                        }
                    }
                }

                $_SESSION['status'] = true;
                $_SESSION['msg'] = 'Thao tác thành công';
                redirect('admin/products');

                $this->product->getConnection()->commit();
            } catch (\Throwable $th) {
                $this->product->getConnection()->rollBack();
                $this->cleanupFiles($data);
                $_SESSION['status'] = false;
                $_SESSION['msg'] = $th->getMessage();
                redirect('admin/products/create');
                exit();
            }
        }
    }

    public function show($id)
    {
        try {

            $title = 'Product Details';
            $product = $this->product->findById($id);
            $gallerys = explode(',', $product['g_image']);

            // Helper::dd($product);
            if (empty($product)) {
                throw new Exception('Có lỗi xảy ra, vui lòng thử lại sau');
            }

            $this->viewAdmin('products.show', compact('title', 'product', 'gallerys'));
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect('admin/products');
            exit();
        }
    }

    public function edit($id)
    {
        try {
            $title = 'Update Product';
            $product = $this->product->findById($id);

            $categories = $this->category->getAll();
            $categoriesPluck = array_column($categories, 'name', 'id');
            // $categoriesPluck = array_map('strval', $categoriesPluck);

            $gallerys = explode(',', $product['g_image']);

            if (empty($product)) {
                throw new Exception('Có lỗi xảy ra, vui lòng thử lại sau');
            }

            $this->viewAdmin('products.edit', compact('title', 'product', 'gallerys', 'categoriesPluck'));
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect('admin/products');
            exit();
        }
    }

    public function update($id)
    {
        $product = $this->product->findById($id);

        if (empty($product)) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Không tìm sản phẩm';
            redirect('admin/products');
            exit();
        }

        try {
            $validator = new Validator();

            $validation = $validator->validate($_POST + $_FILES, [
                'category_id' => 'required',
                'sku' => 'required|min:3|max:9|alpha_num',
                'name' => 'required|max:100',
                'thumbnail' => 'uploaded_file:0,2048K,png,jpg,jpeg,webp',
                'gallery.*' => 'uploaded_file:0,2048K,png,jpg,jpeg,webp',
                'price_regular' => 'required|numeric|min:1',
                'discount' => 'numeric',
                'description' => 'max:255',
                'content' => 'max:6500',
                'status' => 'required|in:draft,pending,publish',
            ]);

            $validation->validate();

            if ($validation->fails()) {
                $_SESSION['data'] = $_POST;
                $_SESSION['errors'] = $validation->errors()->firstOfAll();
                redirect("admin/products/{$id}/edit");
                exit();
            }

            $data = [
                'category_id' => $_POST['category_id'] ?? $product['category_id'],
                'sku' => $_POST['sku'] ?? $product['sku'],
                'name' => $_POST['name'] ?? $product['name'],
                'price_regular' => $_POST['price_regular'] ?? $product['price_regular'],
                'discount' => $_POST['discount'] ?? $product['discount'],
                'thumbnail' => get_file_upload('thumbnail') ??  $product['thumbnail'],
                'description' => $_POST['description'] ?? $product['description'],
                'content' => $_POST['content'] ?? $product['content'],
                'is_trending' => $_POST['is_trending'] ?? $product['is_trending'],
                'status' => $_POST['status'] ?? $product['status'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            try {
                $this->product->getConnection()->beginTransaction();

                if (is_array($data['thumbnail'])) {
                    $from = $_FILES['thumbnail']['tmp_name'];
                    $to = 'public/assets/uploads/products/' . time() . '_' . $_FILES['thumbnail']['name'];

                    if (move_uploaded_file($from, PATH_ROOT .  $to)) {
                        $data['thumbnail'] = $to;
                        if (!empty($data['thumbnail']) && file_exists(PATH_ROOT . $product['thumbnail'])) {
                            unlink(PATH_ROOT . $product['thumbnail']);
                        }
                    } else {
                        $_SESSION['errors']['thumbnail'] = 'Upload ảnh không thành công';
                        redirect("admin/products/{$id}/edit");
                        exit();
                    }
                }

                $this->gallery->destroy($id);
                if (!empty($_FILES['gallery']['name'][0])) {
                    // Cleanup old gallery

                    foreach ($_FILES['gallery']['name'] as $key => $value) {
                        $to = 'public/assets/uploads/products/gallerys/' . time() . '_' . $_FILES['gallery']['name'][$key];

                        if (move_uploaded_file($_FILES['gallery']['tmp_name'][$key], PATH_ROOT . $to)) {
                            $galleryData = [
                                'product_id' => $id,
                                'image' => $to
                            ];

                            $this->gallery->insert($galleryData);
                        } else {
                            $_SESSION['errors']['gallery'] = 'Upload ảnh không thành công';
                            redirect("admin/products/{$id}/edit");
                            exit();
                        }
                    }

                    // Cleanup old gallery images
                    $oldGallery = explode(',', $product['g_image']);
                    foreach ($oldGallery as $file) {
                        if (!empty($file) && file_exists(PATH_ROOT . $file)) {
                            unlink(PATH_ROOT . $file);
                        }
                    }
                }
                // If no new gallery files, keep the old ones
                foreach (explode(',', $product['g_image']) as $oldImage) {
                    $galleryData = [
                        'product_id' => $product['id'],
                        'image' => $oldImage
                    ];
                    $this->gallery->insert($galleryData);
                }

                $this->product->update($id, $data);

                $_SESSION['status'] = true;
                $_SESSION['msg'] = 'Thao tác thành công';
                redirect("admin/products/{$id}/edit");
                $this->product->getConnection()->commit();
            } catch (\Throwable $th) {
                $this->product->getConnection()->rollBack();
                $this->cleanupFiles($data);
                $_SESSION['status'] = false;
                $_SESSION['msg'] = $th->getMessage();
                redirect("admin/products/{$id}/edit");

                exit();
            }
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect("admin/products/$id/edit");
            exit();
        }
    }
    public function destroy($id)
    {
        $product = $this->product->findById($id);

        if (empty($product)) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Không tìm sản phẩm';
            redirect('admin/products');
            exit();
        }

        try {
            $this->product->getConnection()->beginTransaction();

            $this->gallery->destroy($id);
            $this->product->destroy($id);

            $this->product->getConnection()->commit();
        } catch (\Throwable $th) {

            $this->product->getConnection()->rollBack();
            $_SESSION['status'] = false;
            $_SESSION['msg'] = $th->getMessage();
            redirect('admin/products');
        }

        if ($product['thumbnail'] && file_exists(PATH_ROOT . $product['thumbnail'])) {
            unlink(PATH_ROOT . $product['thumbnail']);
        }

        $arrayGallerys = explode(',', $product['g_image']);

        foreach ($arrayGallerys as $gallery) {
            if (!empty($gallery) && file_exists(PATH_ROOT . $gallery)) {
                unlink(PATH_ROOT . $gallery);
            }
        }

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác thành công';

        redirect('admin/products');
        exit();
    }

    private function cleanupFiles($data)
    {
        if (is_array($data['thumbnail']) && !empty($data['thumbnail']) && file_exists(PATH_ROOT . $data['thumbnail'])) {
            unlink(PATH_ROOT . $data['thumbnail']);
        }

        if (is_array($data['gallery']) && !empty($data['gallery']) && file_exists(PATH_ROOT . $data['gallery'])) {
            foreach ($data['gallery'] as $file) {
                if (file_exists(PATH_ROOT . $file)) {
                    unlink(PATH_ROOT . $file);
                }
            }
        }
    }
}
