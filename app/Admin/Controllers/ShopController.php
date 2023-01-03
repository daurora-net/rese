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

        $show->field('id', __('Id'));
        $show->field('area_id', __('Area id'));
        $show->field('genre_id', __('Genre id'));
        $show->field('name', __('Name'));
        $show->field('overview', __('Overview'));
        $show->field('image_url', __('Image url'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

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

        $form->number('area_id', __('Area id'));
        $form->number('genre_id', __('Genre id'));
        $form->text('name', __('Name'));
        $form->text('overview', __('Overview'));
        $form->text('image_url', __('Image url'));

        return $form;
    }
}