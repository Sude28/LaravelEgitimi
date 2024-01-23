<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool       //burada yetki tanımlaması yapılabilir.
    {
        return true; //Biz yetkilendirme yapmayıp direk izin verdik.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array  //Bizim belirlediğimiz uyarıları vermesini sağlıycaz burada
    {
        return [
            'name'=>'required|max:50', //ad ve fiyat zorunlu ve ad max 50 karakter olmalı
            'price'=>'required',
        ];
    }

    public function messages(){ //Hata mesajını kendimiz oluşturduk
        return [
            'name.required'=>'Kitabın adı zorunludur',
            'price.required'=> 'Kitabın fiyatı zorunludur',
            'name.max' => 'Kitabın adı 50 karakterden fazla olamaz'    //noktadan sonra doğrulanacak(validation) alan geliyor
        ];
    }
}
