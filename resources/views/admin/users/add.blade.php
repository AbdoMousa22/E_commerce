@extends('admin.style.index')
@section('content')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample"  action="{{route('admin/insert')}}" method="post">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"  name="name" value="{{old('name')}}">
                        @error('name')<span style="color: red;">{{$message}}</span>@enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email" value="{{old('email')}}">
                        @error('email')<span style="color: red;">{{$message}}</span>@enderror

                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name="password" value="{{old('password')}}">
                        @error('name')<span style="color: red;">{{$message}}</span>@enderror

                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        @error('gender')<span style="color: red;">{{$message}}</span>@enderror
                        <select class="form-control" id="exampleSelectGender" name="gender">
                            <option value="0"  @selected(old('gender')==0)>Male</option>
                            <option value="1" @selected(old('gender')==1)>Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Privilage</label>
                        @error('priv')<span style="color: red;">{{$message}}</span>@enderror
                        <select class="form-control" id="exampleSelectGender" name="priv" >
                            @forelse($priv as $priv)
                            <option value="{{$priv->number}}"  @selected(old('priv')==$priv->number)>{{$priv->name}}</option>
                            @empty
                            @endforelse
                        </select>
                      </div>



                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
