@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Data Document</h3>
                        </div>
                        @if (session('document-warn'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('document-warn') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.document.update') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>ID Document</label>
                                    <input type="text" name="id" readonly value="{{ $document->id }}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $document->nama }}" placeholder="Nama Dokumen" required>
                                </div>
                                <div class="form-group">
                                    <label>User</label>
                                    <select name="user" class="form-control" id="">
                                        @foreach($user as $c)
                                            <option value="{{ $c->id }}" <?= $document->user_id == $c->id ? 'selected' : '' ?>>{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" class="form-control" id="">
                                        @foreach($category as $c)
                                            <option value="{{ $c->id }}" <?= $document->categori_id == $c->id ? 'selected' : '' ?>>{{ $c->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" value="{{ $document->keterangan }}" placeholder="Keterangan Dokumen" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" name="status" class="form-control" value="{{ $document->status }}" placeholder="Status Dokumen" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.document.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
