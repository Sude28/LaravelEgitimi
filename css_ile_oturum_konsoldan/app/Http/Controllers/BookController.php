<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $user = auth()->user(); //Oturumu açan user'a eriştik   
        $books = $user->books()->notDeleted()->get();  //Sadece o kullanıcının eklediği kitapları gösteren sorgu
        //$books = Book::notDeleted()->get();  //Book veritabanı tablosundan is_deleted'ı 0 olanları getiren sorgu( where('is_deleted',0) )(Scope oluşturduk böylece bu sorgunun adı  NotDeleted oldu uzun uzun sorguyu yazmaya gerek yok scope oluşturmak bu demek). $books: Bu, sorgudan dönen kitapları tutmak için oluşturulan değişken. Book,Model, veritabanındaki "books" tablosu ile ilişkilidir.
        return view('books.index',compact('books'));     //views klosörü içinde books klosorü içinde index.blade.php. //compact() fonksiyonu, belirtilen değişkenleri bir dizi içinde paketler ve görünüme aktarır. Yani, books değişkeni index.blade.php dosyasında kullanılabilir hale gelir ve bu dosyada kitapları listelemek için kullanılabilir.Yukarıda veritabanından çektik aşağıda görünür yaptık.
    } 

    public function create(){
        return view('books.create');
    }

    public function store(BookStoreRequest $request ){ //Kendi requestimizi yazdık
        $book = new Book();   //Book adında bir Model sınıfından bir nesne oluşturur. Model sınıfı da veritabanı ile etkileşime geçmek için kullanılır.    
        $book->name = $request->name;    //Formdaki 'name' alanının değerini alır.
        $book->price = $request->price;  //Formdaki 'price' alanının değerini alır.
        $book->user_id = auth()->id();   //Birden fazla kullanıcı ve her kullanıcının da kendi kitapları olduğundan gerekiyor artık
        $book->save();  //Veritabanına kaydetmesi için

        return redirect()->back(); //bu satır sayesinde kullanıcı formu gönderdikten sonra, işlem tamamlandığında ve kitap verileri başarıyla veritabanına kaydedildiğinde, kullanıcı tekrar formun olduğu sayfaya geri dönecektir.
    }

    public function edit($id){
        $user = auth()->user();   //Oturumu açan user'a eriştik 
        $book = $user->books()->notDeleted()->findOrFail($id) ;     //kullanıcının-> kitaplarının-> silinmeyenlerinin->arasında arıyor artık
        //$book= Book::notDeleted()->findOrFail($id);  //findOrFaiil yöntemi, veritabanında belirtilen ID'ye sahip bir kayıt varsa bu kaydı döndürür.//Scope ile arayüzden sildiğimiz kitap veritabanında hala olduğu için arama çubuğu ile düzenleye gidilebiliyor bu nedenle buraya da NotDeleted scopu eklemeliyiz.Böylece sadece is_deleted'ı 0 olanları güncelleyebilir.
        return view('books.edit',compact('book')); //compactt fonksiyonu, belirtilen değişkenleri bir dizi içinde paketler ve görünüme aktarır. Yani, book değişkeni booksedit dosyasında kullanılabilir hale gelir .Yukarıda verilen id'li kitabı çektik aşağıda görünür yaptık.
    }

    public function update(Request $request, $id){  //request ile id ve price geliyor id ile de hangisi güncelleniyor anlıyoruz
        $user = auth()->user();   //Oturumu açan user'a eriştik
        $book = $user->books()->notDeleted()->findOrFail($id) ; //kullanıcının-> kitaplarının-> silinmeyenlerinin->arasında olanlardan güncelleme yapıyor.
        //$book = Book::notDeleted()->findOrFail($id);   //Scope ile arayüzden sildiğimiz kitap veritabanında hala olduğu için arama çubuğu ile düzenleye gidilebiliyor bu nedenle buraya da NotDeleted scopu eklemeliyiz.Böylece sadece is_deleted'ı 0 olanları güncelleyebilir.
        $book->price = $request->price;  //fiyatı güncelliyorum
        $book->save();  

        return redirect()->back(); 
    }

    public function delete($id){
        //$book = Book::findOrFail($id)->delete(); burada direk silme işlemi yapmıştık bu is_deleted alanı eklemeden önceydi şimdi is deleted 0 ise her yerde görünüyor 1 ise veritabanında görünüyor sitede gözükmüyor olucak.
        $book = Book::findOrFail($id)->update(['is_deleted' => 1]); //1 olunca siteden siler veritabanında kalır demek.
        return redirect()->back();
    }
}
