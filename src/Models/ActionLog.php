<?php
namespace gaocheng\ActionLog\Models;

use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model {

    protected $table = "action_log";

    protected $fillable = ['uid','username','type','ip','content'];

    /**
     * Create a new model instance.
     *
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = config('actionlog.connection')) {
            $this->connection = $connection;
        }
    }
}