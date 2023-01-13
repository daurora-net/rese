<?php

namespace App\Admin\Controllers;

use App\Models\Shop;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;

class ShopController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '店舗';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Shop());

        $grid->id('id')->sortable();
        $grid->area()->name('地域')->sortable();
        $grid->genre()->name('ジャンル')->sortable();
        $grid->name('店舗名')->sortable();
        $grid->overview('店舗概要')->sortable();
        $grid->image_url('画像URL');
        $grid->created_at('作成日')->display(function () {
            return Carbon::parse($this->created_at)->format('Y/m/d/ H:i');
        })->sortable();
        $grid->updated_at('更新日')->display(function () {
            return Carbon::parse($this->updated_at)->format('Y/m/d/ H:i');
        })->sortable();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Shop::findOrFail($id));

        $show->id('id');
        $show->area('地域')->as(function ($area) {
            return $area->name;
        });
        $show->genre('ジャンル')->as(function ($genre) {
            return $genre->name;
        });
        $show->name('店舗名');
        $show->overview('店舗概要');
        $show->image_url('画像URL');
        $show->created_at('作成日')->as(function () {
            return Carbon::parse($this->created_at)->format('Y/m/d/ H:i');
        });
        $show->updated_at('更新日')->as(function () {
            return Carbon::parse($this->updated_at)->format('Y/m/d/ H:i');
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Shop());

        $form->text('name', '店舗名');
        $areas = [
            1  => '東京都',
            2  => '大阪府',
            3  => '福岡県',
        ];
        $form->select('area_id', '地域')->options($areas);
        $genres = [
            1  => '寿司',
            2  => '焼肉',
            3  => '居酒屋',
            4  => 'イタリアン',
            5  => 'ラーメン',
        ];
        $form->select('genre_id', 'ジャンル')->options($genres);
        $form->text('overview', '店舗概要');
        $form->text('image_url', '画像URL');

        return $form;
    }
}
