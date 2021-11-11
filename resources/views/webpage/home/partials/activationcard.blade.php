<div class="card text-center">
	<div class="card-header">
		Activation User
	</div>
	<div class="card-body">
		<h5 class="card-title text-capitalize">
			Halo {{ $data->name }}
		</h5>
		<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

		{{-- Activation Form --}}
		<form class="bg-white shadow-sm p-3"
		action="{{ route('activation.user', [$data->id])}}" method="POST">
		@method('PUT')
		@csrf
		<input type="hidden" value="PUT" name="_method">
		<input type="hidden" name="id" value="{{ $data->id }}">
		<input type="hidden" name="status" value="ACTIVE">

		<button type="submit" class="btn btn-primary">Go Activation</button>
	</form>

</div>
<div class="card-footer text-muted">
	Created At : {{ $data->created_at }}
</div>
</div>