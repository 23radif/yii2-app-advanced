<?php


namespace backend\components;


use backend\share\RepositoryTask;
use yii\base\Event;
use yii\log\Logger;

class Task implements TaskService
{

    /** @var RepositoryTask */
    private $repository;

    public function __construct(RepositoryTask $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \common\models\Task $task
     * @return bool
     */
    public function save(\common\models\Task &$task): bool
    {
        $task->on(\common\models\Task::EVENT_SAVE,function (Event $event){
            $task=$event->sender;
            \Yii::getLogger()->log('event object save '.$task->title,Logger::LEVEL_WARNING);
        });

        $task->on(\common\models\Task::EVENT_SAVE,[$task,'event_save']);

        if (!$task->validate()) {
            return false;
        }

        if (!$this->repository->create($task)) {
            return false;
        }
        

//        $task->off(\common\models\Task::EVENT_SAVE);
//        Event::off(\common\models\Task::class,\common\models\Task::EVENT_SAVE);
//        Event::trigger(\common\models\Task::class,\common\models\Task::EVENT_SAVE);
        $task->trigger(\common\models\Task::EVENT_SAVE);
        $task->trigger(SaveTaskEventInterface::TASK_SAVE);

        return true;
    }

    /**
     * @param \common\models\Task $task
     * @return bool
     */
    public function update(\common\models\Task $task): bool
    {
        if (!$task->validate()) {
            return false;
        }

        if (!$this->repository->update($task)) {
            return false;
        }

        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function getTask( $id): ?\common\models\Task
    {
        $task=$this->repository->findById($id);
        return $task;
    }
}