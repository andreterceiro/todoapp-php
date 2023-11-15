<?php

namespace App\Http\Controllers;

use \App\Models\Task;

class TasksController extends Controller
{
    /**
     * A simple method that responds 'pong'
     * 
     * @access public
     * @return null Do not return, render response
     */
    public function ping() {
        echo 'pong';
    }

    /**
     * Allow access to all tasks
     * 
     * @access public
     * @return null Do not return, render the JSON response
     */
    public function getAll() {
        $tasks = (new Task)->all();
        foreach($tasks as $index => $task) {
            $tasks[$index]->checked = (bool) $task->checked;
        }

        return \Response::json($tasks);
    }

    /**
     * Allow access to a specific task searching by its ID
     * 
     * @param String $id ID of the entry
     * 
     * @access public
     * @return null Do not return, render the JSON response
     */
    public function get($id) {
        $task = (new Task)->find($id);
        if ($task) {
            $task->checked = (bool) $task->checked;
        }

        return \Response::json($task);
    }

    /**
     * Return tha last ID plus 1
     * 
     * @access public
     * @return null Do not return, render response
     */
    public function getNewId() {
        $task = Task::orderBy('id', 'desc')->get();

        return $task[0]->id + 1;
    }

    /**
     * Delete a registry by its ID
     *
     * @param String $id ID of the entry
     * 
     * @access public
     * @return null
     */
    public function delete($id) {
        (new Task)->find($id)->delete();
    }

    /**
     * Saves a new task (parameter)
     * 
     * @param String $task Uncoded JSON representing the task
     * 
     * @access public
     * @return null
     */
    public function saveNewTask($task) {
        // var_dump($task);

        /*
            $task = json_decode($task);
            $newTaskData = Task::find($task->id);
            $newTaskData->checked = $task->checked;
            $newTaskData->name = $task->name;
            $newTaskData->save();
        */
    }

    /**
     * Saves a new task (parameter)
     * 
     * @param String $task Uncoded JSON representing the task
     * 
     * @access public
     * @return null
     */
    public function saveAll($tasks) {
        // var_dump($tasks);

        /*
            $tasks = json_decode($tasks);

            foreach($tasks as $task) {
                $newTaskData = Task::find($task->id);
                $newTaskData->checked = $task->checked;
                $newTaskData->name = $task->name;
                $newTaskData->save();
            }
        */
    }


}
