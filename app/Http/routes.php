<?php
use App\Promoter;
use App\Contractor;
use App\Input;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});  
    

// Route::get('/awards/BackCheck',function () {
// 	return view('awards.BackCheck');;
// });
/*
Route::resource('/contractors','ContractorsController');
Route::get('/contractors/destroy/{id}','ContractorsController@destroy');


Route::resource('/reviews','ReviewsController');
Route::get('/reviews/destroy/{id}','ReviewsController@destroy');

Route::resource('/admins','AdminsController');
Route::get('/admins/destroy/{id}','AdminsController@destroy');

Route::resource('/promoters','PromotersController');
Route::get('/promoters/destroy/{id}','PromotersController@destroy');



Route::resource('/visits','VisitsController');
Route::get('/visits/destroy/{id}','VisitsController@destroy');

Route::resource('/awards','AwardsController');
Route::get('awards/destroy/{id}', 'AwardsController@destroy');

Route::resource('/competitions','CompetitionsController');
Route::get('competitions/destroy/{id}', 'CompetitionsController@destroy');

Route::resource('/presents','PresentsController');
Route::get('presents/destroy/{id}', 'PresentsController@destroy');*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
// Route::get('/contractors/create', function () {
// 	// $promoters = Promoter::all();
// 	return view('contractors.create');
// });
// Route::post('/contractors/create', 'ContractorsController@store');
Route::resource('/contractors','ContractorsController');
Route::get('/contractors/destroy/{id}','ContractorsController@destroy');


Route::get('/error', function () {
    return view('/error');
});

//contractor
Route::post('importcontractor','ContractorsController@importcontractor');
Route::post('expotcontractor','ContractorsController@expotcontractor');
Route::post('/contractors/filter','ContractorsController@filter');
Route::get('contractors/contractors/promoters/{gov}','ContractorsController@PromoterByGov');
Route::get('contractors/{id}/contractors/promoters/{gov}','ContractorsController@EditPromoterByGov');

//contractor report export
Route::post('contractors/export/report','ContractorsController@ExportFilterContractors');

//contractor chart
Route::get('contractors/generate/report','ContractorsController@ContractorReport');
Route::post('contractors/generate/report','ContractorsController@ReportResult');
Route::get('contractors/generate/report/gov/{gov}','ContractorsController@CityByGov');

//review
Route::resource('/reviews','ReviewsController');
Route::get('/reviews/destroy/{id}','ReviewsController@destroy');
Route::post('importreview','ReviewsController@importreview');
Route::post('exportreview','ReviewsController@exportreview');

//review charts
Route::get('/Charts/TypesCharts','ReviewsController@TypesCharts');
Route::get('/Charts/QuqntityCharts','ReviewsController@QuqntityCharts');

//review report
Route::get('/reviews/generate/report/','ReviewsController@ReviewReport');
Route::post('/reviews/generate/report/','ReviewsController@ReportResult');
Route::post('/reviews/report/export','ReviewsController@ExportFilterReview');


Route::resource('/admins','AdminsController');
Route::get('/admins/destroy/{id}','AdminsController@destroy');
Route::post('expotadmin','AdminsController@exportadmin');



Route::resource('/Kpi','KpiController');

Route::resource('/promoters','PromotersController');
Route::get('/promoters/destroy/{id}','PromotersController@destroy');
Route::post('importpromoters','PromotersController@importpromoters');
Route::post('exportpromoters','PromotersController@exportpromoters');


Route::resource('/visits','VisitsController');
Route::get('/visits/destroy/{id}','VisitsController@destroy');
Route::post('import','VisitsController@importvisit');
Route::post('export','VisitsController@exportvisit');




Route::get('visits/promoters/{id}', 'VisitsController@promotersDropDownData');
Route::get('visits/contractors/{id}', 'VisitsController@contractorsDropDownData');




Route::resource('/awards','AwardsController');
Route::get('awards/destroy/{id}', 'AwardsController@destroy');

Route::resource('/competitions','CompetitionsController');
Route::get('competitions/destroy/{id}', 'CompetitionsController@destroy');
Route::post('exportCompetitions','CompetitionsController@exportCompetitions');


Route::resource('/presents','PresentsController');
Route::get('presents/destroy/{id}', 'PresentsController@destroy');
Route::post('exportPresents','PresentsController@exportPresents');
Route::get('presents/competitions/{id}', 'PresentsController@getCompetitions');
Route::get('presents/contractors/{id}', 'PresentsController@getContractors');
Route::get('presents/awards/{id}', 'PresentsController@getAwards');
});

