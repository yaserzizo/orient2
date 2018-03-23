<?php
/**
 * Created by PhpStorm.
 * User: yaserzizo
 * Date: 2/27/18
 * Time: 9:15 AM
 */

namespace App;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    use Userstamps;
}