<?php

namespace Modules\Member\Model;

/**
 * Class MemberLevel
 * @package Modules\Member\Model
 */
class MemberLevel extends \Duxravel\Core\Model\Base
{

    protected $table = 'member_level';

    protected $primaryKey = 'level_id';

    public $timestamps = false;

}
