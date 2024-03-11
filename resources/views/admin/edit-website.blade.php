@extends('layouts.layoutMaster')

@section('title', 'Edit Website')

@section('content')
    <h1>Website< Bearbeiten/h1>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar_mode: 'floating',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | link image',
            relative_urls: false,
        });
    </script>

    <form action="{{ route('admin.updateWebsite', ['id' => $website->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Add your form fields for editing the website here -->
        <div class="form-group">
            <label for="url">URL:</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ $website->url }}" required>
        </div>

        <div class="form-group">
            <label for="category">Kategorie:</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ $website->category }}" required>
        </div>

        <div class="form-group">
    <label for="active">Status:</label>
    <select name="active" id="active" class="form-control" required>
        <option value="1" {{ $website->active == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $website->active == 0 ? 'selected' : '' }}>Inactive</option>
        <option value="2" {{ $website->active == 2 ? 'selected' : '' }}>Rejected</option>
    </select>
</div>


    

        <button type="submit" class="btn btn-primary">Website speichern</button>
    </form>
    

    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title">Bestehende Einnahmen</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Einnahmen</th>
                        <th>Besucher</th>
                        <th>CPM</th>
                        <th>Aktion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($earnings as $earning)
                        <tr>
                            <td contenteditable>{{ $earning->date }}</td>
                            <td contenteditable>{{ $earning->earning }}</td>
                            <td contenteditable>{{ $earning->views }}</td>
                            <td contenteditable>{{ $earning->cpm }}</td>
                            <td>
                                <!-- Save button to submit changes for each line -->
                                <button class="btn btn-primary btn-sm" onclick="saveRow({{ $earning->id }})">Save</button>
                                <a href="{{ route('admin.editEarnings', ['id' => $earning->id]) }}" class="btn btn-primary btn-sm">Bearbeiten</a>
                                <form action="{{ route('admin.destroyEarnings', ['id' => $earning->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Löschen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title">Einnahmen hinzufügen</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.storeEarnings') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="new_date">Datum:</label>
                            <input type="date" name="new_date" id="new_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="new_amount">Einnahmen:</label>
                            <input type="number" name="new_amount" id="new_amount" step="0.01" min="0" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="new_views">Besucher:</label>
                            <input type="number" name="new_views" id="new_views" min="0" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="new_cpm">CPM:</label>
                            <input type="number" name="new_cpm" id="new_cpm" step="0.01" min="0" class="form-control" required>
                        </div>
                    </div>
                    <input type="hidden" name="website_id" value="{{ $website->id }}">
                    <input type="hidden" name="user_id" value="{{ $website->user_id }}">
                </div>
                <button type="submit" class="btn btn-success">Einnahmen hinzufügen</button>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title">Existing Adcodes</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>CODE</th>
                        <th>Breite</th>
                        <th>Höhe</th>
                        <th>Aktion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adcodes as $adcode)
                    <tr> 
            <form action="{{ route('update-adcode', ['id' => $adcode->id]) }}" method="POST">
                @csrf
               
                    <td class="col-md-4">
                        <div class="form-group">
                            
                            <textarea rows="7" id="adcode" name="adcode" class="form-control" required>{{$adcode->adcode}}</textarea>
                        </div>
                    </td>
                    <td class="col-md-2">
                        <div class="form-group">
                           
                            <input type="number" name="width" id="new_amount" step="0.01" min="0" value="{{$adcode->width}}" class="form-control" required>
                        </div>
                    </td>
                    <td class="col-md-2">
                        <div class="form-group">
                           
                            <input type="number" name="height" id="new_views" min="0" value="{{$adcode->height}}" class="form-control" required>
                        </div>
                    </td>
                    <td class="col-md-4">
                        <button type="submit" class="btn btn-success">Speichern</button>
                         <a href="{{route('delete-adcode',['id' => $adcode->id])}}" class="btn btn-success">Löschen</button>
                    </td>
                   
                    <input type="hidden" name="website_id" value="{{ $website->id }}">
                    <input type="hidden" name="user_id" value="{{ $website->user_id }}">
              
                
            </form>
            </tr>
            @endforeach
            <tr>
            <form action="{{ route('store-adcode',['id' => $website->id]) }}" method="POST">
                @csrf
               
                    <td class="col-md-4">
                        <div class="form-group">
                           
                            <textarea rows="7" id="adcode" name="adcode" class="form-control" required></textarea>
                        </div>
                    </td>
                    <td class="col-md-2">
                        <div class="form-group">
                        
                            <input type="number" name="width" id="width" step="0.01" min="0" class="form-control" required>
                        </div>
                    </td>
                    <td class="col-md-2">
                        <div class="form-group">
                            
                            <input type="number" name="height" id="width" min="0" class="form-control" required>
                        </div>
                    </td>
                    <td class="col-md-2">
                         <button type="submit" class="btn btn-success">Hinzufügen</button>
                    </td>
                    <div class="col-md-2">
                        
                    </div>
                    <input type="hidden" name="website_id" value="{{ $website->id }}">
                    <input type="hidden" name="user_id" value="{{ $website->user_id }}">
                
                
            </form>
            </tr>
        </div>
    </div>
<script>
    // Function to save the changes in each row
    function saveRow(earningId) {
        var row = document.querySelector(`tr[data-id="${earningId}"]`);
        var date = row.querySelector('td:nth-child(1)').innerText;
        var earnings = row.querySelector('td:nth-child(2)').innerText;
        var views = row.querySelector('td:nth-child(3)').innerText;
        var cpm = row.querySelector('td:nth-child(4)').innerText;

        // Perform an AJAX request to update the earnings
        $.ajax({
            url: `/admin/updateEarnings/${earningId}`,
            method: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                earning_id: earningId,
                amount: earnings,
                views: views,
                cpm: cpm,
            },
            success: function (data) {
                // Optionally, you can add some visual feedback to show the row was saved
                // For example, change the button color:
                row.querySelector('button').classList.add('btn-success');
                setTimeout(function() {
                    row.querySelector('button').classList.remove('btn-success');
                }, 1000);
            },
            error: function () {
                // Handle the error case if needed
            }
        });
    }
</script>
<script src="https://cdn.tiny.cloud/1/YOUR_TINYMCE_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    // Initialize TinyMCE
    tinymce.init({
        selector: '#ad_codes',
        height: 300,
        menubar: false,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent',
    });
</script>
@endsection
