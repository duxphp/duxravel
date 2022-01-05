<?php

namespace Modules\Member\Admin;

use Duxravel\Core\UI\Form;
use Duxravel\Core\UI\Table;
use Duxravel\Core\UI\Widget;

class Level extends \Modules\System\Admin\Expend
{

    public string $model = \Modules\Member\Model\MemberLevel::class;

    protected function table(): Table
    {
        $table = new Table(new $this->model());

        $table->title('等级管理');

        $table->header(Widget::alert('最低成长值等级为默认用户等级，仅对新注册用户生效，招募类型不参与自动升级与注册等级', '系统提示'));

        $table->filter('等级名称', 'name', function ($query, $value) {
            $query->where('name', 'like', '%' . $value . '%');
        })->text('请输入等级名称')->quick();

        $table->action()->button('添加', 'admin.member.level.page')->type('dialog');

        $table->column('等级名称', 'name');
        $table->column('成长值', 'growth');
        $table->column('类型', 'type')->status([
            0 => '普通',
            1 => '招募',
        ], [
            0 => 'blue',
            1 => 'green'
        ]);
        $column = $table->column('操作')->width(120);
        $column->link('编辑', 'admin.member.level.page', ['id' => 'level_id'])->type('dialog');
        $column->link('删除', 'admin.member.level.del')->type('ajax', ['type' => 'post']);
        return $table;
    }

    public function form(int $id = 0): Form
    {
        $form = new Form(new $this->model());
        $form->dialog(true);
            $form->text('等级名称', 'name')->must();
            $form->text('成长值', 'growth')->type('number');
            $form->radio('类型', 'type', [
                0 => '普通',
                1 => '招募',
            ]);
        return $form;
    }

}
