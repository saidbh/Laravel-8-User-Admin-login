@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <button type="button" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#exampleModal"> + </button>   <li class="breadcrumb-item active" aria-current="page">ADD USER </li>
            </ol>
        </nav>
		@if($message = Session::get('success'))
			<div class="alert alert-success">{{ $message }}</div>
		@endif
		@if($message = Session::get('fail'))
			<div class="alert alert-danger">{{ $message }}</div>
		@endif
        <div class="row">
            <div class="col-md-6">
			<!--client bloc start here -->
                <div class="card">
                    <div class="card-header">
                       Client list
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
								<th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
							@if($client->isEmpty())
								<td colspan="5"><div class="alert alert-info"> No clients found ! </div></td>
								@else
							@foreach ($client as $clients)
							 <tr>
                                <td>{{$id = $clients->id}}</td>
                                <td>{{$name = $clients->name}}</td>
                                <td>{{$email = $clients->email}}</td>
                                <td>client </td>
								<td>
									<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModaldelclt{{ $id }}">Delete</button>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalupdateclt{{ $id }}">Update</button>
								</td>
                            </tr>
                             <!--Delete modal-->
                             <!-- Modal -->
                             <div class="modal fade" id="exampleModaldelclt{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <form method="get" action="{{ route('clientDel',['id' => $id]) }}">
                                                 @csrf
                                                 Are you sure to delete the client {{ $name }}  ?
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                         </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                             <!--Delete modal end-->

                             <!--update modal-->
                             <!-- Modal -->
                             <div class="modal fade" id="exampleModalupdateclt{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Client Update</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <form method="post" action="{{route('client',['id' => $id] )}}">
                                                 @csrf
                                                 <div class="container">
                                                     <div class="row">
                                                         <div class="col">
                                                             <div class="mb-3">
                                                                 <label for="exampleFormControlInput1" class="form-label">Name </label>
                                                                 <input type="text" name="name" class="form-control" value="{{$name}}" required >
                                                             </div>
                                                         </div>
                                                         <div class="col">
                                                             <div class="mb-3">
                                                                 <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                                                 <input type="email" name="email" class="form-control"  value="{{$email}}" required>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row">
                                                         <div class="col-12">
                                                             <select name="type" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                                                                 
                                                                 <option value="0">Client</option>
                                                                 <option value="2">Developer</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                 </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-info btn-sm">Update</button>
                                         </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                             <!--Update modal end-->
							@endforeach
							@endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--client bloc end here -->
            <!-- Developer bloc start here-->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Developer list
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
								<th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
							@if($dev->isEmpty())
								<td colspan="5"><div class="alert alert-info"> No developers found ! </div></td>
								@else
							@foreach ($dev as $devs)
							 <tr>
                                <td>{{$id = $devs->id}}</td>
                                <td>{{$name = $devs->name}}</td>
                                <td>{{$email = $devs->email}}</td>
                                <td>Developer</td>
								<td>
				                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModaldeldev{{$id}}">Delete</button>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalupdatedev{{$id}}">Update</button>
								</td>
                            </tr>
                                <!--Delete modal-->
                             <!-- Modal -->
                             <div class="modal fade" id="exampleModaldeldev{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <form method="get" action="{{route('devDel', ['id' => $id ])}}">
                                                 @csrf
                                             Are you sure to delete the developer {{ $name }} ?
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                         </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                                <!--Delete modal end-->

                                <!--update modal-->
                             <!-- Modal -->
                             <div class="modal fade" id="exampleModalupdatedev{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">UPDATE</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <form method="post" action="{{ route('dev',['id' => $id] ) }}">
                                                 @csrf
                                                 <div class="container">
                                                     <div class="row">
                                                         <div class="col">
                                                             <div class="mb-3">
                                                                 <label for="exampleFormControlInput1" class="form-label">Name </label>
                                                                 <input type="text" name="name" class="form-control"  value="{{ $name }}" required>
                                                             </div>
                                                         </div>
                                                         <div class="col">
                                                             <div class="mb-3">
                                                                 <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                                                 <input type="email" name="email" class="form-control"  value="{{ $email }}" required>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row">
                                                         <div class="col-12">
                                                             <select name="type" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                                                                 <option selected>Choose a type</option>
                                                                 <option value="0">Client</option>
                                                                 <option value="2">Developer</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                 </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-info btn-sm">Update</button>
                                         </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                                <!--Update modal end-->
							@endforeach
							@endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Developer bloc end here-->
        </div>
        <!--Project bloc start here -->

        <div class="container p-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   <button type="button" class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#exampleModalprojet"> + </button>   <li class="breadcrumb-item active" aria-current="page">Affect Project to Client & Developer </li>
                </ol>
            </nav>
            <div class="row ">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Project list
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID Project</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Developer Name</th>
									<th scope="col">Project Name</th>
									<th scope="col">Start Date</th>
									<th scope="col">End Date</th>
									<th scope="col">Description</th>
									<th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
								@if($prj->isEmpty())
								     <td colspan="8"><div class="alert alert-info"> No Project found ! </div></td>
								@else
							    @foreach ($prj as $project)
                                <tr>
                                    <td>{{$id = $project->id}}</td>
                                    <td>{{$client_name = $project->client_name}}</td>
                                    <td>{{$developer_name = $project->developer_name}}</td>
                                    <td>{{$project_name = $project->project_name}}</td>
									<td>{{$start_date = $project->start_date}}</td>
									<td>{{$end_date = $project->end_date}}</td>
									<td>{{$description = $project->description}}</td>
									<td style="width: 20%">
									 <br>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalupdatepro{{$id}}">Update</button>
									<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delpro{{$id}}">Delete</button>
									</td>
                                </tr>
								<!--Modal Delete project-->

                                <!-- Modal -->
                                <div class="modal fade" id="delpro{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete project</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="get" action="{{ route('projectdel', ['id' => $id]) }}">
                                                    @csrf
                                                    Would you like to delete this project ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
								<!--Modal Delete end-->
								<!--Modal update project-->
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalupdatepro{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Project</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('projectupdate', ['id' => $id]) }}">
                                                    @csrf
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label>Choose a Client :</label>
                                                                <select id="client" name="idclient" class="form-select form-select-lg" aria-label=".form-select-sm example" required>
                                                                    <option selected>...</option>
                                                                    @if($client->isEmpty())
                                                                        No clients found !
                                                                    @else
                                                                        @foreach ($client as $C)
                                                                            <option value="{{$id = $C->id}}">{{ $name = $C->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <label>Choose a Developer :</label>
                                                                <select id="dev" name="iddeveloper" class="form-select form-select-lg" aria-label=".form-select-sm example" required>
                                                                    <option selected>....</option>
                                                                    @if($dev->isEmpty())
                                                                        No developers found !
                                                                    @else
                                                                        @foreach ($dev as $D)
                                                                            <option value="{{$id = $D->id}}">{{ $name = $D->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <input type="hidden" name="clientname" class="form-control" id="clientname" value=""  required>
                                                                    <input type="hidden" name="devname" class="form-control" id="devname" value="" required>
                                                                    <label for="exampleFormControlInput1" class="form-label">Project Name</label>
                                                                    <input type="text" name="projectname" class="form-control" value="{{ $project_name }}" placeholder="Project Name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput1" class="form-label">Start date</label>
                                                                    <input type="datetime-local" name="startdate" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlInput1" class="form-label">End date</label>
                                                                    <input type="datetime-local" name="enddate" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                                                    <textarea class="form-control" name="description" value="{{ $description }}" rows="3" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
								<!--Modal updateproject end-->
								@endforeach
								@endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--project bloc end here-->
        <!---->
        <!--The USER modal registration start here-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD USER</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="container">
									 @if ($errors->any())
                                         <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                 </ul>
                                          </div>
                                     @endif
								<div id="errormsg">
								    
								<div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
										<input type="hidden" id="token" class="form-control" value="{{ csrf_token() }}" required>
										<input type="hidden" id="regroute" class="form-control" value="{{route('register')}}" required>
                                            <label for="exampleFormControlInput1" class="form-label">Name </label>
                                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="name" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="name@example.com" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Password </label>
                                            <input type="password" id="pwd" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Confirm-password</label>
                                            <input type="password" id="pwd2" class="form-control @error('email') is-invalid @enderror"  placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <select name="type" id="select" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                                            <option value="0">Client</option>
                                            <option value="2">Developer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                     </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnsub" class="btn btn-primary btn-sm">Register</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
        <!--The client modal start end-->
        <!--The Projet modal start here-->
        <div class="modal fade" id="exampleModalprojet" tabindex="-1" aria-labelledby="exampleModalLabelprojet" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD PROJECT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('addproject') }}">
						@csrf
						 <div class="container">
                             <div class="row">
                                 <div class="col">
								 <label>Choose a Client :</label>
                                     <select id="client" name="idclient" class="form-select form-select-lg" aria-label=".form-select-sm example" required>
                                         <option selected>...</option>
                                         @if($client->isEmpty())
                                              No clients found !
                                         @else
                                             @foreach ($client as $C)
                                                 <option value="{{$id = $C->id}}">{{ $name = $C->name }}</option>
                                             @endforeach
										 @endif
                                     </select>
                                 </div>
                                 <div class="col">
								 <label>Choose a Developer :</label>
                                     <select id="dev" name="iddeveloper" class="form-select form-select-lg" aria-label=".form-select-sm example" required>
									 <option selected>....</option>
                                         @if($dev->isEmpty())
                                             No developers found !
                                         @else
                                             @foreach ($dev as $D)
                                                 <option value="{{$id = $D->id}}">{{ $name = $D->name }}</option>
                                             @endforeach
										 @endif
                                     </select>
                                 </div>
                             </div>
							 <br>
						     <div class="row">
							     <div class="col">
                                     <div class="mb-3">
									 <input type="hidden" name="clientname" class="form-control" id="clientname" value=""  required>
									 <input type="hidden" name="devname" class="form-control" id="devname" value="" required>
                                         <label for="exampleFormControlInput1" class="form-label">Project Name</label>
                                         <input type="text" name="projectname" class="form-control" id="exampleFormControlInput1" placeholder="Project Name" required>
                                     </div>
                                 </div>
							     <div class="col">
                                     <div class="mb-3">
                                         <label for="exampleFormControlInput1" class="form-label">Start date</label>
                                         <input type="datetime-local" name="startdate" class="form-control" id="exampleFormControlInput1" required>
                                     </div>
                                 </div>
                                 <div class="col">
                                     <div class="mb-3">
                                         <label for="exampleFormControlInput1" class="form-label">End date</label>
                                         <input type="datetime-local" name="enddate" class="form-control" id="exampleFormControlInput1" required>
                                     </div>
                                 </div>
							 </div>
                             <div class="row">
                                 <div class="col">
                                     <div class="mb-3">
                                         <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                         <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                     </div>
                                 </div>
                             </div>
						 </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Add project</button>
                    </div>
					</form>
                </div>
            </div>
        </div>
        <!--The Projet modal start end-->
    </div>

@endsection
