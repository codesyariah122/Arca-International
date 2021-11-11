<h1>{{$details['title']}}</h1>
<h4 class="text-success">
	Hallo, <strong>{{$details['name']}}</strong>
</h4>

<h4>Detail information : </h4>

<ul>
	<li>Email : <strong>{{ $details['email'] }}</strong></li>
	<li>Password : <strong>{{ $details['password'] }}</strong></li>
</ul>

<br><br><br>
<p>
	Klik tautan dibawah untuk melakukan aktivasi akun anda <br>

	<br>
	<a href="{{ $details['url'] }}" class="btn btn-info btn-block">Aktivasi Member</a>
</p>