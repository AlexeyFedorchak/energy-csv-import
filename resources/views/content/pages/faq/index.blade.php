@extends('layouts.layoutMaster')

@section('content')
<div class="container">
        <!-- Search input field -->
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Fragen und Antworten durchsuchen...">
        </div>
        <!-- Display existing FAQs -->
        @if($faqs->count() > 0)
            <h2>Fragen und Antworten</h2>
            <div class="row" id="faqList">
                @foreach($faqs as $faq)
                    <div class="col-md-12 mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $faq->question }}</h5>
                            <p class="card-text">{!! $faq->answer !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No FAQs available.</p>
        @endif
    </div>
    <script>
        // JavaScript function to handle search
        document.getElementById('searchInput').addEventListener('input', function() {
            let searchQuery = this.value.toLowerCase();
            let faqList = document.getElementById('faqList');
            let faqs = faqList.getElementsByClassName('card');

            for (let i = 0; i < faqs.length; i++) {
                let question = faqs[i].getElementsByClassName('card-title')[0].innerText.toLowerCase();
                let answer = faqs[i].getElementsByClassName('card-text')[0].innerText.toLowerCase();
                if (question.includes(searchQuery) || answer.includes(searchQuery)) {
                    faqs[i].style.display = '';
                } else {
                    faqs[i].style.display = 'none';
                }
            }
        });
    </script>
@endsection