<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Auth\Database\Menu;
use Illuminate\Support\Facades\Hash;

class AdminTablesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // create a user.
    Administrator::truncate();
    Administrator::create([
      'username' => 'admin',
      'password' => Hash::make('admin'),
      'name'     => '管理者',
    ]);

    // create a role.
    Role::truncate();
    Role::create([
      'name' => 'Administrator',
      'slug' => 'administrator',
    ]);

    // add role to user.
    Administrator::first()->roles()->save(Role::first());

    Administrator::create([
      'username' => 'shop.members',
      'password' => Hash::make('shop.members'),
      'name'     => '店舗代表者',
    ]);

    // create a role.
    Role::create([
      'name' => 'Shopmembers',
      'slug' => 'shop.members',
    ]);

    // add role to user.
    Administrator::find(2)->roles()->save(Role::find(2));

    //create a permission
    Permission::truncate();
    Permission::insert([
      [
        'name'        => 'All permission',
        'slug'        => '*',
        'http_method' => '',
        'http_path'   => '*',
      ],
      [
        'name'        => 'Dashboard',
        'slug'        => 'dashboard',
        'http_method' => 'GET',
        'http_path'   => '/',
      ],
      [
        'name'        => 'Login',
        'slug'        => 'auth.login',
        'http_method' => '',
        'http_path'   => "/auth/login\r\n/auth/logout",
      ],
      [
        'name'        => 'User setting',
        'slug'        => 'auth.setting',
        'http_method' => 'GET,PUT',
        'http_path'   => '/auth/setting',
      ],
      [
        'name'        => 'Auth management',
        'slug'        => 'auth.management',
        'http_method' => '',
        'http_path'   => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
      ],
      [
        'name'        => 'Shop members',
        'slug'        => 'shop.members',
        'http_method' => '',
        'http_path'   => "/shops*\r\n/reservations*",
      ],
    ]);

    Role::first()->permissions()->save(Permission::first());
    Role::find(2)->permissions()->save(Permission::find(6));


    // add default menus.
    Menu::truncate();
    Menu::insert([
      [
        'parent_id' => 0,
        'order'     => 1,
        'title'     => 'Dashboard',
        'icon'      => 'fa-bar-chart',
        'uri'       => '/',
      ],
      [
        'parent_id' => 0,
        'order'     => 2,
        'title'     => 'Admin',
        'icon'      => 'fa-tasks',
        'uri'       => '',
      ],
      [
        'parent_id' => 0,
        'order'     => 3,
        'title'     => '店舗',
        'icon'      => 'fa-home',
        'uri'       => '/shops',
      ],
      [
        'parent_id' => 0,
        'order'     => 4,
        'title'     => '予約',
        'icon'      => 'fa-calendar-check-o',
        'uri'       => '/reservations',
      ],
      [
        'parent_id' => 0,
        'order'     => 5,
        'title'     => '利用者',
        'icon'      => 'fa-user',
        'uri'       => '/users',
      ],
      [
        'parent_id' => 2,
        'order'     => 3,
        'title'     => 'Users',
        'icon'      => 'fa-users',
        'uri'       => 'auth/users',
      ],
      [
        'parent_id' => 2,
        'order'     => 4,
        'title'     => 'Roles',
        'icon'      => 'fa-user',
        'uri'       => 'auth/roles',
      ],
      [
        'parent_id' => 2,
        'order'     => 5,
        'title'     => 'Permission',
        'icon'      => 'fa-ban',
        'uri'       => 'auth/permissions',
      ],
      [
        'parent_id' => 2,
        'order'     => 6,
        'title'     => 'Menu',
        'icon'      => 'fa-bars',
        'uri'       => 'auth/menu',
      ],
      [
        'parent_id' => 2,
        'order'     => 7,
        'title'     => 'Operation log',
        'icon'      => 'fa-history',
        'uri'       => 'auth/logs',
      ],
    ]);

    // add role to menu.
    Menu::find(2)->roles()->save(Role::first());
  }
}
