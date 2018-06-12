<?php

namespace gaocheng\ActionLog\Repositories;

use gaocheng\ActionLog\Services\clientService;
use gaocheng\ActionLog\Models\ActionLog();

class ActionLogRepository {

    /**
     * 记录用户操作日志
     * 
     * @param string $type 类型
     * @param string $content 内容
     * @return bool
     */
    public function createActionLog($type, $content)
    {
    	$actionLog = new ActionLog();
    	if(auth()->check()) {
    		$actionLog->uid = auth()->user()->id;
    		$actionLog->username = auth()->user()->name;
    	}
        else {
    		$actionLog->uid = 0;
    		$actionLog->username = '访客';
    	}

       	$actionLog->browser = clientService::getBrowser($_SERVER['HTTP_USER_AGENT'], true);
       	$actionLog->system = clientService::getPlatForm($_SERVER['HTTP_USER_AGENT'], true);
       	$actionLog->url = request()->getRequestUri();
        $actionLog->ip = request()->getClientIp();
        $actionLog->type = $type;
        $actionLog->content = $content;
        $res = $actionLog->save();

        return $res;
    }
}