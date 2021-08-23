@extends('layouts.app')
@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/instascan/2.0.0-rc.4/instascan.min.js" integrity="sha512-vybWo2QCh2P1jTLx7W50N3K08p8ed7VsDZDJ9Ro/gvBDG0+lusOVFwbA9zfgBOtndpDm8YYKiagvre3Fq43kSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('content')

<div id="box" class="card text-center">
    <div class="card-header">
      <video id="preview"></video>

      </div>
    <div class="card-body">
      <div class="info">


        <button id="res" type="button" class="btn btn-lg btn-lg btn-block btn-warning" disabled>
          <div class="scanresult">
            Scan Result !
          </div>
        </button>

        <button id="confirm" style="display:none;" type="button" class="btn btn-warning  btn-lg btn-block">
          <h1>Confirm</h1>
        </button>
      </div>

</div>
@endsection
@section('scripts')
<script type="text/javascript">
      var audioElement = document.createElement('audio');
      audioElement.setAttribute('src', 'assets/audio/beep.mp3');

      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        console.log(content);
        audioElement.play();
        $(".scanresult").text(content);
        $("#confirm").css("display", "unset");
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[1]);
          vid();
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });

      function vid() {
        $("#preview").css("transform", "scaleX(1)");
      }
</script>
@endsection