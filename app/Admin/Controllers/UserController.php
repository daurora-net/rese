<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Auth;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail as LaravelMail;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '利用者';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->tools(function ($tools) {
            $tools->append("
            <a href='/admin/users/mail' class='btn btn-sm btn-success'>メール送信</a>
            ");
        });
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
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
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }

    public function mail()
    {

        // return $content
        //     ->title('Mail')
        //     ->description('SendMail...');
        // ->row(Mail::form());
        return view('email.send');
    }

    public function sendMail()
    {
        $users = User::all();
        foreach ($users as $user) {
            LaravelMail::to($user->email)->send(new SendMail($user));
        }
    }
}
