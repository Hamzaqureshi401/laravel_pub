@extends('layouts.app')

@section('content')
<!-- Create Task Form... -->
<!-- New Task Form -->
<div class="panel panel-body">

    @include('common.errors')
    <form action="/task" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task Name</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task Date</label>

            <div class="col-sm-6">
                <input type="date" name="date" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task Time</label>

            <div class="col-sm-6">
                <input type="time" name="time" class="form-control">
            </div>
        </div>


        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default btn-primary">
                    <i class="fa fa-plus"></i> + Add Task
                </button>
            </div>
        </div>
    </form>
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
    <div class="mr-5">

        <div class="form-group">
            <label for="task" class="col-sm-3 control-label"> Current Tasks</label>

            <div class="col-sm-6">
                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                            <th>Task</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $task->date }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $task->time }}</div>
                                </td>

                                <td>
                                    <form action="/task/{{ $task->id }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="btn btn-danger">Delete Task</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>

    @endif
</div>
@endsection