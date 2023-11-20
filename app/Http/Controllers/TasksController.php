<?php

namespace App\Http\Controllers;

use \App\Models\Task;
use Illuminate\Http\Request;

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
     * @param String $requestData Uncoded JSON representing the task
     * 
     * @access public
     * @return null
     */
    public function save() {
        $task = new Task;
        $task->name = request('name');
        $task->checked = request('checked');
        $task->save();
    }

    /**
     * Saves a new task (parameter)
     * 
     * @param String $task Uncoded JSON representing the task
     * 
     * @access public
     * @return null
     */
    public function saveAll() {
        $i = 0;
        while (true) {
            $taskOfRequest = request($i);

            if (is_null($taskOfRequest)) {
                break;
            }

            $taskToSave = Task::find($taskOfRequest['id']);
            $taskToSave->name = $taskOfRequest['name'];
            $taskToSave->checked = $taskOfRequest['checked'];
            $taskToSave->save();
    
            $i++;
        }
    }


}
