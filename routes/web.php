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

Route::get('/map', function () {
    return view('home.maps.olview');
})->name('home.map');

Route::get('/gwreport','MapsController@gwreport')->name('maps.gwreport.view');
Route::get('/swreport','MapsController@swreport')->name('maps.swreport.view');
Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/faq', function () {
    return view('home.pages.faq');
})->name('home.faq');

Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
Route::get('/admin','AdminController@admin')->name('admin');
Route::group(
    [
        'prefix' => 'layer_groups',
    ], function () {

    Route::get('/', 'LayerGroupsController@index')
        ->name('layer_groups.layer_group.index');

    Route::get('/create','LayerGroupsController@create')
        ->name('layer_groups.layer_group.create');

    Route::get('/show/{layerGroup}','LayerGroupsController@show')
        ->name('layer_groups.layer_group.show')
        ->where('id', '[0-9]+');

    Route::get('/{layerGroup}/edit','LayerGroupsController@edit')
        ->name('layer_groups.layer_group.edit')
        ->where('id', '[0-9]+');

    Route::post('/', 'LayerGroupsController@store')
        ->name('layer_groups.layer_group.store');

    Route::put('layer_group/{layerGroup}', 'LayerGroupsController@update')
        ->name('layer_groups.layer_group.update')
        ->where('id', '[0-9]+');

    Route::delete('/layer_group/{layerGroup}','LayerGroupsController@destroy')
        ->name('layer_groups.layer_group.destroy')
        ->where('id', '[0-9]+');


});

Route::group(
    [
        'prefix' => 'projections',
    ], function () {

    Route::get('/', 'ProjectionsController@index')
        ->name('projections.projection.index');

    Route::get('/create','ProjectionsController@create')
        ->name('projections.projection.create');

    Route::get('/show/{projection}','ProjectionsController@show')
        ->name('projections.projection.show')
        ->where('id', '[0-9]+');

    Route::get('/{projection}/edit','ProjectionsController@edit')
        ->name('projections.projection.edit')
        ->where('id', '[0-9]+');

    Route::post('/', 'ProjectionsController@store')
        ->name('projections.projection.store');

    Route::put('projection/{projection}', 'ProjectionsController@update')
        ->name('projections.projection.update')
        ->where('id', '[0-9]+');

    Route::delete('/projection/{projection}','ProjectionsController@destroy')
        ->name('projections.projection.destroy')
        ->where('id', '[0-9]+');

});

Route::group(
    [
        'prefix' => 'maps',
    ], function () {

    Route::get('/', 'MapsController@index')
        ->name('maps.map.index');

    Route::get('/create','MapsController@create')
        ->name('maps.map.create');

    Route::get('/show/{map}','MapsController@show')
        ->name('maps.map.show')
        ->where('id', '[0-9]+');

    Route::get('/view/{map}','MapsController@view')
        ->name('maps.map.view')
        ->where('id', '[0-9]+');

    Route::get('/{map}/edit','MapsController@edit')
        ->name('maps.map.edit')
        ->where('id', '[0-9]+');

    Route::post('/', 'MapsController@store')
        ->name('maps.map.store');

    Route::put('map/{map}', 'MapsController@update')
        ->name('maps.map.update')
        ->where('id', '[0-9]+');

    Route::delete('/map/{map}','MapsController@destroy')
        ->name('maps.map.destroy')
        ->where('id', '[0-9]+');

    Route::get('/gwmap', 'MapsController@gwmap')
        ->name('maps.map.gwmap');

    Route::get('/swmap', 'MapsController@swmap')
        ->name('maps.map.swmap');

    Route::get('/hanhchinh', 'MapsController@hanhchinhmap')
        ->name('maps.map.hanhchinh');

    Route::get('/diahinh', 'MapsController@diahinhmap')
        ->name('maps.map.diahinh');

    Route::get('/diachat', 'MapsController@diachatmap')
        ->name('maps.map.diachat');

    Route::get('/tainguyennuocmat', 'MapsController@tainguyennuocmat')
        ->name('maps.map.tainguyennuocmat');

    Route::get('/tainguyenndd', 'MapsController@tainguyenndd')
        ->name('maps.map.tainguyenndd');

    Route::get('/tainguyennuocmua', 'MapsController@tainguyennuocmua')
        ->name('maps.map.tainguyennuocmua');

    Route::get('/quantracktnm', 'MapsController@quantracktnm')
        ->name('maps.map.quantracktnm');

    Route::get('/quantracktndd', 'MapsController@quantracktndd')
        ->name('maps.map.quantracktndd');

    Route::get('/quantracxathai', 'MapsController@quantracxathai')
        ->name('maps.map.quantracxathai');

    Route::get('/diachatthuyvan', 'MapsController@diachatthuyvanmap')
        ->name('maps.map.diachatthuyvan');

    Route::get('/luuvucsong', 'MapsController@luuvucsong')
        ->name('maps.map.luuvucsong');

    Route::get('/quantracmua', 'MapsController@quantracmua')
        ->name('maps.map.quantracmua');
});

Route::group(
    [
        'prefix' => 'ollayers',
    ], function () {

    Route::get('/', 'OllayersController@index')
        ->name('ollayers.ollayer.index');

    Route::get('/create','OllayersController@create')
        ->name('ollayers.ollayer.create');

    Route::get('/show/{ollayer}','OllayersController@show')
        ->name('ollayers.ollayer.show')
        ->where('id', '[0-9]+');

    Route::get('/{ollayer}/edit','OllayersController@edit')
        ->name('ollayers.ollayer.edit')
        ->where('id', '[0-9]+');

    Route::post('/', 'OllayersController@store')
        ->name('ollayers.ollayer.store');

    Route::put('ollayer/{ollayer}', 'OllayersController@update')
        ->name('ollayers.ollayer.update')
        ->where('id', '[0-9]+');

    Route::delete('/ollayer/{ollayer}','OllayersController@destroy')
        ->name('ollayers.ollayer.destroy')
        ->where('id', '[0-9]+');

});


Route::group(
    [
        'prefix' => 'articles',
    ], function () {

    Route::get('/', 'ArticlesController@index')
        ->name('articles.article.index');

    Route::get('/category/{category}','ArticlesController@articlesByCategory')
        ->name('articles.article.category')
        ->where('id', '[0-9]+');

    Route::get('/create','ArticlesController@create')
        ->name('articles.article.create');

    Route::get('/show/{article}','ArticlesController@show')
        ->name('articles.article.show')
        ->where('id', '[0-9]+');

    Route::get('/view/{article}','ArticlesController@view')
        ->name('articles.article.view')
        ->where('id', '[0-9]+');

    Route::get('/{article}/edit','ArticlesController@edit')
        ->name('articles.article.edit')
        ->where('id', '[0-9]+');

    Route::post('/', 'ArticlesController@store')
        ->name('articles.article.store');

    Route::put('article/{article}', 'ArticlesController@update')
        ->name('articles.article.update')
        ->where('id', '[0-9]+');

    Route::delete('/article/{article}','ArticlesController@destroy')
        ->name('articles.article.destroy')
        ->where('id', '[0-9]+');

    Route::get('/{id}/cat','ArticlesController@cat')
        ->name('articles.article.cat')
        ->where('id', '[0-9]+');

    Route::get('/ajax_network_swreport_sidebar', 'ArticlesController@ajax_network_swreport_sidebar')
        ->name('articles.article.ajax_network_swreport_sidebar');

    Route::get('/ajax_basin_swreport_sidebar', 'ArticlesController@ajax_basin_swreport_sidebar')
        ->name('articles.article.ajax_basin_swreport_sidebar');

    Route::get('/ajax_network_gwreport_sidebar', 'ArticlesController@ajax_network_gwreport_sidebar')
        ->name('articles.article.ajax_network_gwreport_sidebar');

    Route::get('/ajax_basin_gwreport_sidebar', 'ArticlesController@ajax_basin_gwreport_sidebar')
        ->name('articles.article.ajax_basin_gwreport_sidebar');
});

Route::group(
    [
        'prefix' => 'categories',
    ], function () {

    Route::get('/', 'CategoriesController@index')
        ->name('categories.category.index');

    Route::get('/create','CategoriesController@create')
        ->name('categories.category.create');

    Route::get('/show/{category}','CategoriesController@show')
        ->name('categories.category.show')
        ->where('id', '[0-9]+');

    Route::get('/view/{category}','CategoriesController@view')
        ->name('categories.category.view')
        ->where('id', '[0-9]+');

    Route::get('/{category}/edit','CategoriesController@edit')
        ->name('categories.category.edit')
        ->where('id', '[0-9]+');

    Route::post('/', 'CategoriesController@store')
        ->name('categories.category.store');

    Route::put('category/{category}', 'CategoriesController@update')
        ->name('categories.category.update')
        ->where('id', '[0-9]+');

    Route::delete('/category/{category}','CategoriesController@destroy')
        ->name('categories.category.destroy')
        ->where('id', '[0-9]+');

});



//Route::group(
//[
//    'prefix' => 'roles',
//], function () {
//
//    Route::get('/', 'RolesController@index')
//         ->name('roles.role.index');
//
//    Route::get('/create','RolesController@create')
//         ->name('roles.role.create');
//
//    Route::get('/show/{role}','RolesController@show')
//         ->name('roles.role.show')
//         ->where('id', '[0-9]+');
//
//    Route::get('/{role}/edit','RolesController@edit')
//         ->name('roles.role.edit')
//         ->where('id', '[0-9]+');
//
//    Route::post('/', 'RolesController@store')
//         ->name('roles.role.store');
//
//    Route::put('role/{role}', 'RolesController@update')
//         ->name('roles.role.update')
//         ->where('id', '[0-9]+');
//
//    Route::put('role_permissions/{role}', 'RolesController@update_permissions')
//        ->name('roles.role.update_permissions')
//        ->where('id', '[0-9]+');
//
//    Route::delete('/role/{role}','RolesController@destroy')
//         ->name('roles.role.destroy')
//         ->where('id', '[0-9]+');
//
//});

//Route::group(
//[
//    'prefix' => 'permissions',
//], function () {
//
//    Route::get('/', 'PermissionsController@index')
//         ->name('permissions.permission.index');
//
//    Route::get('/create','PermissionsController@create')
//         ->name('permissions.permission.create');
//
//    Route::get('/show/{permission}','PermissionsController@show')
//         ->name('permissions.permission.show')
//         ->where('id', '[0-9]+');
//
//    Route::get('/{permission}/edit','PermissionsController@edit')
//         ->name('permissions.permission.edit')
//         ->where('id', '[0-9]+');
//
//    Route::post('/', 'PermissionsController@store')
//         ->name('permissions.permission.store');
//
//    Route::put('permission/{permission}', 'PermissionsController@update')
//         ->name('permissions.permission.update')
//         ->where('id', '[0-9]+');
//
//    Route::delete('/permission/{permission}','PermissionsController@destroy')
//         ->name('permissions.permission.destroy')
//         ->where('id', '[0-9]+');
//
//});

//Route::group(
//[
//    'prefix' => 'users',
//], function () {
//
//    Route::get('/', 'UsersController@index')
//         ->name('users.user.index');
//
//    Route::get('/create','UsersController@create')
//         ->name('users.user.create');
//
//    Route::get('/show/{user}','UsersController@show')
//         ->name('users.user.show')
//         ->where('id', '[0-9]+');
//
//    Route::get('/{user}/edit','UsersController@edit')
//         ->name('users.user.edit')
//         ->where('id', '[0-9]+');
//
//    Route::post('/', 'UsersController@store')
//         ->name('users.user.store');
//
//    Route::put('user/{user}', 'UsersController@update')
//         ->name('users.user.update')
//         ->where('id', '[0-9]+');
//
//    Route::delete('/user/{user}','UsersController@destroy')
//         ->name('users.user.destroy')
//         ->where('id', '[0-9]+');
//
//});


Route::group(
    [
        'prefix' => 'wells',
    ], function () {

    Route::get('/','MonitoringWellController@index')
        ->name('wells.well.index');

    Route::get('/network/{network}','MonitoringWellController@wellsByNetwork')
        ->name('wells.well.network')
        ->where('id', '[0-9]+');

    Route::get('/well/{well}','MonitoringWellController@show')
        ->name('wells.well.show')
        ->where('id', '[0-9]+');

    Route::get('/{well}/general_info','MonitoringWellController@show_general_info')
        ->name('wells.well.show_general_info')
        ->where('id', '[0-9]+');

    Route::get('/{well}/history_depth','MonitoringWellController@show_history_depth')
        ->name('wells.well.show_history_depth')
        ->where('id', '[0-9]+');

    Route::get('/{well}/structure_lithology','MonitoringWellController@show_structure_lithology')
        ->name('wells.well.show_structure_lithology')
        ->where('id', '[0-9]+');

    Route::get('/{well}/water_level','MonitoringWellController@show_water_level')
        ->name('wells.well.show_water_level')
        ->where('id', '[0-9]+');

    Route::get('/{well}/water_temperature','MonitoringWellController@show_water_temperature')
        ->name('wells.well.show_water_temperature')
        ->where('id', '[0-9]+');

    Route::get('/{well}/water_chemistry','MonitoringWellController@show_water_chemistry')
        ->name('wells.well.show_water_chemistry')
        ->where('id', '[0-9]+');

    Route::get('/ajax_well_list', 'MonitoringWellController@well_list_ajax')
        ->name('wells.well.ajax_well_list');

    Route::get('/ajax_well_search', 'MonitoringWellController@well_list_auto_complete')
        ->name('wells.well.ajax_well_search');

    Route::get('/ajax', 'MonitoringWellController@well_ajax')
        ->name('wells.well.ajax');

    Route::get('/ajax_content', 'MonitoringWellController@well_ajax_content')
        ->name('wells.well.ajax_content');

    Route::get('/ajax_wl', 'MonitoringWellController@well_ajax_water_level')
        ->name('wells.well.ajax_wl');

    Route::get('/ajax_wt', 'MonitoringWellController@well_ajax_water_temperature')
        ->name('wells.well.ajax_wt');

    Route::get('/ajax_well_location', 'MonitoringWellController@well_ajax_location')
        ->name('wells.well.ajax_well_location');

    Route::get('/ajax_network_wells_sidebar', 'MonitoringWellController@ajax_network_wells_sidebar')
        ->name('wells.well.ajax_network_wells_sidebar');
});




Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

Route::group(
[
    'prefix' => 'basins',
], function () {

    Route::get('/basin_feature', 'RiverBasinsController@ajax_river_basin_feature')
        ->name('basins.basin.basin_feature');

    Route::get('/', 'RiverBasinsController@index')
         ->name('basins.basin.index');

    Route::get('/create','RiverBasinsController@create')
         ->name('basins.basin.create');

    Route::get('/show/{riverBasin}','RiverBasinsController@show')
         ->name('basins.basin.show')
         ->where('id', '[0-9]+');

    Route::get('/{riverBasin}/edit','RiverBasinsController@edit')
         ->name('basins.basin.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'RiverBasinsController@store')
         ->name('basins.basin.store');
               
    Route::put('river_basin/{riverBasin}', 'RiverBasinsController@update')
         ->name('basins.basin.update')
         ->where('id', '[0-9]+');

    Route::delete('/river_basin/{riverBasin}','RiverBasinsController@destroy')
         ->name('basins.basin.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'networks',
], function () {
    Route::get('/network_feature', 'MonitoringNetworksController@ajax_network_feature')
        ->name('networks.network.network_feature');

    Route::get('/', 'MonitoringNetworksController@index')
         ->name('networks.network.index');

    Route::get('/create','MonitoringNetworksController@create')
         ->name('networks.network.create');

    Route::get('/show/{monitoringNetwork}','MonitoringNetworksController@show')
         ->name('networks.network.show')
         ->where('id', '[0-9]+');

    Route::get('/{monitoringNetwork}/edit','MonitoringNetworksController@edit')
         ->name('networks.network.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'MonitoringNetworksController@store')
         ->name('networks.network.store');
               
    Route::put('networks/{monitoringNetwork}', 'MonitoringNetworksController@update')
         ->name('networks.network.update')
         ->where('id', '[0-9]+');

    Route::delete('/networks/{monitoringNetwork}','MonitoringNetworksController@destroy')
         ->name('networks.network.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'monitoring_lines',
], function () {

    Route::get('/', 'MonitoringLinesController@index')
         ->name('monitoring_lines.monitoring_line.index');

    Route::get('/create','MonitoringLinesController@create')
         ->name('monitoring_lines.monitoring_line.create');

    Route::get('/show/{monitoringLine}','MonitoringLinesController@show')
         ->name('monitoring_lines.monitoring_line.show')
         ->where('id', '[0-9]+');

    Route::get('/{monitoringLine}/edit','MonitoringLinesController@edit')
         ->name('monitoring_lines.monitoring_line.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'MonitoringLinesController@store')
         ->name('monitoring_lines.monitoring_line.store');
               
    Route::put('monitoring_line/{monitoringLine}', 'MonitoringLinesController@update')
         ->name('monitoring_lines.monitoring_line.update')
         ->where('id', '[0-9]+');

    Route::delete('/monitoring_line/{monitoringLine}','MonitoringLinesController@destroy')
         ->name('monitoring_lines.monitoring_line.destroy')
         ->where('id', '[0-9]+');

});
Route::group(
[
    'prefix' => 'swstations',
], function () {

    Route::get('/', 'SurfacewaterStationsController@index')
         ->name('swstations.station.index');

    Route::get('/create','SurfacewaterStationsController@create')
         ->name('swstations.station.create');

    Route::get('/show/{surfacewaterStation}','SurfacewaterStationsController@show')
         ->name('swstations.station.show')
         ->where('id', '[0-9]+');

    Route::get('/{surfacewaterStation}/edit','SurfacewaterStationsController@edit')
         ->name('swstations.station.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'SurfacewaterStationsController@store')
         ->name('swstations.surfacewater_station.store');
               
    Route::put('surfacewater_station/{surfacewaterStation}', 'SurfacewaterStationsController@update')
         ->name('swstations.station.update')
         ->where('id', '[0-9]+');

    Route::delete('/surfacewater_station/{surfacewaterStation}','SurfacewaterStationsController@destroy')
         ->name('swstations.station.destroy')
         ->where('id', '[0-9]+');

    Route::get('/ajax_wl', 'SurfacewaterStationsController@sw_ajax_water_level')
        ->name('swstations.station.ajax_wl');

    Route::get('/ajax_wf', 'SurfacewaterStationsController@sw_ajax_water_flow')
        ->name('swstations.station.ajax_wf');

    Route::get('/{surfacewaterStation}/general_info','SurfacewaterStationsController@show_general_info')
        ->name('swstations.station.show_general_info')
        ->where('id', '[0-9]+');

    Route::get('/{surfacewaterStation}/water_level','SurfacewaterStationsController@show_water_level')
        ->name('swstations.station.show_water_level')
        ->where('id', '[0-9]+');

    Route::get('/{surfacewaterStation}/water_capacity','SurfacewaterStationsController@show_water_capacity')
        ->name('swstations.station.show_water_capacity')
        ->where('id', '[0-9]+');

    Route::get('/{surfacewaterStation}/water_chemistry','SurfacewaterStationsController@show_water_chemistry')
        ->name('swstations.station.show_water_chemistry')
        ->where('id', '[0-9]+');
});

Route::group(
[
    'prefix' => 'rainstations',
], function () {

    Route::get('/', 'TramdomuasController@index')
         ->name('tramdomuas.tramdomua.index');

    Route::get('/create','TramdomuasController@create')
         ->name('tramdomuas.tramdomua.create');

    Route::get('/show/{tramdomua}','TramdomuasController@show')
         ->name('tramdomuas.tramdomua.show')
         ->where('id', '[0-9]+');

    Route::get('/{tramdomua}/edit','TramdomuasController@edit')
         ->name('tramdomuas.tramdomua.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'TramdomuasController@store')
         ->name('tramdomuas.tramdomua.store');
               
    Route::put('rainstation/{tramdomua}', 'TramdomuasController@update')
         ->name('tramdomuas.tramdomua.update')
         ->where('id', '[0-9]+');

    Route::delete('/rainstation/{tramdomua}','TramdomuasController@destroy')
         ->name('tramdomuas.tramdomua.destroy')
         ->where('id', '[0-9]+');

    Route::get('/ajax_rainfall', 'TramdomuasController@rf_ajax_rainfall')
        ->name('tramdomuas.tramdomua.ajax_rainfall');

    Route::get('/{tramdomua}/general_info','TramdomuasController@show_general_info')
        ->name('tramdomuas.tramdomua.show_general_info')
        ->where('id', '[0-9]+');

    Route::get('/{tramdomua}/rainfall','TramdomuasController@show_rainfall')
        ->name('tramdomuas.tramdomua.show_rainfall')
        ->where('id', '[0-9]+');

});
Route::group(
[
    'prefix' => 'meteorology_stations',
], function () {


    Route::get('/', 'MeteorologyStationsController@index')
         ->name('meteorology_stations.meteorology_station.index');

    Route::get('/create','MeteorologyStationsController@create')
         ->name('meteorology_stations.meteorology_station.create');

    Route::get('/show/{meteorologyStation}','MeteorologyStationsController@show')
         ->name('meteorology_stations.meteorology_station.show')
         ->where('id', '[0-9]+');

    Route::get('/{meteorologyStation}/edit','MeteorologyStationsController@edit')
         ->name('meteorology_stations.meteorology_station.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'MeteorologyStationsController@store')
         ->name('meteorology_stations.meteorology_station.store');
               
    Route::put('meteorology_station/{meteorologyStation}', 'MeteorologyStationsController@update')
         ->name('meteorology_stations.meteorology_station.update')
         ->where('id', '[0-9]+');

    Route::delete('/meteorology_station/{meteorologyStation}','MeteorologyStationsController@destroy')
         ->name('meteorology_stations.meteorology_station.destroy')
         ->where('id', '[0-9]+');

    Route::get('/{meteorologyStation}/general_info','MeteorologyStationsController@show_general_info')
        ->name('meteorology_stations.meteorology_station.show_general_info')
        ->where('id', '[0-9]+');

    Route::get('/{meteorologyStation}/rainfall','MeteorologyStationsController@show_rainfall')
        ->name('meteorology_stations.meteorology_station.show_rainfall')
        ->where('id', '[0-9]+');

    Route::get('/{meteorologyStation}/airtemperature','MeteorologyStationsController@show_air_temperature')
        ->name('meteorology_stations.meteorology_station.show_air_temperature')
        ->where('id', '[0-9]+');

    Route::get('/{meteorologyStation}/evaporation','MeteorologyStationsController@show_evaporation')
        ->name('meteorology_stations.meteorology_station.show_evaporation')
        ->where('id', '[0-9]+');

    Route::get('/{meteorologyStation}/humidity','MeteorologyStationsController@show_humidity')
        ->name('meteorology_stations.meteorology_station.show_humidity')
        ->where('id', '[0-9]+');

    Route::get('/{meteorologyStation}/sunny','MeteorologyStationsController@show_sunny')
        ->name('meteorology_stations.meteorology_station.show_sunny')
        ->where('id', '[0-9]+');

    Route::get('/{meteorologyStation}/windy','MeteorologyStationsController@show_windy')
        ->name('meteorology_stations.meteorology_station.show_windy')
        ->where('id', '[0-9]+');

    Route::get('/ajax_eva', 'MeteorologyStationsController@ajax_eva')
        ->name('meteorology_stations.meteorology_station.ajax_eva');

    Route::get('/ajax_air_temperature', 'MeteorologyStationsController@ajax_air_temperature')
        ->name('meteorology_stations.meteorology_station.ajax_air_temperature');

    Route::get('/ajax_humi', 'MeteorologyStationsController@ajax_humi')
        ->name('meteorology_stations.meteorology_station.ajax_humi');

    Route::get('/ajax_sunny', 'MeteorologyStationsController@ajax_sunny')
        ->name('meteorology_stations.meteorology_station.ajax_sunny');

    Route::get('/ajax_windy', 'MeteorologyStationsController@ajax_windy')
        ->name('meteorology_stations.meteorology_station.ajax_windy');

});
Route::group(
[
    'prefix' => 'gw_exploitations',
], function () {

    Route::get('/', 'GwExploitationsController@index')
         ->name('gw_exploitations.gw_exploitation.index');

    Route::get('/create','GwExploitationsController@create')
         ->name('gw_exploitations.gw_exploitation.create');

    Route::get('/show/{gwExploitation}','GwExploitationsController@show')
         ->name('gw_exploitations.gw_exploitation.show')
         ->where('id', '[0-9]+');

    Route::get('/{gwExploitation}/edit','GwExploitationsController@edit')
         ->name('gw_exploitations.gw_exploitation.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'GwExploitationsController@store')
         ->name('gw_exploitations.gw_exploitation.store');
               
    Route::put('gw_exploitation/{gwExploitation}', 'GwExploitationsController@update')
         ->name('gw_exploitations.gw_exploitation.update')
         ->where('id', '[0-9]+');

    Route::delete('/gw_exploitation/{gwExploitation}','GwExploitationsController@destroy')
         ->name('gw_exploitations.gw_exploitation.destroy')
         ->where('id', '[0-9]+');

    Route::get('/{gwExploitation}/general_info','GwExploitationsController@show_general_info')
        ->name('gw_exploitations.gw_exploitation.show_general_info')
        ->where('id', '[0-9]+');

    Route::get('/{gwExploitation}/water_level','GwExploitationsController@show_exploitation_wl')
        ->name('gw_exploitations.gw_exploitation.show_exploitation_wl')
        ->where('id', '[0-9]+');

    Route::get('/{gwExploitation}/volume','GwExploitationsController@show_exploitation_vl')
        ->name('gw_exploitations.gw_exploitation.show_exploitation_vl')
        ->where('id', '[0-9]+');

    Route::get('/ajax_wl', 'GwExploitationsController@ex_ajax_wl')
        ->name('gw_exploitations.gw_exploitation.ajax_wl');

    Route::get('/ajax_vl', 'GwExploitationsController@ex_ajax_vl')
        ->name('gw_exploitations.gw_exploitation.ajax_vl');
});

Route::group(
[
    'prefix' => 'hy_exploitations',
], function () {

    Route::get('/', 'HyExploitationsController@index')
         ->name('hy_exploitations.hy_exploitation.index');

    Route::get('/create','HyExploitationsController@create')
         ->name('hy_exploitations.hy_exploitation.create');

    Route::get('/show/{hyExploitation}','HyExploitationsController@show')
         ->name('hy_exploitations.hy_exploitation.show')
         ->where('id', '[0-9]+');

    Route::get('/{hyExploitation}/edit','HyExploitationsController@edit')
         ->name('hy_exploitations.hy_exploitation.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'HyExploitationsController@store')
         ->name('hy_exploitations.hy_exploitation.store');
               
    Route::put('hy_exploitation/{hyExploitation}', 'HyExploitationsController@update')
         ->name('hy_exploitations.hy_exploitation.update')
         ->where('id', '[0-9]+');

    Route::delete('/hy_exploitation/{hyExploitation}','HyExploitationsController@destroy')
         ->name('hy_exploitations.hy_exploitation.destroy')
         ->where('id', '[0-9]+');

    Route::get('/{hyExploitation}/general_info','HyExploitationsController@show_general_info')
        ->name('hy_exploitations.hy_exploitation.show_general_info')
        ->where('id', '[0-9]+');

    Route::get('/{hyExploitation}/water_level','HyExploitationsController@show_exploitation_wl')
        ->name('hy_exploitations.hy_exploitation.show_exploitation_wl')
        ->where('id', '[0-9]+');

    Route::get('/{hyExploitation}/volume','HyExploitationsController@show_exploitation_vl')
        ->name('hy_exploitations.hy_exploitation.show_exploitation_vl')
        ->where('id', '[0-9]+');

    Route::get('/ajax_wl', 'HyExploitationsController@ex_ajax_wl')
        ->name('hy_exploitations.hy_exploitation.ajax_wl');

    Route::get('/ajax_vl', 'HyExploitationsController@ex_ajax_vl')
        ->name('hy_exploitations.hy_exploitation.ajax_vl');

});

Route::group(
[
    'prefix' => 'waste_waters',
], function () {

    Route::get('/', 'WasteWatersController@index')
         ->name('waste_waters.waste_water.index');

    Route::get('/create','WasteWatersController@create')
         ->name('waste_waters.waste_water.create');

    Route::get('/show/{wasteWater}','WasteWatersController@show')
         ->name('waste_waters.waste_water.show')
         ->where('id', '[0-9]+');

    Route::get('/{wasteWater}/edit','WasteWatersController@edit')
         ->name('waste_waters.waste_water.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'WasteWatersController@store')
         ->name('waste_waters.waste_water.store');
               
    Route::put('waste_water/{wasteWater}', 'WasteWatersController@update')
         ->name('waste_waters.waste_water.update')
         ->where('id', '[0-9]+');

    Route::delete('/waste_water/{wasteWater}','WasteWatersController@destroy')
         ->name('waste_waters.waste_water.destroy')
         ->where('id', '[0-9]+');

    Route::get('/{wasteWater}/general_info','WasteWatersController@show_general_info')
        ->name('waste_waters.waste_water.show_general_info')
        ->where('id', '[0-9]+');

    Route::get('/{wasteWater}/volume','WasteWatersController@show_discharge_vl')
        ->name('waste_waters.waste_water.show_discharge_vl')
        ->where('id', '[0-9]+');

    Route::get('/ajax_vl', 'WasteWatersController@ww_ajax_vl')
        ->name('waste_waters.waste_water.ww_ajax_vl');

});








Route::get('/van-ban-phap',[
    'as'=>'uploadfile',
    'uses'=>'ControllerUploadfile@viewuploadfile'
]);

Route::prefix('van-ban-phap-quy')->group(function () {

            Route::get('/',[
                'as'=>'danhsachvanban',
                'uses'=>'ControllerVanbanphapquy@index'
            ]);
              Route::post('/tim-kiem',[
                'as'=>'search',
                'uses'=>'ControllerVanbanphapquy@search'
            ]);
                 Route::get('/chi-tiet/{id}',[
                'as'=>'chitiet',
                'uses'=>'ControllerVanbanphapquy@chitiet'
            ]);
                 Route::get('/tai-ve-may/{file}',[
                    'as'=>'taive',
                    'uses'=>'ControllerVanbanphapquy@taive'
            ]);
  });

Route::prefix('quan-trac-nuoc-duoi-dat')->group(function () {

        Route::get('/',[
                'as'=>'danhsachquantracnuocduoidat',
                'uses'=>'Controllerquantrac@index'
            ]); 

            
            Route::get('/quan-trac-nuoc-theo-vung',[
                'as'=>'quantracnuocduoidattheovung',
                'uses'=>'Controllerquantrac@quantracnuocduoidattheovung'
            ]);



            Route::get('/{id}',[
                'as'=>'chitiethquantracnuocduoidat',
                'uses'=>'Controllerquantrac@chitiet'
            ]);
             
                Route::get('/muc-nuoc/{id}',[
                'as'=>'chitietmucnuoc',
                'uses'=>'Controllerquantrac@chitietmucnuoc'
            ]);
                Route::post('/bieu-do-muc-nuoc/{id}',[
                    'as'=>'bieudomucnuoc',
                    'uses'=>'Controllerquantrac@bieudomucnuoc'
                ]);
              // phần xuất file sdb
             Route::get('/xuat-du-lieu-muc-nuoc/{id}/{date}',[
              'as'=>'export',
              'uses'=>'Controllerquantrac@excel'
            ]);

             
             
  });

Route::get('/lien-he-xuat-du-lieu-muc-nuoc',[
  'as'=>'lienhedulieumucnuoc',
  'uses'=>'Controllerquantrac@lienhedulieumucnuoc'
]);

Route::post('/lien-he-xuat-du-lieu-muc-nuoc-post',[
  'as'=>'sendmail',
  'uses'=>'Controllerquantrac@sendmail'
]);

// Route::prefix('quan-trac-nuoc-duoi-dat')->group(function () {

//             Route::get('/',[
//                 'as'=>'danhsachquantracnuocduoidat',
//                 'uses'=>'Controllerquantrac@index'
//             ]);
//              Route::get('/{id}',[
//                 'as'=>'chitiethquantracnuocduoidat',
//                 'uses'=>'Controllerquantrac@chitiet'
//             ]);
//                 Route::get('/muc-nuoc/{id}',[
//                 'as'=>'chitietmucnuoc',
//                 'uses'=>'Controllerquantrac@chitietmucnuoc'
//             ]);
//                 Route::post('/bieu-do-muc-nuoc/{id}',[
//                     'as'=>'bieudomucnuoc',
//                     'uses'=>'Controllerquantrac@bieudomucnuoc'
//                 ]);
//               // phần xuất file sdb
//              Route::get('xuat-du-lieu-muc-nuoc/{id}/{date}',[
//               'as'=>'export',
//               'uses'=>'Controllerquantrac@excel'
//             ]);
//   });



Route::get('/dang-nhap',[
  'as'=>'dangnhap',
  'uses'=>'controllerQuantri@getdangnhap'
]);

Route::post('/dang-nhap-post',[
  'as'=>'dangnhappost',
  'uses'=>'controllerQuantri@dangnhappost'
]);

Route::get('/logut-dang-nhap',[
  'as'=>'logout-dang-nhap',
  'uses'=>'controllerQuantri@getlogoutdangnhap'
]);

route::group(['prefix'=>'quantri','middleware'=>'Quantri'],function(){

    Route::prefix('/quan-tri-ban-tin')->group(function () {

      Route::get('/',[
        'as'=>'quantriindex',
        'uses'=>'controllerQuantri@index',
       // 'middleware'=>'CheckAlc:use_list'
    ]);

      Route::get('/loai-ban-tin',[
        'as'=>'lisloaibantin',
        'uses'=>'controllerQuantri@lisloaibantin',
        // 'middleware'=>'CheckAlc:use_list'
    ]);

      Route::get('/ban-tin',[
        'as'=>'bantin',
        'uses'=>'controllerQuantri@bantin',
        // 'middleware'=>'CheckAlc:use_list'
    ]);

      Route::get('/them-ban-tin',[
        'as'=>'addbantin',
        'uses'=>'controllerQuantri@addbantin',
        // 'middleware'=>'CheckAlc:use_list'
    ]);

      Route::post('/them-ban-tin',[
        'as'=>'addbantinpost',
        'uses'=>'controllerQuantri@addbantinpost',
        // 'middleware'=>'CheckAlc:use_list'
    ]);

      Route::get('/xoa-ban-tin/{id}',[
        'as'=>'deletebantin',
        'uses'=>'controllerQuantri@deletebantin',
        // 'middleware'=>'CheckAlc:use_list'
    ]);


    Route::get('/sua-ban-tin/{id}',[
        'as'=>'editbantin',
        'uses'=>'controllerQuantri@editbantin',
        // 'middleware'=>'CheckAlc:use_list'
    ]);


      Route::post('/sua-ban-tin-post/{id}',[
        'as'=>'editbantinpost',
        'uses'=>'controllerQuantri@editbantinpost',
        // 'middleware'=>'CheckAlc:use_list' @nawapi123456!@#
    ]);


  });


    Route::get('/quan-tri-van-ban-phap-quy',[
        'as'=>'quantrivanbanphapquy',
        'uses'=>'controllerQuantri@vanbanphapquy',
        // 'middleware'=>'CheckAlc:use_list'
    ]);

    

    Route::post('/them-moi-van-ban',[
        'as'=>'addvanbanphapquy',
        'uses'=>'controllerQuantri@addvanbanphapquy',
        // 'middleware'=>'CheckAlc:use_list' @nawapi123456!@#
    ]);


});



Route::prefix('/xa-thai')->group(function () {

    Route::get('/',[
    'as'=>'xathaiindex',
    'uses'=>'controllerxathai@index',

]);
    
    Route::get('/chi-tiet/{id}',[
        'as'=>'xathaidetail',
        'uses'=>'controllerxathai@xathaidetail',

    ]);

});




Route::prefix('/ban-tin-canh-bao-du-bao')->group(function () {
    Route::get('/',[
    'as'=>'bantinindex',
    'uses'=>'controllerbantin@bantinindex',
    ]);
   
});


Route::prefix('/lien-he')->group(function () {
    Route::get('/',[
    'as'=>'lienhe',
    'uses'=>'controllerlienhe@lienhe',
    ]);
   
});



Route::prefix('/dang-cap-nhat')->group(function () {
    Route::get('/',[
    'as'=>'dangcapnhat',
    'uses'=>'controllerlienhe@dangcapnhat',
    ]);
   
});

