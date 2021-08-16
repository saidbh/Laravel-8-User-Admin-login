@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Developer ') }} Mr {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

						@if(Auth::check())
						<input type="hidden" id="iddev" value="{{ Auth::user()->id }}" >
						<input type="hidden" id="routedevs" value="{{ route('devsProject') }}" >
						<input type="hidden" id="_token" value="{{ csrf_token() }}" >
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Start Date</th>
										<th scope="col">End Date</th>
										<th scope="col">Description</th>
                                    </tr>
                                    </thead>
                                    <tbody id="resultDevProject" >
                                    </tbody>
                                </table>
						@endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
window.addEventListener('load', (event) => {
	// GET request for remote image in node.js
	let iddev = document.getElementById('iddev').value;
	let routed = document.getElementById('routedevs').value;
	let token = document.getElementById('_token').value;
axios({
  method: 'get',
  url: routed,
  params: {
       data: iddev,
	   '_token': token
  }
}).then(function (response) {
	var len = Object.keys(response.data.data).length;
	
	  //
	  			         console.log(response);
					 if(len === 0 || response.data.data === 0 ){
						 document.getElementById("resultDevProject").innerHTML ="<td colspan=\"4\"><div class=\"alert alert-info\">Pas de Project !</div></td>";
					 }else{
						   for (let i= 0; i <= len ; i++){
							   
						document.getElementById("resultDevProject").innerHTML ="<tr>\n" +
                            "      <td>"+ response.data.data[i].id +"</td>\n" +
                            "      <td>"+response.data.data[i].client_name +"</td>\n" +
                            "      <td>"+ response.data.data[i].project_name+"</td>\n" +
                            "      <td>"+ response.data.data[i].start_date +"</td>\n" +
							"      <td>"+ response.data.data[i].end_date +"</td>\n" +
							"      <td>"+ response.data.data[i].description +"</td>\n" +
                            "    </tr>";
						}
					 }
	  //

	  console.log('page is fully loaded');

  }).catch(function (error) {
    console.log(error);
  });

});
</script>
@endsection
