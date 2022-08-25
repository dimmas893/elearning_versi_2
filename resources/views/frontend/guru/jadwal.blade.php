@extends('layouts.template_guru')
@section('contents')
    @foreach ($jadwals as $p)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                    <h5 class="card-title">{{ $p->guru->name }}</h5>
                    <h5 class="card-title">{{ $p->hari->name }}</h5>
                    <p class="card-text">{{ $p->mata_pelajaran->name }}</p>
                    <p class="card-text">Kelas {{ $p->ruangan->kelas->kelas }} {{ $p->ruangan->jurusan->name }}</p>
                    <p class="card-text">Jam masuk {{ $p->jam_masuk }}</p>
                    <p class="card-text">Jam masuk {{ $p->jam_keluar }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    <div class="pricing-cta">
					@if (\Carbon\Carbon::now('Asia/Jakarta')->format('H:i') >= $p->jam_masuk && \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') <= $p->jam_keluar && $p->hari->name == \Carbon\Carbon::now('Asia/Jakarta')->isoFormat('dddd'))
					<a href="/guru">Masuk <i
						class="fas fa-arrow-right"></i></a>
					@else
					<a href="#" class="masuk">Masuk <i
						class="fas fa-arrow-right"></i></a>
					@endif
					
				</div>
            </div>
        </div>
    @endforeach
@endsection

	@push('js')
	<script>
		$(".masuk").click(function () {
			swal('Dapat masuk sesuai waktu yang ditentukan', 'Silahkan cek kembali', 'error');
		});
	</script>
	<!-- JS Libraies -->
	<script src="{{ asset('halaman/assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
	<!-- Page Specific JS File -->
	<script src="{{ asset('halaman/assets/js/page/sweetalert.js') }}"></script>
	@endpush