<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;

//New Arranegment
use App\Http\Controllers\menu\StoreMenu;
use App\Http\Controllers\inventory\StoreInventory;
use App\Http\Controllers\cart\StoreCart;
use App\Http\Controllers\sales\StoreSales;
use App\Http\Controllers\product\StoreProduct;
use App\Http\Controllers\account\StoreAccount;
use App\Http\Controllers\supplier\StoreSupplier;

// New Arrangement

// authentication
Route::get('/', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::post('/login', [LoginBasic::class, 'loginAccount'])->name('auth-login-account');

Route::prefix('admin')
  ->middleware('auth')
  ->group(function () {
    // Store Menu
    Route::controller(StoreMenu::class)->group(function () {
      Route::get('/menu', 'index')->name('store-menu');
      Route::post('/menu/add', 'addToCart')->name('store-add-cart');
    });

    // Sales
    Route::controller(StoreSales::class)->group(function () {
      Route::get('/sales', 'index')->name('store-sales');
    });

    // Product
    Route::controller(StoreProduct::class)->group(function () {
      Route::get('/product', 'index')->name('store-product');
      Route::post('/product/add', 'addProduct')->name('store-product.add');
      Route::post('/product/edit', 'editProduct')->name('store-product.edit');
      Route::post('/product/delete', 'deleteProduct')->name('store-product.delete');
    });

    // Supplier
    Route::controller(StoreSupplier::class)->group(function () {
      Route::get('/supplier', 'index')->name('store-supplier');
      Route::post('/supplier/add', 'addSupplier')->name('store-supplier.add');
      Route::post('/supplier/edit', 'editSupplier')->name('store-supplier.edit');
      Route::post('/supplier/delete', 'deleteSupplier')->name('store-supplier.delete');
    });

    // Main Page Route (Analytics)
    Route::controller(Analytics::class)->group(function () {
      Route::get('/analytics', 'index')->name('dashboard-analytics');
    });

    // Accounts
    Route::controller(StoreAccount::class)->group(function () {
      Route::get('/accounts', 'index')->name('store-account');
      Route::post('/accounts/add', 'addPersonalDetails')->name('store-account.add');
      Route::post('/accounts/edit', 'editPersonalDetails')->name('store-account.edit');
      Route::post('/accounts/adduser', 'addUser')->name('store-account.addUser');
      Route::post('/accounts/edituser', 'editUser')->name('store-account.editUser');
    });

    // Cart
    Route::controller(StoreCart::class)->group(function () {
      Route::get('/cart', 'index')->name('store-cart');
      Route::get('/cart/remove/{id}', 'removeData')->name('store-cart-remove');
      Route::post('/cart/order', 'orderData')->name('store-cart-order');
    });

    Route::controller(LoginBasic::class)->group(function () {
      Route::get('/logout', 'logoutAccount')->name('auth-logout-account');
    });
    // Pages (Account Settings)
    Route::controller(AccountSettingsAccount::class)->group(function () {
      Route::get('/account-settings/account', 'index')->name('pages-account-settings-account');
    });
  });

Route::get('/admin/cart/generate-pdf', [StoreCart::class, 'generatePDF'])->name('cart.generatePDF');
