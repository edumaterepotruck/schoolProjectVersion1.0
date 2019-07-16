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








Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sample/index', 'SampleController@index')->name('sample.index');
Route::get('/sample/create', 'SampleController@create')->name('sample.create');
Route::post('/sample/store', 'SampleController@store')->name('sample.store');
Route::get('/sample/list', 'SampleController@list')->name('sample.list');
Route::post('/sample/destroy', 'SampleController@destroy')->name('sample.destroy');
Route::get('sample/{id}', 'SampleController@edit')->name('sample.edit');
Route::patch('sample/{id}', 'SampleController@update')->name('sample.update');
//---Role---------------
Route::get('/role/index', 'RoleController@index')->name('role.index');
Route::get('/role/create', 'RoleController@create')->name('role.create');
Route::post('/role/store', 'RoleController@store')->name('role.store');
Route::get('/role/list', 'RoleController@list')->name('role.list');
Route::post('/role/destroy', 'RoleController@destroy')->name('role.destroy');
Route::get('role/{id}', 'RoleController@edit')->name('role.edit');
Route::patch('role/{id}', 'RoleController@update')->name('role.update');

//---User---------------
Route::get('/user/index', 'UsersController@index')->name('user.index');
Route::get('/user/create', 'UsersController@create')->name('user.create');
Route::post('/user/store', 'UsersController@store')->name('user.store');
Route::get('/user/list', 'UsersController@list')->name('user.list');
Route::post('/user/destroy', 'UsersController@destroy')->name('user.destroy');
Route::get('user/{id}', 'UsersController@edit')->name('user.edit');
Route::patch('user/{id}', 'UsersController@update')->name('user.update');


//---AcademicYear---------------
Route::get('/academicyear/index', 'AcademicYearController@index')->name('academicyear.index');
Route::get('/academicyear/create', 'AcademicYearController@create')->name('academicyear.create');
Route::post('/academicyear/store', 'AcademicYearController@store')->name('academicyear.store');
Route::get('/academicyear/list', 'AcademicYearController@list')->name('academicyear.list');
Route::post('/academicyear/destroy', 'AcademicYearController@destroy')->name('academicyear.destroy');
Route::get('academicyear/{id}', 'AcademicYearController@edit')->name('academicyear.edit');
Route::patch('academicyear/{id}', 'AcademicYearController@update')->name('academicyear.update');

//---ClassDetail---------------
Route::get('/class-detail/index', 'ClassDetailController@index')->name('class-detail.index');
Route::get('/class-detail/create', 'ClassDetailController@create')->name('class-detail.create');
Route::post('/class-detail/store', 'ClassDetailController@store')->name('class-detail.store');
Route::get('/class-detail/list', 'ClassDetailController@list')->name('class-detail.list');
Route::post('/class-detail/destroy', 'ClassDetailController@destroy')->name('class-detail.destroy');
Route::get('class-detail/{id}', 'ClassDetailController@edit')->name('class-detail.edit');
Route::patch('class-detail/{id}', 'ClassDetailController@update')->name('class-detail.update');

//---ClassDivision---------------
Route::get('/class-division/index', 'ClassDivisionController@index')->name('class-division.index');
Route::get('/class-division/create', 'ClassDivisionController@create')->name('class-division.create');
Route::post('/class-division/store', 'ClassDivisionController@store')->name('class-division.store');
Route::get('/class-division/list', 'ClassDivisionController@list')->name('class-division.list');
Route::post('/class-division/destroy', 'ClassDivisionController@destroy')->name('class-division.destroy');
Route::get('class-division/{id}', 'ClassDivisionController@edit')->name('class-division.edit');
Route::patch('class-division/{id}', 'ClassDivisionController@update')->name('class-division.update');


//---ClassBranch---------------
Route::get('/classBranch/index', 'ClassBranchController@index')->name('classBranch.index');
Route::get('/classBranch/create', 'ClassBranchController@create')->name('classBranch.create');
Route::post('/classBranch/store', 'ClassBranchController@store')->name('classBranch.store');
Route::get('/classBranch/list', 'ClassBranchController@list')->name('classBranch.list');
Route::post('/classBranch/destroy', 'ClassBranchController@destroy')->name('classBranch.destroy');
Route::get('classBranch/{id}', 'ClassBranchController@edit')->name('classBranch.edit');
Route::patch('classBranch/{id}', 'ClassBranchController@update')->name('classBranch.update');


//---ClassMappping---------------
Route::get('/classMapping/index', 'ClassMappingController@index')->name('classMapping.index');
Route::get('/classMapping/create', 'ClassMappingController@create')->name('classMapping.create');
Route::post('/classMapping/store', 'ClassMappingController@store')->name('classMapping.store');
Route::get('/classMapping/list', 'ClassMappingController@list')->name('classMapping.list');
Route::post('/classMapping/destroy', 'ClassMappingController@destroy')->name('classMapping.destroy');
Route::get('classMapping/{id}', 'ClassMappingController@edit')->name('classMapping.edit');
Route::patch('classMapping/{id}', 'ClassMappingController@update')->name('classMapping.update');

//---Religion---------------
Route::get('/religion/index', 'ReligionController@index')->name('religion.index');
Route::get('/religion/create', 'ReligionController@create')->name('religion.create');
Route::post('/religion/store', 'ReligionController@store')->name('religion.store');
Route::get('/religion/list', 'ReligionController@list')->name('religion.list');
Route::post('/religion/destroy', 'ReligionController@destroy')->name('religion.destroy');
Route::get('religion/{id}', 'ReligionController@edit')->name('religion.edit');
Route::patch('religion/{id}', 'ReligionController@update')->name('religion.update');

//---CasteCategory---------------
Route::get('/casteCategory/index', 'CasteCategoryController@index')->name('casteCategory.index');
Route::get('/casteCategory/create', 'CasteCategoryController@create')->name('casteCategory.create');
Route::post('/casteCategory/store', 'CasteCategoryController@store')->name('casteCategory.store');
Route::get('/casteCategory/list', 'CasteCategoryController@list')->name('casteCategory.list');
Route::post('/casteCategory/destroy', 'CasteCategoryController@destroy')->name('casteCategory.destroy');
Route::get('casteCategory/{id}', 'CasteCategoryController@edit')->name('casteCategory.edit');
Route::patch('casteCategory/{id}', 'CasteCategoryController@update')->name('casteCategory.update');

//---Caste---------------
Route::get('/caste/index', 'CasteController@index')->name('caste.index');
Route::get('/caste/create', 'CasteController@create')->name('caste.create');
Route::post('/caste/store', 'CasteController@store')->name('caste.store');
Route::get('/caste/list', 'CasteController@list')->name('caste.list');
Route::post('/caste/destroy', 'CasteController@destroy')->name('caste.destroy');
Route::get('caste/{id}', 'CasteController@edit')->name('caste.edit');
Route::patch('caste/{id}', 'CasteController@update')->name('caste.update');
Route::post('/caste/getCastebyReligion', 'CasteController@getCastebyReligion')->name('caste.getCastebyReligion');


//---Student---------------
Route::get('/student/index', 'StudentController@index')->name('student.index');
Route::get('/student/create', 'StudentController@create')->name('student.create');
Route::post('/student/store', 'StudentController@store')->name('student.store');
Route::get('/student/list', 'StudentController@list')->name('student.list');
Route::post('/student/destroy', 'StudentController@destroy')->name('student.destroy');
Route::get('student/{id}', 'StudentController@edit')->name('student.edit');
Route::patch('student/{id}', 'StudentController@update')->name('student.update');
