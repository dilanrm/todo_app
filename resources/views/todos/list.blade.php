@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                <div class="panel-heading">Todo List for <span id="title1">{{ $todo->name }}</span> </div>
                    <div class="panel-body">
                        <form id="addTodo">
                            <div class="input-group">
                                <input type="text" id="list" class="form-control" placeholder="Insert todo">
                                <div class="input-group-btn">
                                    <input type="submit" class="btn btn-outline-primary" id="add" value="Add">
                                </div>
                            </div>
                        </form>
                            <br><br>
                        <form role="form" action="{{ url('/todos/add') }}" id="save">
                            {{ csrf_field() }}
                            <input type="hidden" name="name" value="{{ $todo->name }}">
                            <div class="form-group">
                                <div class="load1" style="display: block">
                                    <img src="{{URL::asset('img/load.gif')}}" alt="loading">
                                </div>
                                <div class="lists">
                                    
                                </div><br>
                                <input type="submit" value="save" class="btn btn-success">
                            </div>
                        </form>
                        <div class="coba"></div>
                        <div class="load" style="display: none">
                            <img src="{{URL::asset('img/load.gif')}}" alt="loading">
                        </div>
                        <div class="result" style="display: none">Success!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection