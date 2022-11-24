@extends('template')

@section('section')
    
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah user</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Form Tambah user</h5>
          
          <form class="row g-3" action="{{route ('user.store')}}" method="POST" enctype="multipart/form-data">
            
            @csrf
            <input type="hidden" name="id" >
            <div class="col-md-12">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control"  name="name">
            </div>

            <div class="col-md-12">
                <label class="form-label">Email</label>
                <input type="text" class="form-control"  name="email">
              </div>

              <div class="col-md-12">
                <label class="form-label">Password</label>
                <input type="number" class="form-control"  name="password">
              </div>

              <div class="col-md-12">
                <label class="form-label">Role</label>
                <input type="text" class="form-control"  name="role">
              </div>
           
            
            
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              
            </div>
          </form>

        </div>
      </div>
</main>
@endsection