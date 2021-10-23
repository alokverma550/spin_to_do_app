@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('posts') }}">Posts</a></li>
              <li class="breadcrumb-item active">{{ ucfirst(substr(@$post['title'],0,12)) }}...</li>
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

            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600;font-size: 22px;">{{ ucfirst($post['title']) }}...</h5>
                  <p class="card-text">{{ ucfirst($post['body']) }}...</p>
                </div>
              </div>
            </div>


          <!-- ./col -->
        </div>

        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
