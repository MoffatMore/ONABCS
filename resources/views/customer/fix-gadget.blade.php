@extends('layouts.customer-default')
@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('fault.store') }}">
        @csrf
        <div class="form-group">
            <label>Gadget Name:</label>
            <div class="input-group">
                <input type="text" name="name" required class="form-control float-right" id="name">
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="picture" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div>

        <div class="form-group">
            <label>Fault description</label>
            <textarea class="textarea form-control" name="description" required placeholder="Place some text here"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
            </textarea>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@stop
