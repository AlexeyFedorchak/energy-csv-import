@extends('layouts.layoutMaster')

@section('content')

<div class="container">
    <h1>FAQ Bearbeiten</h1>
    <form method="POST" action="{{ route('admin.faq.update', ['id' => $faq->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="question">Frage</label>
            <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
        </div>
        <div class="form-group">
            <label for="answer">Antwort</label>
            <textarea name="answer" class="form-control" id="editor" rows="4" required>{{ $faq->answer }}</textarea>
        </div>
        <!-- Hidden input to store CKEditor content -->
        <input type="hidden" id="answer_hidden" name="answer_hidden" value="{{ $faq->answer }}">
        <button type="submit" class="btn btn-primary mt-3">Update FAQ</button>
    </form>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('editor');
</script>
@endsection
