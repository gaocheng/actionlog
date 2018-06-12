<?php

namespace gaocheng\ActionLog;

use Illuminate\Support\ServiceProvider;
use ActionLog;

class ActionLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish configuration files

        $this->publishes([
            __DIR__ . '/migrations' => database_path('migrations'),
        ], 'migrations');


        $this->publishes([
            __DIR__ . '/config/actionlog.php' => config_path('actionlog.php'),
        ], 'config');

        $model = config("actionlog.models");
        if ($model) {
            foreach ($model as $k => $v) {

                $v::updated(function ($data) {
                    ActionLog::createActionLog('update', "更新的ID:" . $data->id);
                });

                $v::created(function ($data) {
                    ActionLog::createActionLog('add', "添加的ID:" . $data->id);
                });

                $v::deleted(function ($data) {
                    ActionLog::createActionLog('delete', "删除的ID:" . $data->id);

                });

            }
        }


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton("ActionLog", function ($app) {
            return new \gaocheng\ActionLog\Repositories\ActionLogRepository();
        });
    }
}
