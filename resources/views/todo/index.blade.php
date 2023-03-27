@extends('todo.layout')

@section('content')

<h1 class="d-flex justify-content-center">ToDo List</h1>
<div class="p-3 border bg-light">
	<div class="row gy-5 d-flex justify-content-center">
		<div class="col-xl-10">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <strong>Oops!</strong> Your Input Can't Be success.<br><br>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		</div>
	</div>
	<div class="row gy-5 d-flex justify-content-center">
	    <div class="col-xl-10 margin-tb">
	        <div class="pull-left">
	            <h2>Add New Task</h2>
	        </div>
	    </div>
	</div>
	<div class="row gy-5 d-flex justify-content-center">
		<div class="col-xl-10">
			<form action="{{ route('todo.store') }}" method="post">
			    @csrf
		        <div class="mb-3">
					<label for="task" class="form-label">New Task:</label>
					<input type="text" name="task" class="form-control" id="task" aria-describedby="newTaskHelp">
					<div id="newTaskHelp" class="form-text">Enter your new task.</div>
		        </div>
		        <div class="d-grid gap-2">
		        	<button type="submit" class="btn btn-primary btn-lg btn-block">Create</button>
		        </div>
			</form>
		</div>
	</div>
</div>

@isset ($to_do_list)
<div class="p-3 border bg-light mt-3">
	<div class="row gy-5 d-flex justify-content-center">
		<div class="col-xl-10 margin-tb">
			<table class="table table-success table-striped table table-hover">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th colspan="2" class="text-center">Tasks</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($to_do_list as $task)
					<tr>
						<td class="text-center">{{ ++$i }}</td>
						<td>{{ $task->task }}</td>
						<td>
							<form action="{{ route('todo.destroy',$task->id) }}" method="post">
								@csrf
								@method('DELETE')
								<a class="btn btn-primary" href="{{ route('todo.edit', $task->id) }}">Edit</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div>
			{{ $to_do_list->links() }}
		</div>
	</div>
</div>

@endisset

@endsection