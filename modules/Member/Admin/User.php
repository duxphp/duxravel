<?php

namespace Modules\Member\Admin;

use Illuminate\Validation\Rule;
use Modules\Member\Model\MemberLevel;
use Duxravel\Core\UI\Form;
use Duxravel\Core\UI\Table;

class User extends \Modules\System\Admin\Expend
{

    public string $model = \Modules\Member\Model\MemberUser::class;

    protected function table(): Table
    {
        $table = new Table(new $this->model());
        $table->title('用户等级');
        $table->filter('昵称', 'name', function ($query, $value) {
            $query->where('nickname', 'like', '%' . $value . '%');
        })->text('请输入用户昵称')->quick();

        $table->action()->button('添加', 'admin.member.user.page')->type('dialog');

        $table->column('昵称', 'nickname')->image('avatar');
        $table->column('手机号', 'tel');
        $table->column('邮箱', 'email');
        $table->column('等级', 'level.name');
        $table->column('加入 | 登录时间', 'created_at', function($value) {
            return $value->format('Y-m-d H:i:s');
        })->desc('login_at', function ($value) {
            return $value ? $value->format('Y-m-d H:i:s') : '-';
        });
        $table->column('状态', 'status')->status([
            1 => '正常',
            0 => '禁用'
        ], [
            1 => 'blue',
            0 => 'red'
        ]);
        $column = $table->column('操作')->width(150);
        $column->link('编辑', 'admin.member.user.page', ['id' => 'user_id'])->type('dialog');
        $column->link('删除', 'admin.member.user.del')->type('ajax', ['type' => 'post']);
        return $table;
    }

    public function form(int $id = 0): Form
    {
        $form = new Form(new $this->model());
        $form->dialog(true);
        $form->select('等级', 'level_id', function () {
            return MemberLevel::orderBy('growth', 'asc')->pluck('name', 'level_id');
        })->must();
        $form->text('昵称', 'nickname')->must();
        $form->image('头像', 'avatar');

        $form->tel('手机号', 'tel')->verify([
            Rule::unique((new $this->model)->getTable())->ignore($id, 'user_id'),
        ], [
            'unique' => '手机号码不能重复',
        ])->must();

        $form->email('邮箱', 'email')->verify([
            Rule::unique((new $this->model)->getTable())->ignore($id, 'user_id'),
        ], [
            'unique' => '邮箱号码不能重复',
        ])->must();

        $form->password('密码', 'password')->verify('required|min:4', [
            'required' => '请填写密码',
            'min' => '密码不能少于4位',
        ], 'add')->verify('nullable|min:4', [
            'min' => '密码不能少于4位',
        ], 'edit')->value('')->help($id ? '不修改密码请留空' : '');


        $form->radio('状态', 'status', [
            1 => '启用',
            0 => '禁用',
        ]);

        return $form;
    }

    public function dataSearch()
    {
        return ['nickname', 'tel'];
    }

    public function dataField()
    {
        return ['nickname as name', 'tel'];
    }

}
