@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Posts ( {{ @$total_post }} )</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
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
          @foreach($posts as $post)
            <div class="col-md-4 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: 600;font-size: 22px;">{{ ucfirst(substr($post['title'], 0, 25)) }}...</h5>
                  <p class="card-text">{{ ucfirst(substr($post['body'],0,90)) }}...</p>
                  <a href="{{ route('post',$post['id']) }}" class="btn btn-primary">Read More...</a>
                </div>
              </div>
            </div>
          @endforeach

          <!-- ./col -->
        </div>
        <div class="d-flex">
            <div class="mx-auto">
            {{ $posts->links() }}
          </div>
        </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
