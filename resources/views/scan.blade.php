@extends('layouts.app')

@section('content')
	
<div class="container-fluid">
<video id="preview"></video>
</div>
	
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/instascan/1.0.0/index.min.js" integrity="sha512-ve8zzIbgiFFiUFW32RRJD+NBFRoVrGlhYfRLcTbQrqcFeazoPxhV03wWlyvDQE+/8GgZSMp+HqJlVBloc9D2vA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
@endsection