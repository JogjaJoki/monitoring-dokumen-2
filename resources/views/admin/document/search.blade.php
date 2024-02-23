@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Cari Document</h3>
                        </div>
                        @if (session('document-warn'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('document-warn') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.document.get') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>ID Document</label>
                                    <input type="text" name="id" class="form-control" placeholder="ID Dokumen" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
