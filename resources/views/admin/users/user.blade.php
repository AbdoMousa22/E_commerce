@extends('admin.style.index')

@section('content')

<a href="{{route('admin/add')}}" class="btn btn-gradient-dark btn-fw">ADD USER </a>

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bordered table</h4>
                    <p class="card-description"> Add class <code>.table-bordered</code>
                    </p>
                    <span>
                    {{$id_login}}
                    {{$priv_login}}

                    </span>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>  ID</th>
                          <th> NAME </th>
                          <th> EMAIL ADDRESS </th>
                          <th> GENDER </th>
                          <th> PVIVILAGE </th>
                          <th> CONTROLLER </th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse($admin as $admin)
                            <tr>
                                <td>{{$id++}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->gender==0?'male':'female'}}</td>
                                <td>
                                    {{$admin->priv==300?'owner':''}}
                                    {{$admin->priv==200?'admin':''}}
                                    {{$admin->priv==100?'super':''}}
                                </td>
                                <td>
                                    @if($admin->priv==100||$priv_login==300||$priv_login==200 && $admin->id==$id_login)
                                    <a href="{{route('admin/edite',$admin->id)}}" class="btn btn-gradient-success btn-fw">EDITE</a>
                                    <a href="{{route('admin/delete',$admin->id)}}" class="btn btn-gradient-danger btn-fw">DELETE</a>
                                    @endif
                                </td>
                            </tr>
                                @empty
                                @endforelse



                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection
