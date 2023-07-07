@extends("layouts.app")

@section("content")
 <div class="container">
  @include("messages")
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>     
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>   
    </tr>
  </thead>
  <tbody>
    @foreach ($customers as $customer)
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td>{{$customer->name}}</td>
      <td>{{$customer->email}}</td>
      <td> 
      <input type="password" value="{{$customer->password}}" readonly>
      </td>
      <td>
      <form action="/customers/{{$customer->id}}" method="POST">
            @method('DELETE')
            @csrf 
            @auth
            <a href="/customers/{{$customer->id}}" class="btn btn-success">View</a>
            <a href="/customers/{{$customer->id}}/edit" class="btn btn-info">Edit</a>
            <a href="/customers/create" class="btn btn-primary"> + Create</a>
            <button type="submit" class="btn btn-danger">Delete</button>
            @endauth
        </form>

      </td>
    </tr>
    @endforeach
  </tbody>
 </table>
 </div>
@endsection