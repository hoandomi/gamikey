<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTables)
    {
        //
        return $dataTables->render("admin.product.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::where("status", 1)->get();
        $subCategories = SubCategory::where("status", 1)->get();
        $brands = Brand::where("status", 1)->get();
        $tags = Tag::where("status", 1)->get();
        return view("admin.product.create", compact("categories", "subCategories", "brands", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                "name" => ["required", "max:200"],
                "image" => ["required", "image", "mimes:jpeg,png,jpg,gif,svg,webp", "max:5120"],
                "category_id" => ["required", "integer", "exists:categories,id"],
                "tags_id" => ["array"],
                "price" => ["required", "numeric", "min:0"],
                "type" => ["required"],
            ],
            [
                "name.required" => "Tên sản phẩm không được để trống",
                "name.max" => "Tên sản phẩm không được quá 200 ký tự",
                "image.required" => "Ảnh sản phẩm không được để trống",
                "image.image" => "Vui Lòng Chọn Ảnh",
                "image.mimes" => "Ảnh sản phẩm phải có định dạng jpeg, png, jpg, gif, svg",
                "image.max" => "Ảnh sản phẩm không được vượt quá 5MB",
                "category_id.required" => "Danh mục sản phẩm không được để trống",
                "category_id.exists" => "Danh mục sản phẩm không tồn tại",
                "short_description.required" => "Mô tả ngắn sản phẩm không được để trống",
                "short_description.max" => "Mô tả ngắn sản phẩm không được quá 1000 ký tự",
                "long_description.max" => "Mô tả dài sản phẩm không được quá 5000 ký tự",
                "price.required" => "Giá sản phẩm không được để trống",
                "price.numeric" => "Giá sản phẩm không hợp lệ",
                "price.min" => "Giá sản phẩm không được nhỏ hơn 0",
                "type.required" => "Loại sản phẩm không được để trống",
            ],
            [
                "name" => "Tên sản phẩm",
                "image" => "Ảnh sản phẩm",
                "category_id" => "Danh mục sản phẩm",
                "price" => "Giá sản phẩm",
                "type" => "Loại sản phẩm",
            ],
        );
        $product = new Product();
        $product->name = $request->name;
        $product->slug = \Str::slug($request->name);
        $product->image = $this->uploadImage($request, "image", "uploads/products");
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->subCategory_id;
        $product->brand_id = $request->brand_id;
        $product->tags_id = json_encode($request->tags_id);
        $product->short_description = $request->short_description;
        $product->description = $request->long_description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->discount_start_date = $request->startDate;
        $product->discount_end_date = $request->endDate;
        $product->type = $request->type;
        $product->slug_type = \Str::slug($request->type);
        $product->save();

        toastr()->success("Thêm sản phẩm thành công", "Thành Công");
        return redirect()->route("admin.product.index");
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $categories = Category::get();
        $subCategories = SubCategory::where("id", $product->sub_category_id)->get();
        $brands = Brand::get();
        $tags = Tag::get();
        return view("admin.product.edit", compact("product", "categories", "subCategories", "brands", "tags"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                "name" => ["required", "max:200"],
                "image" => ["image", "mimes:jpeg,png,jpg,gif,svg,webp", "max:5120"],
                "category_id" => ["required", "integer", "exists:categories,id"],
                "tags_id" => ["array"],
                "price" => ["required", "numeric", "min:0"],
                "type" => ["required"],
            ],
            [
                "name.required" => "Tên sản phẩm không được để trống",
                "name.max" => "Tên sản phẩm không được quá 200 ký tự",
                "image.required" => "Ảnh sản phẩm không được để trống",
                "image.image" => "Vui Lòng Chọn Ảnh",
                "image.mimes" => "Ảnh sản phẩm phải có định dạng jpeg, png, jpg, gif, svg",
                "image.max" => "Ảnh sản phẩm không được vượt quá 5MB",
                "category_id.required" => "Danh mục sản phẩm không được để trống",
                "category_id.exists" => "Danh mục sản phẩm không tồn tại",
                "price.required" => "Giá sản phẩm không được để trống",
                "price.numeric" => "Giá sản phẩm không hợp lệ",
                "price.min" => "Giá sản phẩm không được nhỏ hơn 0",
                "type.required" => "Loại sản phẩm không được để trống",
            ],
            [
                "name" => "Tên sản phẩm",
                "image" => "Ảnh sản phẩm",
                "category_id" => "Danh mục sản phẩm",
                "short_description" => "Mô tả ngắn sản phẩm",
                "long_description" => "Mô tả dài sản phẩm",
                "price" => "Giá sản phẩm",
                "type" => "Loại sản phẩm",
            ],
        );
        $product = new Product();
        $product->name = $request->name;
        $product->slug = \Str::slug($request->name);
        $product->image = $this->updateImage($request, "image", "uploads/products", $request->oldImage);
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->subCategory_id;
        $product->brand_id = $request->brand_id;
        $product->tags_id = json_encode($request->tags_id);
        $product->short_description = $request->short_description;
        $product->description = $request->long_description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->discount_start_date = $request->startDate;
        $product->discount_end_date = $request->endDate;
        $product->type = $request->type;
        $product->slug_type = \Str::slug($request->type);
        $product->save();

        toastr()->success("Cập Nhật sản phẩm thành công", "Thành Công");
        return redirect()->route("admin.product.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $this->deleteImage($product->image);
        $product->delete();

        return response(['message' => 'Xóa sản phẩm thành công', 'status' => 'success']);
    }

    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('status', 1)->where("category_id", $request->category_id)->get();
        return response()->json($subCategories);
    }

    public function changeStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->status = !$product->status;
        $product->save();

        return response(['message' => 'Thay đổi trạng thái thành công', 'status' => 'success']);
    }
}
