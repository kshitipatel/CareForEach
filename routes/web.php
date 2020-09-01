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
	return view('welcome');
})->name('login');

Route::post('/home',[
		'uses' => 'HomeController@check',
		'as' => 'home'
]);

/*__Session management__*/
Route::get('session/get','SessionController@accessSessionData')->name('session.get');
Route::get('session/check','SessionController@checkSessionStatus')->name('session.check');
Route::get('logout','SessionController@deleteSessionData')->name('session.destroy');

Route::group(['middleware'=>['revalidate','check']],function(){
	
	/*___Employee Routes__*/
	Route::get('/employee',[
		'uses' => 'EmployeeController@index',
		'as' => 'employee.list'
	]);
	Route::get('/employee/view/{id}',[
		'uses' => 'EmployeeController@show',
		'as' => 'employee.view'
	]);
	Route::get('/employee/add',[
		'uses' => 'EmployeeController@add',
		'as' => 'employee.add'
	]);
	Route::post('/employee/store',[
		'uses' => 'EmployeeController@store',
		'as' => 'employee.store'
	]);
	Route::get('/employee/edit/{id}',[
		'uses' => 'EmployeeController@edit',
		'as' => 'employee.edit'
	]);
	Route::post('/employee/update/{id}',[
		'uses' => 'EmployeeController@update',
		'as' => 'employee.update'
	]);
	Route::get('/employee/delete/{id}',[
		'uses' => 'EmployeeController@delete',
		'as' => 'employee.delete'
	]);

	/*__Category Routes__*/
	Route::get('/category',[
		'uses' => 'CategoryController@index',
		'as' => 'category.list'
	]);
	Route::get('/category/add',[
		'uses' => 'CategoryController@add',
		'as' => 'category.add'
	]);
	Route::post('/category/store',[
		'uses' => 'CategoryController@store',
		'as' => 'category.store'
	]);
	Route::get('/category/edit/{id}',[
		'uses' => 'CategoryController@edit',
		'as' => 'category.edit'
	]);
	Route::post('/category/update/{id}',[
		'uses' => 'CategoryController@update',
		'as' => 'category.update'
	]);
	Route::get('/category/delete/{id}',[
		'uses' => 'CategoryController@delete',
		'as' => 'category.delete'
	]);



	/*__SubCategory Routes__*/
	Route::get('/subcategory',[
		'uses' => 'SubcategoryController@index',
		'as' => 'subcategory.list'
	]);
	Route::get('/subcategory/add',[
		'uses' => 'SubcategoryController@add',
		'as' => 'subcategory.add'
	]);
	Route::post('/subcategory/store',[
		'uses' => 'SubcategoryController@store',
		'as' => 'subcategory.store'
	]);
	Route::get('/subcategory/edit/{id}',[
		'uses' => 'SubcategoryController@edit',
		'as' => 'subcategory.edit'
	]);
	Route::post('/subcategory/update/{id}',[
		'uses' => 'SubcategoryController@update',
		'as' => 'subcategory.update'
	]);
	Route::get('/subcategory/delete/{id}',[
		'uses' => 'SubcategoryController@delete',
		'as' => 'subcategory.delete'
	]);



	/*__Attendance Routes__*/
	Route::get('/attendance',[
		'uses' => 'AttendanceController@index',
		'as' => 'attendance'
	]);
	Route::post('/attendance/filter',[
		'uses' => 'AttendanceController@index',
		'as' => 'attendance.pst'
	]);
	Route::get('/attendance/{id}',[
		'uses' => 'AttendanceController@loc',
		'as' => 'attendance.loc'
	]);



	/*__Visitor Routes__*/
	Route::get('/visitor',[
		'uses' => 'VisitorController@index',
		'as' => 'visitor'
	]);
	Route::post('/visitor',[
		'uses' => 'VisitorController@index',
		'as' => 'visitor.filter'
	]);
	Route::get('/visitor/view/{id}',[
		'uses' => 'VisitorController@vview',
		'as' => 'visitor.view'
	]);



	/*__Leave Routes__*/
	Route::get('/leave',[
		'uses' => 'LeaveController@index',
		'as' => 'leave'
	]);
	Route::post('/leave',[
		'uses' => 'LeaveController@index',
		'as' => 'leave.filter'
	]);
	Route::get('/leave/{id}/{status}',[
		'uses' => 'LeaveController@decision',
		'as' => 'leave.decision'
	]);



	/*__Complaint Routes__*/
	Route::get('/complaints',[
		'uses' => 'ComplaintController@index',
		'as' => 'complaint'
	]);



	/*__Order Routes__*/
	Route::get('/orders',[
		'uses' => 'OrderController@index',
		'as' => 'orders'
	]);
	Route::post('/orders',[
		'uses' => 'OrderController@index',
		'as' => 'order.filter'
	]);
	Route::get('/order/{id}',[
		'uses' => 'OrderController@oview',
		'as' => 'order.oview'
	]);
	Route::get('/products_ordered/{id}',[
		'uses' => 'OrderController@pview',
		'as' => 'order.pview'
	]);



	/*__Ginnie Box Routes__*/
	Route::get('/ginnieBox',[
		'uses' => 'GinnieBoxController@index',
		'as' => 'ginnieBox'
	]);
	Route::get('/ginnieBox/{id}',[
		'uses' => 'GinnieBoxController@gview',
		'as' => 'ginnieBox.gview'
	]);
	Route::get('/ginnieBox/export/{id}',[
		'uses' => 'GinnieBoxController@export',
		'as' => 'ginnieBox.export'
	]);



	/*__Vendor Routes__*/
	Route::get('/vendor',[
		'uses' => 'VendorController@index',
		'as' => 'vendor.list'
	]);
	Route::get('/vendor/add',[
		'uses' => 'VendorController@add',
		'as' => 'vendor.add'
	]);
	Route::post('/vendor/store',[
		'uses' => 'VendorController@store',
		'as' => 'vendor.store'
	]);
	Route::get('/vendor/edit/{id}',[
		'uses' => 'VendorController@edit',
		'as' => 'vendor.edit'
	]);
	Route::post('/vendor/update/{id}',[
		'uses' => 'VendorController@update',
		'as' => 'vendor.update'
	]);
	Route::get('/vendor/delete/{id}',[
		'uses' => 'VendorController@delete',
		'as' => 'vendor.delete'
	]);



	/*__Product Routes__*/
	Route::get('/product',[
		'uses' => 'ProductController@index',
		'as' => 'product.list'
	]);
	Route::post('/product',[
		'uses' => 'ProductController@index',
		'as' => 'product.filter'
	]);
	Route::get('/product/view/{id}',[
		'uses' => 'ProductController@show',
		'as' => 'product.view'
	]);
	Route::get('/product/add',[
		'uses' => 'ProductController@add',
		'as' => 'product.add'
	]);
	Route::post('/product/store',[
		'uses' => 'ProductController@store',
		'as' => 'product.store'
	]);
	Route::get('/product/edit/{id}',[
		'uses' => 'ProductController@edit',
		'as' => 'product.edit'
	]);
	Route::post('/product/update/{id}',[
		'uses' => 'ProductController@update',
		'as' => 'product.update'
	]);
	Route::get('/product/delete/{id}',[
		'uses' => 'ProductController@delete',
		'as' => 'product.delete'
	]);



	/*__Report Routes__*/
	Route::get('/reports',[
		'uses' => 'ReportController@index',
		'as' => 'reports'
	]);
	Route::get('/report/{name}',[
		'uses' => 'ReportController@show',
		'as' => 'report.show'
	]);
	Route::post('/report/{name}',[
		'uses' => 'ReportController@show',
		'as' => 'report.filter'
	]);
	/*Export as Excel*/
	Route::get('/report/export/{emailid}/{cdate1}/{cdate2}',[
		'uses' => 'ExportExcelController@attexport',
		'as' => 'report.export'
	]);
	Route::get('/report/visitexport/{emailid}/{cdate1}/{cdate2}',[
		'uses' => 'ExportExcelController@visitexport',
		'as' => 'report.visitexport'
	]);
	Route::get('/report/collectexport/{emailid}/{cdate1}/{cdate2}',[
		'uses' => 'ExportExcelController@collectexport',
		'as' => 'report.collectexport'
	]);
	Route::get('/report/salesexport/{emailid}/{cdate1}/{cdate2}',[
		'uses' => 'ExportExcelController@salesexport',
		'as' => 'report.salesexport'
	]);
	Route::get('/report/complaintexport/{emailid}/{cdate1}/{cdate2}',[
		'uses' => 'ExportExcelController@complaintexport',
		'as' => 'report.complaintexport'
	]);
	Route::get('/report/ginnieexport/{emailid}/{cdate1}/{cdate2}',[
		'uses' => 'ExportExcelController@ginnieexport',
		'as' => 'report.ginnieexport'
	]);
	Route::get('/report/leaveexport/{emailid}/{cdate1}/{cdate2}',[
		'uses' => 'ExportExcelController@leaveexport',
		'as' => 'report.leaveexport'
	]);
	Route::get('/report/cutomerexport/{emailid}/{cdate1}/{cdate2}',[
		'uses' => 'ExportExcelController@cutomerexport',
		'as' => 'report.cutomerexport'
	]);
	Route::get('/report/pendingcollectionexport/{emailid}/{cdate1}/{cdate2}',[
		'uses' => 'ExportExcelController@pendingcollectexport',
		'as' => 'report.pendingcollectexport'
	]);
	Route::get('/report/stockexport/{product}/{category}/{subcategory}',[
		'uses' => 'ExportExcelController@stockexport',
		'as' => 'report.stockexport'
	]);



	/*__Messages route__*/
	Route::get('/messages',[
		'uses' => 'MessageController@index',
		'as' => 'messages'
	]);
	Route::post('/messages',[
		'uses' => 'MessageController@index',
		'as' => 'messages.filter'
	]);
	Route::get('/messages/{id}',[
		'uses' => 'MessageController@chat',
		'as' => 'messages.chat'
	]);
	Route::post('/messages/{employee}',[
		'uses' => 'MessageController@send',
		'as' => 'messages.send'
	]);


	/*__Contact us Route__*/
	Route::get('/contact_us',[
		'uses' => 'ContactController@index',
		'as' => 'contact'
	]);


	/*__company profile__*/
	Route::get('/profile',[
		'uses' => 'HomeController@profile',
		'as' => 'profile'
	]);
	Route::get('/profile/changepassword/{id}',[
		'uses' => 'HomeController@changepassword',
		'as' => 'changepassword'
	]);
	Route::post('/profile/updatepassword/{id}',[
		'uses' => 'HomeController@updatepassword',
		'as' => 'updatepassword'
	]);


	/*__Dashboard__*/
	Route::get('/dashboard',[
		'uses' => 'HomeController@dashboard',
		'as' => 'dashboard'
	]);


});
