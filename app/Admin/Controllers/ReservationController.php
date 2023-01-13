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
        $show = new Show(Reservation::findOrFail($id));

        $show->id('id');
        $show->user('ユーザー名')->as(function ($user) {
            return $user->name;
        });
        $show->shop('店舗名')->as(function ($shop) {
            return $shop->name;
        });
        $show->started_at('予約日')->as(function () {
            return Carbon::parse($this->started_at)->format('Y/m/d/ H:i');
        });
        $show->num_of_users('人数');
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
        $form = new Form(new Reservation());
        $form->display('user_id', 'ユーザー');
        $form->display('shop_id', '店舗');
        $form->datetime('started_at', '予約日')->default(date('Y/m/d/ H:i'));
        $form->number('num_of_users', '人数');

        return $form;
    }
}
