<?php

namespace App\Admin\Controllers;

use App\Models\Reservation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;

class ReservationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '予約';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reservation());

        $grid->id('id')->sortable();
        $grid->user()->name('ユーザー名')->sortable();
        $grid->shop()->name('店名')->sortable();
        $grid->column('started_at', '予約日')->display(function () {
            return Carbon::parse($this->started_at)->format('Y/m/d/ H:i');
        })->sortable();
        $grid->num_of_users('人数')->sortable();
        $grid->created_at('作成日')->display(function () {
            return Carbon::parse($this->started_at)->format('Y/m/d/ H:i');
        })->sortable();
        $grid->updated_at('更新日')->display(function () {
            return Carbon::parse($this->started_at)->format('Y/m/d/ H:i');
        })->sortable();

        // $grid->filter(function ($filter) {
        //     $filter->like('user_id');
        //     $filter->like('shop_id', '店名');
        //     $filter->between('started_at', '予約日')->datetime();
        // });
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
        $show = new Show(Reservation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('shop_id', __('Shop id'));
        $show->field('started_at', __('Started at'));
        $show->field('num_of_users', __('Num of users'));
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
        $form = new Form(new Reservation());

        $form->number('user_id', __('User id'));
        $form->number('shop_id', __('Shop id'));
        $form->datetime('started_at', __('Started at'))->default(date('Y-m-d H:i:s'));
        $form->number('num_of_users', __('Num of users'));

        return $form;
    }
}