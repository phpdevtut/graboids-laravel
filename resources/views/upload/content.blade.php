@extends('layouts.main')

@section('content')
<div class="outer_form_div">
    <p>Upload here:</p>
    <div class="inner_form">
        <form>
            <div class="mb-3">
                <input type="file" id="myFile" class="form-control" name="filename">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="clear"></div>
@endsection