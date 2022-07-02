<?php

namespace App\Http\Controllers\books;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class booksController extends Controller
{
/***********************   index   *******************************************/


    public function index()
    {
        $books = Book::all();
        return view('Pages.books.index', compact('books'));
    }


    /***********************   create   *******************************************/

    public function create()
    {

        return view('Pages.books.add_book');
    }


    /***********************   store   *******************************************/

    public function store(Request $request)
    {
        $book = new Book();

        $book->name = $request->name;
        $book->details = $request->details;

        $book->save();


        if ($request->hasFile('attachment')) {

            $attachment_id = Book::latest()->first()->id;
            $image = $request->file('attachment');
            $file_name = $image->getClientOriginalName();
//            $invoice_number = $request->invoice_number;

            $attachments = new Attachment();
            $attachments->file_name = $file_name;
            $attachments->attachment_id = $attachment_id;
            $attachments->save();

            // move pic
            $imageName = $request->attachment->getClientOriginalName();
            $request->attachment->move(public_path('Attachments/books'), $imageName);
        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('books.index');


    }

    /***********************   view   *******************************************/

    public function view($id)

    {
        $books = Book::whereId($id)->get();
            $attachments = Attachment::where('attachment_id', $id)->get();
            foreach ($attachments as $attachment) {
                $file_name = $attachment->file_name;
                   $book_file = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($file_name);
                return  response()->file($book_file);
        }

    }

    /***********************   download   *******************************************/


    public function download($id)
    {
        $books = Book::whereId($id)->get();
            $attachments = Attachment::where('attachment_id', $id)->get();
            foreach ($attachments as $attachment) {
                $file_name = $attachment->file_name;
                $contents = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($file_name);
                return response()->download($contents);
            }


    }


    /***********************   delete   *******************************************/

    public function destroy(request $request)
    {

        Book::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('books.index');

    }

}
