<?php

return [
    'rules' => [
        'required' => ':attribute là bắt buộc.',
        'max' => [
            'string' => ':attribute không được dài quá :max ký tự.',
            'file' => ':attribute không được lớn hơn :max kilobytes.',
        ],
        'numeric' => ':attribute phải là số.',
        'integer' => ':attribute phải là số nguyên.',
        'min.numeric' => ':attribute phải lớn hơn :min.',
        'image' => ':attribute phải là hình ảnh.',
        'unique' => ':attribute đã tồn tại, vui lòng chọn giá trị khác.',
        'email' => ':attribute phải là một địa chỉ email hợp lệ.',
        'boolean' => ':attribute phải là true hoặc false.',
        'active_url' => ':attribute không phải là một URL hợp lệ.',
        'after' => ':attribute phải là một ngày sau :date.',
        'after_or_equal' => ':attribute phải là một ngày sau hoặc bằng :date.',
        'alpha' => ':attribute chỉ được chứa các ký tự chữ cái.',
        'alpha_dash' => ':attribute chỉ được chứa các ký tự chữ cái, số, dấu gạch ngang và gạch dưới.',
        'alpha_num' => ':attribute chỉ được chứa các ký tự chữ cái và số.',
        'ascii' => ':attribute chỉ được chứa các ký tự ASCII 7-bit.',
        'before' => ':attribute phải là một ngày trước :date.',
        'before_or_equal' => ':attribute phải là một ngày trước hoặc bằng :date.',
        'confirmed' => ':attribute xác nhận không khớp.',
        'different' => ':attribute và :other phải khác nhau.',
        'doesnt_start_with' => ':attribute không được bắt đầu bằng một trong các giá trị: :values.',
        'doesnt_end_with' => ':attribute không được kết thúc bằng một trong các giá trị: :values.',
        'ends_with' => ':attribute phải kết thúc bằng một trong các giá trị: :values.',
        'exists' => ':attribute không tồn tại.',
        'filled' => ':attribute phải có giá trị.',
        'gt' => ':attribute phải lớn hơn :value.',
        'gte' => ':attribute phải lớn hơn hoặc bằng :value.',
        'hex_color' => ':attribute phải là một màu hợp lệ theo định dạng hex.',
        'in' => ':attribute phải nằm trong: :values.',
        'ip' => ':attribute phải là một địa chỉ IP hợp lệ.',
        'json' => ':attribute phải là một chuỗi JSON hợp lệ.',
        'lt' => ':attribute phải nhỏ hơn :value.',
        'lte' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'mac_address' => ':attribute phải là một địa chỉ MAC hợp lệ.',
        'multiple_of' => ':attribute phải là bội số của :value.',
        'not_in' => ':attribute không được nằm trong: :values.',
        'not_regex' => ':attribute không hợp lệ.',
        'nullable' => ':attribute có thể để trống.',
        'prohibited' => ':attribute phải để trống.',
        'prohibited_if' => ':attribute phải để trống nếu :other là :value.',
        'required_if' => ':attribute là bắt buộc nếu :other là :value.',
        'required_with' => ':attribute là bắt buộc khi :values có giá trị.',
        'regex' => ':attribute không hợp lệ.',
        'same' => ':attribute và :other phải giống nhau.',
        'starts_with' => ':attribute phải bắt đầu bằng một trong các giá trị: :values.',
        'string' => ':attribute phải là một chuỗi.',
        'ulid' => ':attribute phải là một ULID hợp lệ.',
        'uuid' => ':attribute phải là một UUID hợp lệ.',
    ],

    'attributes' => [
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
    ],
];
