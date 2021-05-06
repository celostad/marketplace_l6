<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $helloWorld = "";
    return view('welcome', ['hello'=>$helloWorld]);
});

Route::get('/model', function(){
    //$products = \App\Product::all(); //= select * from products

    /*$user = new \App\User();
    $user->name = 'Usuário Teste';
    $user->email = 'email@teste.com';
    $user->password = bcrypt('12340980');
    $user->save();
*/
   // \App\User::all() - retorna todos os usuários
   // \App\User::find(3)  - retorna o usuário com base no id
   // \App\User::where('name', 'Constantin Fritsch')->get(); - retorna o usuário com base no nome
   // \App\User::paginate(10) - paginar dados com laravel

   //Mass Assignment - Atribuição em Massa

  /* $user = \App\User::create([

        'name' => 'Marcelo de Souza',
        'email' => 'celostad@gmail.com',
        'password' => bcrypt('12340980')
   ]);
*/

    //Mass Update
    //$user = \App\User::find(43);
    /*$user = $user->update([
        'name' =>'Marcelo de Souza... atualizado'
    ]);// Desse modo retorna true ou false
    */

    /*$user->update([
        'name' =>'Marcelo de Souza... atualizado',
        'email_verified_at' => now()
    ]);// Assim atualiza e mostra normalmente
    */
    //dd($user);

    //Como faria para pegar a loja de um usuário
    //$user = \App\User::find(4);

    //return $user->store;

    //Pegar os produtos de uma loja?
  //$loja = \App\Store::find(1);
    //return $loja->products;

    //contar produtos
    //return $loja->products->count();

    //Pegar produto somente de um ID. Ex.: 9
    //return $loja->products()->where('id', 1)->get();

    //Pegar as lojas de uma categoria
   // $categoria = \App\Category::find(1);
   // $categoria->products;

   //Criar uma loja para um usuário
/*      $user =\App\User::find(10);
        $store = $user->store()->create([
            'name' => 'Loja Teste',
            'description' => 'Loja Teste de produtos de Informática',
            'mobile_phone' => 'xx-xxxxx-xxxx',
            'phone' => 'xx-xxxxx-xxxx',
            'slug' => 'loja-teste'
   ]); */


   //Criar um produto para uma loja

   /* $store = \App\Store::find(41);
   $product = $store->products()->create([
        'name'  => 'Notebook Acer',
        'description'   => 'Core I5 4GB',
        'body' => 'Qualquer coisa...',
        'price'  => 2999.90,
        'slug'  => 'notebook-acer',
   ]); */


   //Criar uma categoria
   /* \App\Category::create([
    'name' => 'Games',
    'description' => null,
    'slug' => 'games'
   ]);

   \App\Category::create([
    'name' => 'Notebooks',
    'description' => null,
    'slug' => 'notebooks'
   ]);

   return \App\Category::all(); */

   //Adicionar um produto para uma categoria ou vice-versa
    /* $product = \App\Product::find(41);
    //$product->categories()->attach([1]); ou
    $product->categories()->sync([1, 2]); */

    $product = \App\Product::find(41);
    return $product->categories;

});


Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

    /*Route::prefix('stores')->name('admin.stores.')->group(function(){

        Route::get('/', 'StoreController@index')->name('index');
        Route::get('/create', 'StoreController@create')->name('create');
        Route::post('/store', 'StoreController@index')->name('store');
        Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        Route::post('/update/{store}', 'StoreController@update')->name('update');
        Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');

    }); */

    /* Route::prefix('products')->name('admin.products.')->group(function(){

        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/store', 'ProductController@store')->name('store');
        Route::get('/{product}/edit', 'ProductController@edit')->name('edit');
        Route::post('/update/{product}', 'ProductController@update')->name('update');
        Route::get('/destroy/{product}', 'ProductController@destroy')->name('destroy');

    }); */

    Route::resource('stores', 'StoreController');
    Route::resource('products', 'ProductController');



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
