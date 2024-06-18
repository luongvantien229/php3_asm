<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValid extends FormRequest {

public function authorize(): bool { return true; }

public function rules(): array {

return [

'name' => ['required','min:2', 'max:30'],

'email' => 'required|email',

'password1' => 'required|min:6|same:password2',

'password2' => 'required|min:6'

];

}

public function messages() {

return [

'name.required' => 'Phải nhập họ tên nha bạn ơi',

'name.min' => 'Nhập họ tên ít nhất 2 ký tự',

'name.max' => 'Họ tên gì mà dài quá thế',

'email.required' => 'Chưa nhập email',

'email.email' => 'Nhập email chưa đúng',


'password1.required' => 'Bạn chưa nhập mật khẩu',

'password1.min' => 'Mật khẩu từ 6 ký tự trở lên',

'password1.same' => 'Hai mật khẩu không giống nhau',

'password2.required' => 'Bạn chưa nhập lại mật khẩu',

'password2.min' => 'Mật khẩu nhập lại cùng từ 6 ký tự trở lên'

];

}

}