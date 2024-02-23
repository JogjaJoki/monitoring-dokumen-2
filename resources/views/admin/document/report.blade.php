@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Generate Laporan Document</h3>
                        </div>
                        @if (session('document-warn'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('document-warn') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.document.getReport') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="start" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" name="end" class="form-control" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
