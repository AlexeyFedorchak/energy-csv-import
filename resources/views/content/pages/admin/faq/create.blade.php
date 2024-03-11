@extends('layouts.layoutMaster')

@section('content')



    <div class="container">
        <h1>Frequently Asked Questions</h1>

        <!-- Display existing FAQs -->
        @if($faqs->count() > 0)
            <h2>FAQs</h2>
            <div class="row">
                @foreach($faqs as $faq)
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $faq->question }}</h5>
                                <p class="card-text">{!! $faq->answer !!}</p>
                                <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-primary">Bearbeiten</a>
                                <form method="POST" action="{{ route('admin.faq.destroy', $faq->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bist du dir sicher das zu löschen?')">Löschen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No FAQs available.</p>
        @endif

<form  action="{{ route('admin.faq.create') }}" method="POST">
     @csrf
    <div class="form-group">
        <label for="question">Frage</label>
        <input type="text" name="question" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="answer">Antwort</label>
        <!-- <textarea id="editor" name="answer" class="form-control" rows="10" required></textarea> -->
        <textarea  name="answer" class="ckeditor form-control" rows="4" required></textarea>
    </div>
    <!-- Hidden input to store TinyMCE content -->
    <input type="hidden" id="answer_hidden" name="answer_hidden">
    <div class="p-2">
    <button type="submit" class="btn btn-primary ">Hinzufügen</button>
</div>
 
</form>


    </div>

       <!-- <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script> -->
 <!-- <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script> -->
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection