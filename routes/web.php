<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddAdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\HomeIndexController;
use App\Http\Controllers\AboutUsIndexController;
use App\Http\Controllers\ServicesIndexController;
use App\Http\Controllers\ServicesTextIndexController;
use App\Http\Controllers\PortfolioIndexController;
use App\Http\Controllers\PortfolioTextIndexController;
use App\Http\Controllers\ContactTextIndexController;
use App\Http\Controllers\ContactIndexController;
use App\Http\Controllers\ContactUrlController;
use App\Http\Controllers\ContactTopController;
use App\Http\Controllers\ServiceBackImageController;
use App\Http\Controllers\RepairWorkGroupController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OperayingSystemController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StatusServeController;
use App\Http\Controllers\StoreMobileController;
use App\Http\Controllers\SparesController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\JobSystemController;
use App\Http\Controllers\ChequePDFController;
use App\Http\Controllers\InsuranceController;

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
    $homeTop = DB::table('index_home_pages')
    ->join('about_us_pages', 'index_home_pages.statusHomIndex', '=', 'about_us_pages.statusAboutUs')
    ->get();
    $servicesText = DB::table('services_text_indices')
    ->get();
    $services = DB::table('services_indices')
    ->get();
    $portfolioText = DB::table('portfolio_text_indices')
    ->get();
    $portfolio = DB::table('portfolio_indices')
    ->get();
    $contactText = DB::table('contact_text_indices')
    ->get();
    $contact = DB::table('contact_indices')
    ->get();
    $urls = DB::table('contact_urls')
    ->get();
    $contactTops = DB::table('contact_tops')
    ->get();
    $backImages = DB::table('service_back_images')
    ->get();
  

    return view('welcome' , ['homeTop' => $homeTop, 'services' => $services ,'backImages' => $backImages, 'contactTops' => $contactTops, 'urls' => $urls,'servicesText' => $servicesText, 'contactText'=>$contactText, 'contact'=>$contact ,'portfolio'=>$portfolio, 'portfolioText'=> $portfolioText]);
});

Auth::routes();

Route::resource('/reset', ResetController::class);
Route::get('/reset-pass', [ResetController::class,'create']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/repair-groups', [HomeController::class, 'dataBrands']);
    Route::post('/repair-work', [HomeController::class, 'dataWork']);
    Route::post('/dateHome', [HomeController::class, 'index']);
    Route::post('/get-generations', [HomeController::class, 'getGenerations']);
    Route::post('/set-interval', [HomeController::class, 'setInterval']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/admin', AddAdminController::class);
    Route::get('/add-admin', [AddAdminController::class, 'create']);
    Route::get('/delete-user/{id}', [AddAdminController::class, 'destroy']);
    Route::get('/edit-user/{id}', [AddAdminController::class, 'edit']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/branch', BranchController::class);
    Route::get('/add-branch', [BranchController::class, 'create']);
    Route::get('/delete-branch/{id}', [BranchController::class, 'destroy']);
    Route::get('/edit-branch/{id}', [BranchController::class, 'edit']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/add-home', HomeIndexController::class);
    Route::post('/create-home', [HomeIndexController::class, 'store']);

});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('add-about', AboutUsIndexController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('add-services', ServicesIndexController::class);
    Route::get('add-imageServices', [ServicesIndexController::class,'create']);
    Route::get('delete-services/{id}', [ServicesIndexController::class,'destroy']);
    Route::resource('add-textServices', ServicesTextIndexController::class);
});

Route::group(['middleware' => 'auth'], function () {
   Route::resource('/add-portfolio', PortfolioIndexController::class);
   Route::get('add-imagePortfolio', [PortfolioIndexController::class,'create']);
   Route::get('delete-portfolio/{id}', [PortfolioIndexController::class,'destroy']);
   Route::resource('add-textPortfolio', PortfolioTextIndexController::class);


});

Route::group(['middleware' => 'auth'], function () {
     Route::resource('/add-textContact', ContactTextIndexController::class);
     Route::resource('/add-contact', ContactIndexController::class);
     Route::get('/add-indexContact', [ContactIndexController::class, 'create']);
     Route::get('/delete-contact/{id}', [ContactIndexController::class, 'destroy']);
 });


 Route::group(['middleware' => 'auth'], function () {
    Route::resource('/add-contactUrl', ContactUrlController::class);
    Route::get('/delete-icon/{id}', [ContactUrlController::class,'destroy']);
    
});


Route::group(['middleware' => 'auth'], function () {
    Route::resource('/add-contactTop', ContactTopController::class);
    Route::get('/delete-contactTop/{id}', [ContactTopController::class,'destroy']);
    
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/add-serviceBack', ServiceBackImageController::class);
    Route::get('/delete-serviceBack/{id}', [ServiceBackImageController::class,'destroy']);
    
});
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/repair-group', RepairWorkGroupController::class);
    Route::get('/create-group', [RepairWorkGroupController::class,'create']);
    Route::get('/delete-group/{id}', [RepairWorkGroupController::class,'destroy']);
    
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/generation', GenerationController::class);
    Route::get('/create-generation', [GenerationController::class,'create']);
    Route::get('/delete-generation/{id}', [GenerationController::class,'destroy']);
    Route::post('/autocomplete', [GenerationController::class, 'fetch'])->name('autocomplete');
    
    Route::post('/generation-search', [GenerationController::class,'indexll']);

});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/brand', BrandController::class);
    Route::get('/create-brand', [BrandController::class,'create']);
    Route::get('/delete-brand/{id}', [BrandController::class,'destroy']);
    
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/system', OperayingSystemController::class);
    Route::get('/create-system', [OperayingSystemController::class,'create']);
    Route::get('/delete-system/{id}', [OperayingSystemController::class,'destroy']);
    
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/grade', GradeController::class);
    Route::get('/create-grade', [GradeController::class,'create']);
    Route::get('/delete-grade/{id}', [GradeController::class,'destroy']);

    
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/sta-serve', StatusServeController::class);
    Route::get('/create-staServe', [StatusServeController::class,'create']);
    Route::get('/delete-staServe/{id}', [StatusServeController::class,'destroy']);
    
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/store-mobile', StoreMobileController::class);
    Route::get('/create-storeMobile', [StoreMobileController::class,'create']);
    Route::get('/delete-storeMobile/{id}', [StoreMobileController::class,'destroy']);
    
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/spares', SparesController::class);
    Route::get('/create-spares', [SparesController::class,'create']);
    Route::get('/delete-spares/{id}', [SparesController::class,'destroy']);
    Route::post('/autocomplete-spares', [SparesController::class, 'fetch']);
    
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/risk', RiskController::class);
    Route::get('/create-risk', [RiskController::class,'create']);
    Route::get('/delete-risk/{id}', [RiskController::class,'destroy']);
    
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/job-system', JobSystemController::class);
    Route::get('/create-job-system', [JobSystemController::class,'create']);
    Route::get('/delete-job-system/{id}', [JobSystemController::class,'destroy']);
    Route::post('/autocomplete-jobSystem', [JobSystemController::class, 'fetch']);
    Route::post('/autocomplete-screenPrice', [JobSystemController::class, 'fetch']);
    Route::post('/autocomplete-mobileDevice', [JobSystemController::class, 'mobileDevice']);
    Route::post('/price', [JobSystemController::class, 'priceMobile']);
    Route::post('/get-branche', [JobSystemController::class, 'getBranch']);
    Route::get('/job-Status', [JobSystemController::class, 'jobStatus']);
    Route::get('/statusJob/{id}', [JobSystemController::class, 'JobSystemStatus']);
    Route::get('/imeiJob/{id}', [JobSystemController::class, 'edit']);
    Route::post('/statusJobEdit', [JobSystemController::class, 'JobSystemStatusEdit']);
    Route::get('/job-system-show/{id}', [JobSystemController::class, 'JobSystemStatueShow']);
   
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/job-system-WarrantyCard/{id}', [ChequePDFController::class,'warrantyCard']);
    Route::get('/job-system-receipt/{id}', [ChequePDFController::class,'receipt']);

});


Route::post('/insurance', [InsuranceController::class, 'insurance']);




