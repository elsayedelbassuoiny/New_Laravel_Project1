@extends('master')

@section('title')
Contact Form
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/add_subject.css')}}">
<link rel="stylesheet" type="text/css" href="/css/dropzone.min.css">
@endsection

@section('content')

    <div class="form-container">
      <form id="upload-form" action="/subjects/{{$subject->id}}/files" method="POST" class="dropzone">
        <input name="_token" value="{{ csrf_token() }}" type="hidden" />
      </form>
    </div>

    <a href="/subjects/{{$subject->id}}">Done</a>

@endsection

@section('scripts')
<script src="{{asset('js/add_subject.js')}}"></script>
<script type="text/javascript" src="/js/dropzone.min.js"></script>
<script>
    Dropzone.options.uploadForm = {
        dictDefaultMessage: "Drop Subject here to upload",
        acceptedFiles:".pdf,.pptx,.ppt,.odp",
        // addRemoveLinks: true
    }
</script>
@endsection
