@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">

            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  To Do List
                </h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list" id="to_do_container">
                @foreach($todos as $todo)
                  <li id="listToDo_{{ $todo->id }}">
                    <span class="text">{{ $todo->todo }}</span>
                    <div class="tools">
                      <i class="fas fa-edit" onclick="editTodo('{{ $todo->id }}')"></i>
                    </div>
                  </li>
                @endforeach
                </ul>
                @if(!sizeof($todos))
                    <p id="emptyToDo">Create one!</p>
                @endif
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button onclick="addTodoModal();" type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add To Do</button>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('customModal')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add To Do</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="formToDo">To Do</label>
                <input type="text" class="form-control" id="formToDo" name="todo" placeholder="To Do">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitToDo" onclick="addTodo()">Add</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit To Do</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
            <div class="form-group">
                <label for="formToDo">To Do</label>
                <input type="text" class="form-control" id="formToDoEdit" name="todo" placeholder="To Do">
                <input type="hidden" class="form-control" id="formToDoEditId" name="todo_id" placeholder="To Do">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitToDoEdit" onclick="editTodoSubmit()">Edit</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('customScript')
    <script type="text/javascript">
        function addTodo() {
            var todo = $("#formToDo").val();
            var token = $("input[name=_token]").val();
            var formData = {
                'todo': todo,
                '_token': token
            };
            var todo_id = 0;
            $.ajax({
                url: "{{ route('todo_post') }}",
                async: false,
                type: "post",
                data: formData,
                success: function(data) {
                    todo_id = data.id;
                },
                error: function(){
                    alert('Try Again');
                }
            });
            if(todo_id != 0) {
                var appendToDo = `
                                    <li id="listToDo_`+ todo_id +`">
                                        <span class="text">`+ todo +`</span>
                                        <div class="tools">
                                          <i class="fas fa-edit" onclick="editTodo('`+ todo_id +`')"></i>
                                        </div>
                                    </li>
                                `;
                $("#to_do_container").append(appendToDo);
                $("#emptyToDo").text('').hide();
                $('#exampleModal').modal('toggle');
            }
        }
        function addTodoModal(){
            $("#formToDo").val('');
            $('#exampleModal').modal('toggle');
        }

        function editTodo(id){
            $("#formToDoEdit").val($("#listToDo_"+id+'>span').text());
            $("#formToDoEditId").val(id);
            $('#exampleModal1').modal('toggle');
        }

        function editTodoSubmit() {
            var todo = $("#formToDoEdit").val();
            var todo_id = $("#formToDoEditId").val();
            var token = $("input[name=_token]").val();
            var formData = {
                'todo': todo,
                '_token': token,
                'todo_id': todo_id
            };
            var todo_edit = 0;
            $.ajax({
                url: "{{ route('todo_post_edit') }}",
                async: false,
                type: "post",
                data: formData,
                success: function(data) {
                    todo_edit = 1;
                },
                error: function(){
                    alert('Try Again');
                }
            });
            if(todo_edit != 0) {
                var appendToDo = `
                                    <span class="text">`+ todo +`</span>
                                    <div class="tools">
                                      <i class="fas fa-edit" onclick="editTodo('`+ todo_id +`')"></i>
                                    </div>
                                `;
                $("#listToDo_"+todo_id).html(appendToDo);
                $("#emptyToDo").text('').hide();
                $('#exampleModal1').modal('toggle');
            }
        }

    </script>
@endsection