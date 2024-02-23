<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class DocumentController extends Controller
{
    public function index(){
        $document = Document::all();

        return view('admin.document.index', compact(['document']));
    }

    public function add(){
        $category = Category::all();
        $user = User::where('role', 'user')->get();

        return view('admin.document.add', compact(['category', 'user']));
    }

    public function create(Request $req){
        Document::create([
            'id' => Document::generateDocId(),
            'user_id' => $req->user,
            'categori_id' => $req->category,
            'nama' => $req->nama,
            'keterangan' => $req->keterangan,
            'status' => $req->status,
        ]);

        return redirect()->route('admin.document.index');
    }

    public function edit($id){
        $category = Category::all();
        $user = User::where('role', 'user')->get();
        $document = Document::findOrFail($id);

        return view('admin.document.edit', compact(['document', 'category', 'user']));
    }

    public function update(Request $req){
        $document = Document::findOrFail($req->id);

        $document->user_id = $req->user;
        $document->categori_id = $req->category;
        $document->nama = $req->nama;
        $document->keterangan = $req->keterangan;
        $document->status = $req->status;

        $document->save();

        return redirect()->route('admin.document.index');
    }

    public function delete($id){
        Document::destroy($id);

        return redirect()->route('admin.document.index');
    }

    public function search(){
        return view('admin.document.search');
    }

    public function getDocument(Request $req){
        $category = Category::all();
        $user = User::where('role', 'user')->get();
        $document = Document::findOrFail($req->id);

        return view('admin.document.view', compact(['document', 'category', 'user']));
    }

    public function report(){
        return view('admin.document.report');
    }

    public function getReport(Request $req){
        $start = $req->start;
        $end = $req->end;

        $documents = Document::whereBetween('created_at', [$start, $end])
        ->with('category')
        ->get();

        $pdf = PDF::loadView('admin.document.reportpdf', compact('documents'));

        $fileName = 'laporan_dokumen_' . now()->format('YmdHis') . '.pdf';

        // Untuk menampilkan di browser
        // return $pdf->stream($fileName);

        // Untuk menyimpan file
        // return $pdf->download($fileName);
        return Response::stream(
            function () use ($pdf) {
                echo $pdf->output();
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $fileName . '"'
            ]
        );
    }
}
