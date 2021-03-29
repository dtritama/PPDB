@extends('clasess.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Class ini mah dudee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clasess.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($clasess as $clases)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $clases->name }}</td>
            <td>
                <form action="{{ route('clasess.destroy',$clases->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('clasess.show',$clases->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('clasess.edit',$clases->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $clasess->links() !!}
      
@endsection