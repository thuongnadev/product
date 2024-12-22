<?php
return [
    'resource' => [
        'navigation_label' => 'Sản phẩm',
        'model_label' => 'Sản phẩm',
        'plural_model_label' => 'Sản phẩm',
        'navigation_group' => 'Nội dung',
        'navigation_icon' => 'heroicon-o-shopping-cart',
    ],
    'form' => [
        'sections' => [
            'basic' => 'Thông tin cơ bản',
            'pricing' => 'Giá & Khuyến mãi',
            'inventory' => 'Quản lý kho hàng',
            'dimensions' => 'Kích thước & Vận chuyển',
            'categories' => 'Phân loại sản phẩm',
            'variations' => 'Biến thể sản phẩm',
            'variation_details' => 'Chi tiết biến thể',
        ],
        'descriptions' => [
            'basic' => 'Nhập các thông tin cơ bản của sản phẩm',
            'pricing' => 'Thiết lập giá bán và các thông tin khuyến mãi cho sản phẩm',
            'inventory' => 'Thiết lập thông tin tồn kho và vận chuyển sản phẩm',
            'dimensions' => 'Thiết lập kích thước và phương thức vận chuyển sản phẩm',
            'categories' => 'Thiết lập danh mục và từ khóa cho sản phẩm',
            'variations' => 'Quản lý các biến thể của sản phẩm (màu sắc, kích thước,...)',
        ],
        'label' => [
            'name' => 'Tên sản phẩm',
            'slug' => 'Đường dẫn',
            'sku' => 'Mã sản phẩm',
            'qr' => 'Mã QR',
            'type' => 'Loại sản phẩm',
            'is_activated' => 'Kích hoạt',
            'is_trend' => 'Xu hướng',
            'image_main' => 'Ảnh bìa',
            'gallery' => 'Thư viện ảnh',
            'description' => 'Mô tả chi tiết',
            'short_description' => 'Mô tả ngắn',
            'price' => 'Giá bán',
            'discount' => 'Giá khuyến mãi',
            'vat' => 'Thuế VAT',
            'stock_quantity' => 'Số lượng tồn kho',
            'is_in_stock' => 'Còn hàng',
            'is_shipped' => 'Có thể vận chuyển',
            'weight' => 'Cân nặng',
            'shipping_type' => 'Loại vận chuyển',
            'length' => 'Chiều dài',
            'width' => 'Chiều rộng',
            'height' => 'Chiều cao',
            'categories' => 'Danh mục',
            'tags' => 'Từ khóa',
            'variation' => [
                'sku' => 'Mã biến thể',
                'barcode' => 'Mã vạch',
                'price' => 'Giá bán',
                'discount' => 'Giá ưu đãi'
            ],
        ],
        'placeholder' => [
            'name' => 'Nhập tên sản phẩm...',
            'slug' => 'duong-dan-san-pham',
            'sku' => 'VD: SP001',
            'price' => '0',
            'discount' => '0',
            'vat' => '0',
            'stock_quantity' => '0',
            'weight' => '0.0',
            'length' => '0',
            'width' => '0',
            'height' => '0',
            'categories' => 'Chọn danh mục sản phẩm',
            'tags' => 'Nhập từ khóa',
            'variation' => [
                'sku' => 'VD: BT001',
                'barcode' => 'Nhập mã vạch',
                'price' => '0',
                'discount' => '0'
            ],
        ],
        'suffix' => [
            'stock_quantity' => 'sản phẩm',
            'weight' => 'kg',
            'length' => 'cm',
            'width' => 'cm',
            'height' => 'cm',
        ],
        'helper_text' => [
            'name' => 'Tên sản phẩm từ 50-60 ký tự là lý tưởng nhất',
            'sku' => 'Mã sản phẩm tối đa không nên quá 20 ký tự',
            'price' => 'Giá bán chính thức của sản phẩm',
            'discount' => 'Giá sau khi áp dụng khuyến mãi (nếu có)',
            'vat' => 'Phần trăm thuế VAT áp dụng',
            'stock_quantity' => 'Số lượng sản phẩm hiện có trong kho',
            'is_in_stock' => 'Sản phẩm có sẵn để bán',
            'is_shipped' => 'Sản phẩm có thể giao hàng',
            'weight' => 'Cân nặng của sản phẩm',
            'shipping_type' => 'Phương thức vận chuyển',
            'length' => 'Chiều dài của sản phẩm',
            'width' => 'Chiều rộng của sản phẩm',
            'height' => 'Chiều cao của sản phẩm',
            'categories' => 'Chọn một hoặc nhiều danh mục cho sản phẩm',
            'tags' => 'Thêm các từ khóa liên quan đến sản phẩm',
            'variation' => [
                'sku' => 'Mã định danh duy nhất cho biến thể sản phẩm',
                'barcode' => 'Mã vạch của sản phẩm biến thể (nếu có)',
                'price' => 'Giá bán riêng của biến thể',
                'discount' => 'Giá ưu đãi cho biến thể (nếu có)'
            ],
        ],
        'options' => [
            'type' => [
                'simple' => 'Sản phẩm thường',
                'variable' => 'Sản phẩm biến thể',
                'service' => 'Sản phẩm dịch vụ',
            ],
            'status' => [
                'active' => 'Hoạt động',
                'inactive' => 'Không hoạt động',
            ],
        ],
    ],
    'table' => [
        'label' => [
            'name' => 'Tên sản phẩm',
            'url' => 'Đường dẫn sản phẩm',
            'tags' => 'Thẻ',
            'categories' => 'Danh mục',
            'product_image' => 'Hình ảnh',
            'status' => 'Trạng thái',
            'is_activated' => 'Kích hoạt',
            'is_trend' => 'Xu hướng',
            'created_at' => 'Ngày đăng',
        ],
        'options' => [
            'active' => 'Hiển thị',
            'inactive' => 'Ẩn',
        ],
        'icons' => [
            'active' => 'heroicon-o-eye',
            'inactive' => 'heroicon-o-eye-slash'
        ],
        'status' => [
            'active' => 'Đang hoạt động',
            'inactive' => 'Tạm ngưng',
        ],
    ],
    'filter' => [
        'label' => [
            'categories' => 'Danh mục',
            'created_at' => 'Ngày tạo',
            'created_from' => 'Từ ngày',
            'created_until' => 'Đến ngày',
            'is_activated' => 'Kích hoạt',
            'is_trend' => 'Xu hướng'
        ],
        'options' => [
            'active' => 'Hiển thị',
            'inactive' => 'Ẩn'
        ]
    ],
];
