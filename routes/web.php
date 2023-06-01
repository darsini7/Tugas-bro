<?php

use Illuminate\Support\Facades\Route;

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
});

Route::resource('/posts', 'PostsController');
function generateMenuHierarchy($menus, $parent_id = 0, $indent = '') {
    $output = '';
    foreach ($menus as $menu) {
        if ($menu['parent_id'] == $parent_id) {
            $output .= $indent . '- ' . $menu['nama'] . "\n";
            $output .= generateMenuHierarchy($menus, $menu['id'], $indent . '  ');
        }
    }
    return $output;
}

$menus = [
    ['id' => 1, 'nama' => 'Menu 1', 'parent_id' => 0],
    ['id' => 2, 'nama' => 'Menu 1.1', 'parent_id' => 1],
    ['id' => 3, 'nama' => 'Menu 1.2', 'parent_id' => 1],
    ['id' => 4, 'nama' => 'Menu 2', 'parent_id' => 0],
    ['id' => 5, 'nama' => 'Menu 2.1', 'parent_id' => 4],
    ['id' => 6, 'nama' => 'Menu 2.2', 'parent_id' => 4],
    ['id' => 7, 'nama' => 'Menu 2.1.1', 'parent_id' => 5],
    ['id' => 8, 'nama' => 'Menu 3', 'parent_id' => 0],
];

$menuHierarchy = generateMenuHierarchy($menus);
echo $menuHierarchy;

